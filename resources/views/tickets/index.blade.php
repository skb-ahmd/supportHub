@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Submit Ticket</h6>
      </div>
      <div class="card card-frame">
        <div class="card-body">
          <form action="{{ route('ticket.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_name">Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number (optional)</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number">
            </div>
            <div class="form-group">
                <label for="problem_description">Problem Description</label>
                <textarea class="form-control" id="problem_description" name="problem_description" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Ticket</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection