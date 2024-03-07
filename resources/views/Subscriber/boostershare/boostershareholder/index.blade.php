@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h4 class="card-title float-left mt-2">Booster Share Purchase List</h4>
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
                  <th>Amount</th>
                  <th>Date Time</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($boosterlist as $index => $booster)
                     <tr>
	                    <td>{{ $index + 1  }}</td>
	                    <td>{{ $booster->user_id }}</td>
	                    <td>{{ \App\Models\User::where('id', $booster->user_id)->first()->name }}</td>
	                    <td>{{ $booster->amount}}</td>
	                    <td>{{ \Carbon\Carbon::parse($booster->created_at)->format('M d, Y h:i A') }}</td>
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