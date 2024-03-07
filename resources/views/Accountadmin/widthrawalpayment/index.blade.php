@extends('layout.account.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">Payout Request</h4>
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
                  <th>Subscriber ID</th>
                  <th>Name</th>
                  <th>Transection ID</th>
                  <th>Amount</th>
                  <th>Date Time</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($widthrawalrequest as $index => $widthrawalrequeststatus)
                     <tr>
                    <td>{{ $index + 1  }}</td>
                    <td>{{ $widthrawalrequeststatus->user_id }}</td>
                    <td>{{ $widthrawalrequeststatus->usersid->name }}</td>
                    <td>{{ $widthrawalrequeststatus->transectionid }}</td>
                    <td>{{ $widthrawalrequeststatus->amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($widthrawalrequeststatus->created_at)->format('M d, Y h:i A') }}</td>
                     <td class="text-right">
                        @if($widthrawalrequeststatus->status == 0)
                            <span class="btn btn-danger"><a  style="text-decoration: none; color: white;" href="{{ route('makepaymentform', [$widthrawalrequeststatus->transectionid]) }}">Pending</a></span>
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