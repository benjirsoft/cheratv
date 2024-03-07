@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h5 class="card-title float-left mt-2">Bonus Convert History</h5>
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
                  <th>Date Time</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($transactions as $index => $transaction)
                     <tr>
                    <td>{{ $index + 1  }}</td>
                    <td>{{ $transaction->bcamount }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('M d, Y h:i A') }}</td>
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