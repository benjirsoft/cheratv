@extends('layout.customer.admin')
@section('content')

      <div class="content container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-6 mt-3">
                <img src="image\2.png" width="40" height="20" style="margin-bottom:-40px" />
                <h3 class="page-title mt-3"><span style="font-size:20px">{{ $rank }}(<span style="font-size:15px">{{$boostsubscriber->packagename ?? null}}</span>)</span><br></h3>
                <span style="font-size:15px">(Expiration : {{ $remainingDays }} Days)</span><br>
              
                <section style="margin-top:0px">
                    <section style="margin-top:-7px">
                       <span style="font-size:15px">Welcome To {{ Auth::user()->name }}</span>
                   </section>
              </section>
            </div>
            <div class="col-sm-6">
                <?php 
                      $checkboostshare = \App\Models\BoosterSubscriber::where('user_id', $userid=Auth::id())->first();
                ?>
                  <div class="luduimage" style="margin-left:275px; margin-top: -65px;">
                    @if($checkboostshare)
                    <a href="{{ route('sourceout') }}"><img  src="{{ asset('assets') }}/img/ludu.jpeg" width="40" height="40"/></a>
                    @else
                     <a href="#"><img src="{{ asset('assets') }}/img/ludu.jpeg" width="40" height="40"/>
                    @endif
                  </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h5 class="card_widget_header">{{ $balance }} BDT</h5>
                    <h6 class="text-muted">Recharge Balance</h6> </div>                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $Bonuses }} BDT</h3>
                    <h6 class="text-muted">Earning Balance</h6> </div>                 
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{$minutebalance}}:00 Minutes</h3>
                    <h6 class="text-muted">Watch Time</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $alltotal }}</h3>
                    <h6 class="text-muted">Total Subscriber</h6> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  @endsection