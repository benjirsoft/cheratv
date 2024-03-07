@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <div class="mt-5">
          <center><h4 class="card-title float-left mt-2">Video Watch History</h4></center>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-table">
        <div class="card-body booking_card">
          <div class="table-responsive" >
            <table class="data-tables table mb-0 tbl-server-info" style="width:50%">
              <thead>
                <tr style="text-align:center">
                  <th>Video Title</th>
                  <th>Watch Time</th>
                  <th>Date Time</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($watchtime as $videolist)
                     <tr>
	                    <td style="text-align:center">{{ \Illuminate\Support\Str::limit(\App\Models\Video::where('id', $videolist->videoid)->first()->title ?? null), 2}}</td>
	                    <td style="text-align:center">{{ $videolist->watchduration }}</td>
	                    <td style="text-align:center">{{ \Carbon\Carbon::parse($videolist->created_at)->format('M d, Y h:i A') }}</td>  
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