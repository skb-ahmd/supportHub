<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketAcknowledgment;
use App\Mail\TicketReplyMail;
use App\Mail\TicketStatusChangeMail;
use App\Models\Reply;

class TicketController extends Controller
{
    public function ticketForm()
    {
        return view('tickets.index');
    }

    public function submitTicket(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'problem_description' => 'required|string',
        ]);

        $referenceNumber = uniqid();

        $ticket = Ticket::create([
            'reference_number' => $referenceNumber,
            'customer_name' => $validatedData['customer_name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'problem_description' => $validatedData['problem_description'],
            'status' => 'open', 
        ]);

      
        Mail::to($ticket->email)->send(new TicketAcknowledgment($ticket));

        return redirect()->route('ticket.submit.form')->with('status', 'Ticket submitted successfully!  Your reference number is ' . $referenceNumber);
    }

    public function statusForm()
    {
        return view('tickets.status');
    }

    public function checkStatus(Request $request)
    {
        $request->validate([
            'reference_number' => 'required|string|max:255',
        ]);
        $ticket = Ticket::where('reference_number', $request->input('reference_number'))->first();

        if ($ticket) {
            return view('tickets.show', compact('ticket'));
        } else {
            return redirect()->route('ticket.status.form')->withErrors(['reference_number' => 'Ticket not found.']);
        }
    }
    public function show($id)
    {
        $ticket = Ticket::with('replies.agent')->findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $ticket = Ticket::findOrFail($id);

       
        $reply = new Reply();
        $reply->ticket_id = $ticket->id;
        $reply->agent_id = auth()->id();
        $reply->reply_message = $request->message;
        $reply->save();

     
        $ticket->agent_id = auth()->id();
        $ticket->save();

        Mail::to($ticket->email)->send(new TicketReplyMail($ticket, $request->message));

        return redirect()->route('tickets.show', $ticket->id)->with('status', 'Reply sent successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->status = $request->input('status');

       
        $ticket->agent_id = auth()->id();
        $ticket->save();
        Mail::to($ticket->email)->send(new TicketStatusChangeMail($ticket));
        return redirect()->route('tickets.show', $id)->with('status', 'Ticket status updated successfully!');
    }

}
