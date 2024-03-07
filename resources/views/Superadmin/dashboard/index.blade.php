@extends('layout.superadmin.admin')
@section('content')
<div class="content container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-sm-12 mt-5">
              <h3 class="page-title mt-3"></h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
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
                    <h3 class="card_widget_header">{{ $balance }} BDT</h3>
                    <h6 class="text-muted">Available balance</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $allsubscriber }}</h3>
                    <h6 class="text-muted">Total  Subscribar</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $Totalboosterlist }}</h3>
                    <h6 class="text-muted">Total Booster Subscribar</h6> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection