@extends('layout.superadmin.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h5 class="page-title mt-5"><span style="font-size: 18px;">Transfer Balance</span></h5>
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


      <form action="{{ route('actiontransferbalance')}}"  method="POST">
        @csrf
        <div class="row formtype">
          <div class="col-md-6">
            <div class="form-group">
              <label><span style="font-size:13px">Transfer Amount</span></label>
                <input class="form-control" value="{{$requestid->id }}" name="id" required type="hidden">
                <input class="form-control" value="{{$requestid->amount }}" name="amount" required type="numeric"><span>Your Current Purchase Balance =  BDT</span>
                @error('amount')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                @enderror
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Subscriber ID</span></label>
                <input class="form-control" value="{{ $requestid->user_id }}" name="subscriberid" required type="numeric">
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Payment Method</span></label>
                <input class="form-control" value="{{ $requestid->paymentmethod }}" name="paymentmethod" required type="numeric">
            </div>
        </div>    
        <div class="col-md-6">    
            <div class="form-group">
              <label><span style="font-size:13px">Sender Mobile</span></label>
                <input class="form-control"  value="{{ $requestid->receivenumber }}"  name="sendermobileno" required type="numeric">
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Subsriber Mobile Banking No</span></label>
                <input class="form-control"  value="{{ $requestid->sendernumber }}"  name="subscribermobilebankingno" required type="numeric">
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Transfer Pin</span></label>
                <input class="form-control"  name="pin" required type="password">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary"><span style="font-size:18px">Submit</span></button>
      </form>
    </div>
  </div>
</div>
@endsection