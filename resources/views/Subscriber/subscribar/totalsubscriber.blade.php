@extends('layout.customer.admin')
@section('content')

      <div class="content container-fluid">
        <div class="page-header">
          <div class="row">
          </div>
        </div>
        <div class="row">
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="card board1 fill">
              <div class="card-body">
                <div class="dash-widget-header">
                  <div>
                    <h5 class="card_widget_header">{{ $all }}</h5>
                    <h6 class="text-muted">Subscriber</h6> </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>
  @endsection