@extends('layouts.app')


@section('css')
@vite(['https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css'])
</head>
@endsection
@section('content')
<div class="card shadow-sm">
  <div class="card-body">
    <h4 class="font-weight-bolder text-center">Tickets Dashboard</h4>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" id="ticketTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Status</th>
            <th>Created At</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tickets as $ticket)
            <tr>
              <td>{{ $ticket->id }}</td>
              <td>{{ $ticket->customer_name }}</td>
              <td>
                @php
           
                  $status = $ticket->status;
                  $formattedStatus = ucwords(str_replace('_', ' ', $status));
                @endphp
                {{ $formattedStatus }}
              </td>
              <td>{{ $ticket->created_at->format('d M Y, H:i') }}</td>
              <td class="align-middle">
                <a href="{{ route('tickets.show', $ticket->id) }}" class="text-secondary font-weight-bold text-xs">View</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection

@section('script')
<script>
// let table = new DataTable('#ticketTable');
</script>
@vite(['https://cdn.datatables.net/2.1.3/js/dataTables.min.js'])
@endsection
