@extends('layout.account.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">Transfer Balance History</h4>
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
                  <th>Receiver ID</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Date Time</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($transactions as $index => $transaction)
                     <tr>
                    <td>{{ $index + 1  }}</td>
                    @if($transaction->sender_id == Auth::id())
                    <td>{{ $transaction->receiver_id }}</td>
                    <td>{{ $transaction->balancetransection->name }}</td>
                    @else
                    <td>{{ $transaction->sender_id }}</td>
                    <td>{{ $transaction->transectionview->name }}</td>
                    @endif
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->created_at }}</td>
                     <td class="text-right">
                        @if($transaction->sender_id == Auth::id())
                            <span class="btn btn-success">Sent</span>
                        @else
                            <span class="btn btn-danger">Received</span>
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