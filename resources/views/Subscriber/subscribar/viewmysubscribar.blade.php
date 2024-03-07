@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
            @php
                $total = count($firstgeneation);
            @endphp
            <h5 class="card-title float-left mt-2">Personal Subscriber = {{ $total }}</h5>
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
              <thead text-align=center>
                <tr>
                  <th style="text-align:center">Subsbcriber ID</th>
                  <th style="text-align:center">Subsbcriber Name</th>
                  <th style="text-align:center">Refer ID</th>
                  <th style="text-align:center">Refer Name</th>
                  <th style="text-align:center">Rank</th>
                  <th style="text-align:center">Package Name</th>
                  <th style="text-align:center">Mobile No</th>
                  <th style="text-align:center">Date Time</th>
                  <th style="text-align:center">Team Subscriber= {{ $secondtotal }}</th>
                </tr>
              </thead>
              <tbody text-align=center>
                @foreach ($firstgeneation as $index => $transection)
                <tr>
                  <td style="text-align:center">{{ $transection->user_id }}</td>
                  <td style="text-align:center">{{ $transection->name }}</td>
                  <td style="text-align:center">{{ $transection->sponsor_id }}</td>
                  <td style="text-align:center">{{ \App\Models\Subscriber::where('user_id', $transection->sponsor_id)->first()->name ?? null }}</td>
                  <td style="text-align:center">{{ $transection->label }}</td>
                  <td style="text-align:center">{{ $transection->Package->packagesName }}</td>
                  <td style="text-align:center">{{ $transection->mobileNo }}</td>
                  <td style="text-align:center">{{ \Carbon\Carbon::parse($transection->created_at)->format('M d, Y h:i A') }}</td>
                  <?php 
                     $booster = \App\Models\BoosterSubscriber::where('user_id', $transection->user_id)->first()->user_id ?? null

                  ?>
                  <td style="float: right;" class="d-flex">
                   @if($booster)
                    <a href="#" class="btn btn-success">BoosterID</a>
                   @endif
                  <a href="{{ route('totalsubsbcriber', [$transection->user_id]) }}" class="btn btn-sm btn-success mr-1">   &nbsp; &nbsp;<i class="fas fa-eye"></i></a>
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
  <br>
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-table">
          <h5>Team Subscriber = {{ $secondtotal }}</h5>
        <div class="card-body booking_card">
          <div class="table-responsive">
            <table class="datatable table table-striped table-hover table-center mb-0">
              <thead>
                <tr>
                  <th style="text-align:center">Subsbcriber ID</th>
                  <th style="text-align:center">Subsbcriber Name</th>
                  <th style="text-align:center">Refer ID</th>
                  <th style="text-align:center">Refer Name</th>
                  <th style="text-align:center">Rank</th>
                  <th style="text-align:center">Package Name</th>
                  <th style="text-align:center">Mobile No</th>
                  <th style="text-align:center">Date Time</th>
                  <th style="text-align:center">Team Subscriber</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($secondGenerationUsers as $index => $transection)
                <tr>
                  <td style="text-align:center">{{ $transection->user_id }}</td>
                  <td style="text-align:center">{{ $transection->name }}</td>
                  <td style="text-align:center">{{ $transection->sponsor_id }}</td>
                  <td style="text-align:center">{{ \App\Models\Subscriber::where('user_id', $transection->sponsor_id)->first()->name ?? null }}</td>
                  <td style="text-align:center">{{ $transection->label }}</td>
                  <td style="text-align:center">{{ $transection->Package->packagesName }}</td>
                  <td style="text-align:center">{{ $transection->mobileNo }}</td>
                  <td style="text-align:center">{{ \Carbon\Carbon::parse($transection->created_at)->format('M d, Y h:i A') }}</td>
                  <?php 
                     $booster = \App\Models\BoosterSubscriber::where('user_id', $transection->user_id)->first()->user_id ?? null

                  ?>
                  <td style="float: right;" class="d-flex">
                    @if($booster)
                    <a href="#" class="btn btn-success">BoosterID</a>&nbsp;&nbsp;
                    @endif
                  <a href="{{ route('totalsubsbcriber', [$transection->user_id]) }}" class="btn btn-sm btn-success mr-1">   &nbsp; &nbsp;<i class="fas fa-eye"></i></a>
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