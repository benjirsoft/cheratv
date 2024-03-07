@extends('layout.superadmin.admin') 
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
            <table class="datatable table table-stripped table table-hover table-center mb-0">
              <thead>
                <tr>
                  <th>SL No</th>
                  <th>Name</th>
                  <th>ReferID</th>
                  <th>Email</th>
                  <th>Package ID</th>
                  <th>Mobile No</th>
                  <th>SenderNo</th>
                  <th>Date Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                
                @foreach ($subscriber as  $subscriberss)
                <tr>
                  <td>{{ $subscriberss->id  }}</td>
                  <td>{{ $subscriberss->name }}</td>
                  @if($subscriberss->referid == null)
                  <td>S0000002</td>
                  @else
                  <td>{{ $subscriberss->referid }}</td>
                  @endif
                  <td>{{ $subscriberss->email }}</td>
                  <td>{{ $subscriberss->Package->packagesName }}</td>
                  <td>{{ $subscriberss->mobileno }}</td>
                  <td>{{ $subscriberss->sendernumber }}</td>
                  <td>{{ \Carbon\Carbon::parse($subscriberss->created_at)->format('M d, Y h:i A') }}</td>
                  @if($subscriberss->status == 0)
                  <td class="d-flex">
                  <a href="{{ route('createsubscriberbysuperadminform',[$subscriberss->id])}}" class="btn btn-sm btn-danger mr-1">Pending</a>
                  </td>
                  @else
                  <td style="float: left;" class="d-flex">
                  <a href="#" class="btn btn-sm btn-success mr-1">Complete</a>
                  </td>
                  @endif
                  <td style="float: right;" class="d-flex">
                  <a href="{{ route('deletesubscriberbysuperadminform',[$subscriberss->id])}}" class="btn btn-warning mr-1">Delete</a>
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