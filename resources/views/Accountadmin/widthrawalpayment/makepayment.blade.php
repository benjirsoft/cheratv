@extends('layout.account.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h5 class="page-title mt-5"><span style="font-size: 18px;">Payment Confirm</span></h5>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      <!-- Display validation error messages -->
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <h5>Transection ID {{ $subscriber->transectionid }}</h5>
      <form action="{{ route('confirmpaymentone')}}" method="post">
        @csrf
        <div class="row formtype">
          <div class="col-md-4">
            <div class="form-group">
              <input type="hidden" name="transecctionid" value="{{ $subscriber->transectionid }}">
              <label><span style="font-size:13px">User ID</span></label>
                <input class="form-control" readonly value="{{ $subscriber->user_id }}" name="user_id" required type="numeric">
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Name</span></label>
                <input class="form-control" value="{{ $subscriber->userprofile->name }}" name="amount" required type="numeric">              
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Widthrawal Amount</span></label>
                <input class="form-control" value="{{ $subscriber->amount }}" name="amount" required type="numeric">  
            </div>
          </div>
          <div class="col-md-4">  
            <div class="form-group">
              <label><span style="font-size:13px">Mobile Banking Number</span></label>
                <input class="form-control" value="{{ $subscriber->mobilebankingno }}" name="mobilebankingno" required type="numeric">
               
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Sender Mobile No</span></label>
                <input class="form-control" name="sendermobileno" required type="numeric">
               
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Mobile Transection No</span></label>
                <input class="form-control" name="mobiletransecctionno" required type="numeric">
               
            </div>
            
            <div class="form-group">
              <label><span style="font-size:13px">Transection Pin</span></label>
                <input class="form-control" name="pin" required type="numeric">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary"><span style="font-size:18px">Payment Confirm</span></button>
      </form>
    </div>
  </div>
</div>
@endsection