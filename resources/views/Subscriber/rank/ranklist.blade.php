@extends('layout.customer.admin')
@section('content')

      <div class="content container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-12 mt-5">
              @if($rankid)
                <img src="image\1.png" width="25" height="25" style="margin-bottom:-40px" />  
              @endif    
              <h3 class="page-title mt-3"><span style="font-size:20px">General Subscriber</span></h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item active"><span style="font-size:15px">Welcome To {{ Auth::user()->name }}</span></li>
              </ul>
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
                    <h6 class="text-muted">Main Balance</h6> </div>                  
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
                    <h3 class="card_widget_header">{{ $alltotal }}</h3>
                    <h6 class="text-muted">Total Subscriber</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{$minutebalance}}:00</h3>
                    <h6 class="text-muted">Total Minute</h6> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  @endsection