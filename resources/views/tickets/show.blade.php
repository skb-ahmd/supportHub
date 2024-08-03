@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="font-weight-bolder text-center">Ticket Details</h4>
            <div class="mb-3">
                <h5>Ticket ID: {{ $ticket->id }}</h5>
                <p><strong>Customer Name:</strong> {{ $ticket->customer_name }}</p>
                <p><strong>Created At:</strong> {{ $ticket->created_at->format('d M Y, H:i') }}</p>
                <p><strong>Description:</strong></p>
                <p>{{ $ticket->problem_description }}</p>

                @auth
                    
                    <p><strong>Status:</strong></p>
                    <form action="{{ route('tickets.update.status', $ticket->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-9">
                                <select name="status" id="status" class="form-control">
                                    <option value="open" {{ $ticket->status === 'open' ? 'selected' : '' }}>Open</option>
                                    <option value="in_progress" {{ $ticket->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="closed" {{ $ticket->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </div>
                        </div>
                    </form>
                @else
                    
                    <p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}</p>
                @endauth
            </div>

            @if($ticket->status === 'New')
                <div class="alert alert-info">
                    <strong>New Ticket!</strong> This ticket has not been opened yet.
                </div>
            @endif

            <div class="mb-3">
                <h5>Replies:</h5>
                <div class="list-group">
                    @foreach($ticket->replies as $reply)
                        <div class="list-group-item">
                            <p><strong>By:</strong> {{ $reply->agent ? $reply->agent->name : 'Customer' }}</p>
                            <p><strong>Reply:</strong> {{ $reply->reply_message }}</p>
                            <p><strong>Sent At:</strong> {{ $reply->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            @auth
                <div class="mt-4">
                    <h5>Reply to Ticket:</h5>
                    <form action="{{ route('tickets.reply', $ticket->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4" placeholder="Write your reply here..." required></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Send Reply</button>
                    </form>
                </div>
            @endauth

            @if(session('status'))
                <script>
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('status') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
        </div>
    </div>
</div>
@endsection
