@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Check Ticket Status</h6>
      </div>
      <div class="card card-frame">
        <div class="card-body">
        <form action="{{ route('ticket.status.check') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="reference_number">Reference Number</label>
                <input type="text" class="form-control" id="reference_number" name="reference_number" required>
                @error('reference_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Check Status</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection