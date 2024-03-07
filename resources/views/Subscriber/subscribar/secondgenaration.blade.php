@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <h5 class="card-title float-left mt-2">Own Subscriber</h5>
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
                  <th>SL No</th>
                  <th>Subsbcriber ID</th>
                  <th>Name</th>
                  <th>Account Type</th>
                  <th>Package Name</th>
                  <th>Mobile No</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($secondGenerationUsers as $index => $transection)
                <tr>
                  <td>{{ $index + 1  }}</td>
                  <td>{{ $transection->user_id }}</td>
                  <td>{{ $transection->name }}</td>
                  <td>{{ $transection->label }}</td>
                  <td>{{ $transection->Package->packagesName }}</td>
                  <td>{{ $transection->mobileNo }}</td>
                  <?php 
                     $booster = \App\Models\BoosterSubscriber::where('user_id', $transection->user_id)->first()->user_id ?? null

                  ?>
                  <td>
                    @if($booster)
                    <a href="#" class="btn btn-success">BoosterID</a>&nbsp;&nbsp;
                    @endif
                  </td>
                  <td>{{ \Carbon\Carbon::parse($transection->created_at)->format('M d, Y h:i A') }}</td>
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