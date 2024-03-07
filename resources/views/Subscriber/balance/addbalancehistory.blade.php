@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">Balance Request History</h4>
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
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Amount</th>
                  <th>Sender M.Banking</th>
                  <th>Method</th>
                  <th>Transection No</th>
                  <th>Date Time</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($balancerequest as $index => $widthrawalrequeststatus)
                     <tr>
	                    <td>{{ $index + 1  }}</td>
	                    <td>{{ $widthrawalrequeststatus->amount}}</td>
	                    <td>{{ $widthrawalrequeststatus->sendernumber }}</td>
	                    <td>{{ $widthrawalrequeststatus->paymentmethod }}</td>
	                    <td>{{ $widthrawalrequeststatus->transection }}</td>
	                    <td>{{ \Carbon\Carbon::parse($widthrawalrequeststatus->created_at)->format('M d, Y h:i A') }}</td>
	                    @if($widthrawalrequeststatus->status == 0)
	                    <td><a class="btn btn-danger" href="#">Pending</td>
	                    @else
	                    <td><a class="btn btn-success" href="#">success</td>
	                    @endif
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