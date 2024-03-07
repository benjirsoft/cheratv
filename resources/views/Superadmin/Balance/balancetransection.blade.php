@extends('layout.superadmin.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">Balance Receive History</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-table">
        <div class="card-body booking_card">
          <div class="table-responsive">
            <table class="datatable table table-stripped table table-hover table-center mb-0">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Sender ID</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Date Time</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($transactions as $index => $transaction)
                     <tr>
                    <td>{{ $index + 1  }}</td>
                    @if($transaction->sender_id == Auth::id())
                    <td>{{ $transaction->receiver_id }}</td>
                    @else
                    <td>{{ $transaction->sender_id }}</td>
                    @endif
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('M d, Y h:i A') }}</td>
                     <td class="text-right">
                        @if($transaction->sender_id == Auth::id())
                            <span class="btn btn-success">Paid</span>
                        @else
                            <span class="btn btn-danger">Pending</span>
                        @endif
                    </td>  
                    </tr>                
                    @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection