@extends('layout.customer.admin')
@section('content')

      <div class="content container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-12 mt-5">
                  
              <h3 class="page-title mt-3"><span style="font-size:20px">Current Level</span></h3>
                   @if($rank=="General Subscriber")
                   <img src="image\1.png" width="25" height="25"/>  
                    @else
                        <img width="40" height="20" src="image\2.png"/>  
                    @endif
                    <h3>{{ $rank }}</h3>
              <ul class="breadcrumb">
              </ul>
                @if($rank=="General Subscriber")
                  <h3 class="page-title mt-3"><span style="font-size:20px">Next Level Require  {{ $next}}</span></h3>
                  <p>Personal: = {{ $personal }}/11500 <br>
                  Team:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = {{ $team }}/16500  </p>
                @else
                  <h3 class="page-title mt-3"><span style="font-size:20px">Next Level Require {{ $next}}</span></h3>
                  <p>Personal: ={{$personal}}/0 <br>
                  Team:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = {{$team}}/0  </p>
                @endif  
              
            </div>
          </div>
        </div>
        
        </div>
  @endsection