@extends('layout.account.admin')
@section('content')

      <div class="content container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-12 mt-5">
              <h3 class="page-title mt-3">Accounts Report</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item active"></li>
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
                    <h3 class="card_widget_header">{{ $totalpurchasebalance }} BDT</h3>
                    <h6 class="text-muted">Total Purchase Balance Balance</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $totalearningbalance }}</h3>
                    <h6 class="text-muted">Total Earning Balance</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $todayearn }} BDT</h3>
                    <h6 class="text-muted">Today Total Earn</h6> </div>                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                      <h3 class="card_widget_header">{{ $todayconvert }}  BDT</h3>
                    <h6 class="text-muted">Today Total Convert</h6> </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>
  @endsection