@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
            @php
                
                $userid = Auth::id();
                $earninglist = \App\Models\BoossterWatchearn::where('user_id', $userid)->get() ?? null;
                
                
            
             $totalearn = 0;
            @endphp
          <h5 class="card-title float-left mt-2">Total Earning List</h5><br>
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
                  <th>From</th>
                  <th>Amount</th>
                  <th>Date-Time</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($earninglist as $index => $earning)
                     <tr>
                    <td>{{ $index + 1  }}</td>
                    <td>{{ $earning->note }}</td>
                    <td>{{ $earning->amount }}</td>
                    <td>{{ \Carbon\Carbon::parse($earning->created_at)->format('M d, Y h:i A') }}</td>
                    </tr>
                    @php
                         $totalearn += $earning->amount
                    @endphp
                    @endforeach
              </tbody>
                <h4>Total Earning = {{  $totalearn }}.Tk</h4>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection