@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">Total Payout History</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-table">
        <div class="card-body booking_card">
          <div class="table-responsive">
            <table class="data-tables table mb-0 tbl-server-info">
              <thead style="text-align:center">
                <tr>
                  <th>SL</th>
                  <th>Tracking ID</th>
                  <th>Receiver Mobile Banking</th>
                  <th>Amount</th>
                  <th>Date Time</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody style="text-align:center">
                    @foreach ($widthrawalrequest as $index => $widthrawalrequeststatus)
                     <tr>
                    <td>{{ $index + 1  }}</td>
                     <td>{{ $widthrawalrequeststatus->transectionid }}</td>
                    <td>{{ $widthrawalrequeststatus->usersno->mobilebankingno }}</td>
                    <td>{{ $widthrawalrequeststatus->amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($widthrawalrequeststatus->created_at)->format('M d, Y h:i A') }}</td>
                     <td class="text-right">
                        @if($widthrawalrequeststatus->status == 0)
                            <span class="btn btn-danger">Pending</span>
                        @else
                            <span class="btn btn-success">Payment Success</span>
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