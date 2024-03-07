@extends('layout.account.admin') 
@section('content') 
  <div class="content container-fluid">
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col">
          <div class="mt-5">
            <h5 class="card-title float-left mt-2">Subscriber Pin With Refer</h5>
          </div>
        </div>
      </div>
    </div>
    <?php
    
        $user = \App\Models\Subscriber::all();
    
    ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-table">
          <div class="card-body booking_card">
            <div class="table-responsive">
              <table class="datatable table table-stripped table table-hover table-center mb-0">
                <thead>
                  <tr>
                    <th>SL No</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Refer ID</th>
                    <th>Refer Name</th>
                    <th>Pin</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $index => $subscriber)
                  <tr>
                    <td>{{ $index + 1  }}</td>
                    <td>{{ $subscriber->user_id }}</td>
                    <td>{{ $subscriber->name }}</td>
                    <td>{{ $subscriber->sponsor_id }}</td>
                    <td>{{ \App\Models\Subscriber::where('user_id', $subscriber->sponsor_id)->first()->name ?? null }}</td>
                    <td>{{ \App\Models\Transectionpin::where('user_id', $subscriber->user_id)->first()->pin ?? null }}</td>
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