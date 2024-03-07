@extends('layout.account.admin') 
@section('content') 
  <div class="content container-fluid">
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col">
          <div class="mt-5">
            <h5 class="card-title float-left mt-2">Subscriber</h5>
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
                    <th>SL No</th>
                    <th>Subsbcriber ID</th>
                    <th>Name</th>
                    <th>Account Type</th>
                    <th>Package Name</th>
                    <th>Package Price</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Date Time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($subscriberlist as $index => $subscriber)
                  <tr>
                    <td>{{ $index + 1  }}</td>
                    <td>{{ $subscriber->user_id }}</td>
                    <td>{{ $subscriber->name }}</td>
                    <td>{{ $subscriber->label }}</td>
                    <td>{{ $subscriber->Package->packagesName }}</td>
                    <td>{{ $subscriber->Package->price }}</td>
                    <td>{{ $subscriber->mobileNo }}</td>
                    <td>{{ $subscriber->usermail->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($subscriber->created_at)->format('M d, Y h:i A') }}</td>
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