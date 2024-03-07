@extends('layout.maintenceadmin.admin')
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
                    <h3 class="card_widget_header">{{ $videos }}</h3>
                    <h6 class="text-muted">Total Video</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $user }}</h3>
                    <h6 class="text-muted">Total User</h6> </div>
                </div>
              </div>
            </div>
          </div> 
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $tag }}</h3>
                    <h6 class="text-muted">Total Sub Category</h6> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h3 class="card_widget_header">{{ $category }}</h3>
                    <h6 class="text-muted">Total Category</h6> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection