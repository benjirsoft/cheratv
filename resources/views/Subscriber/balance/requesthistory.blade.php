@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">Widthrawal Request History</h4>
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
                  <th>Transection ID</th>
                  <th>Mobile No</th>
                  <th>Amount</th>
                  <th>Date Time</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($widthrawalrequest as $index => $widthrawalrequeststatus)
                     <tr>
	                    <td>{{ $index + 1  }}</td>
	                    <td>{{ $widthrawalrequeststatus->transectionid }}</td>
	                    <td>{{ $widthrawalrequeststatus->mobilebankingno }}</td>
	                    <td>{{ $widthrawalrequeststatus->amount }}</td>
	                    <td>{{ \Carbon\Carbon::parse($widthrawalrequeststatus->created_at)->format('M d, Y h:i A') }}</td>  
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