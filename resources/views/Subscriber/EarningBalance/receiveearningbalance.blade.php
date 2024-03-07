@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
            @php
             $total = 0;
            @endphp
          <h5 class="card-title float-left mt-2">Total Withdrawal History</h5><br>
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
                  <th>Tracking ID</th>
                  <th>Sender Mobile Banking</th>
                  <th>Transaction ID</th>
                  <th>Receiver Mobile Banking</th>
                  <th>Amount</th>
                  <th>Date-Time</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($paymentconfirm as $index => $transaction)
                     <tr>
                    <td>{{ $index + 1  }}</td>
                    <td>{{ $transaction->transecctionid }}</td>
                    <td>{{ $transaction->sendermobileno }}</td>
                    <td>{{ $transaction->mobiletransecctionno }}</td>
                    <td>{{ $transaction->mobilebankingno}}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('M d, Y h:i A') }}</td>
                    </tr>
                    @php
                        $total += $transaction->amount
                    @endphp
                    @endforeach
              </tbody>
                <h4>Total Earning = {{ $total }}.Tk</h4>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection