<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{

    public function index()
    {
        $tickets = Ticket::all();

        return view('agents.index', compact('tickets'));
    }
    public function loginForm()
    {
        return view('agents.login');
    }
    public function registerForm()
    {
        return view('agents.register');
    }
    public function register(Request $request)
    {
       
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

      
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

     
        Auth::login($user);

      
        return Redirect::route('agents.index'); 
    }

    public function login(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

    
        if (Auth::attempt($request->only('email', 'password'))) {
          
            return redirect()->route('agents.index');
        }

      
        return Redirect::back()->withErrors(['email' => 'The provided credentials are incorrect.'])->withInput();
    }
    public function logout(Request $request)
    {
       
        Auth::logout();

      
        $request->session()->invalidate();

       
        $request->session()->regenerateToken();

        
        return redirect()->route('ticket.submit.form');
    }
}
