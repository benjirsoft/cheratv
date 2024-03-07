@extends('layout.account.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">Paid Balance List</h4>
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
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Tracking ID</th>
                  <th>Sender Mobile Banking</th>
                  <th>Transaction ID</th>
                  <th>Receiver Mobile Banking</th>
                  <th>Amount</th>
                  <th>Date Time</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($accountpaidlist as $index => $widthrawalrequeststatus)
                     <tr>
                    <td>{{ $index + 1  }}</td>
                    <td>{{ $widthrawalrequeststatus->user_id }}</td>
                    <td>{{ $widthrawalrequeststatus->usersids->name }}</td>
                    <td>{{ $widthrawalrequeststatus->transecctionid }}</td>
                    <td>{{ $widthrawalrequeststatus->sendermobileno }}</td>
                    <td>{{ $widthrawalrequeststatus->mobiletransecctionno }}</td>
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