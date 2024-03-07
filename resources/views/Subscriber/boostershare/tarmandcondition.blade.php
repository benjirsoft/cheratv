@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h5 class="page-title mt-4"><span style="font-size: 18px;">Tearm And Condition</span></h5>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
        <div class="row formtype">
          <div class="col-md-12">
            <div class="form-group">
            </div>
            <div class="form-group">
              	<center><img src="{{ asset('assets') }}/img/tearm.jpg" width="90%" height="90%"></center>
            </div>
          </div>
        </div>
        <a href="{{ route('boostsharepurchase')}}" type="submit" class="btn btn-primary"><span style="font-size:18px">Back</span></a>
    </div>
  </div>
</div>
@endsection
