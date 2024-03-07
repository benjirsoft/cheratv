@extends('layout.account.admin')
@section('content')

      <div class="content container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-12 mt-5">
              <h3 class="page-title mt-3">Accounts Dashboard</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item active">Welcome To {{ Auth::user()->name }}</li>
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
                    <h3 class="card_widget_header">{{ $total }} BDT</h3>
                    <h6 class="text-muted">Available Balance</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $totalsubscribe }}</h3>
                    <h6 class="text-muted">Total Subscribar</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    @if($amounts)
                    <h3 class="card_widget_header">{{ $amounts }}  BDT</h3>
                    @else
                    <h3 class="card_widget_header">00.00  BDT</h3>
                    @endif 
                    <h6 class="text-muted">Subscriber Earning Balance</h6> </div>                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    @if($pendingbalance)
                      <h3 class="card_widget_header">{{ $pendingbalance }}  BDT</h3>
                    @else
                      <h3 class="card_widget_header">00.00  BDT</h3>
                    @endif  
                    <h6 class="text-muted">Subscriber Pending Balance</h6> </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>
  @endsection