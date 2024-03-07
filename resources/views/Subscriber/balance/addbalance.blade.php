@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h5 class="page-title mt-4"><span style="font-size: 18px;">Add Balance Request</span></h5>
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
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <form action="{{ route('addbalance')}}" method="POST">
        @csrf
        <div class="row formtype">
          <div class="col-md-12">
            <div class="form-group">
              <label>
                  <span id="phone-number1" style="font-size:13px">01759826962-bKash</span>
                  <span id="copy-button1">কপি করুন</span>
              </label><br>
              <label>
                <span id="phone-number2" style="font-size:13px">01759826962-Nagad</span>
                <span id="copy-button2">কপি করুন</span
              </label><br><br>
              <span>প্রথমে কাঙ্ক্ষিত পরিমাণ Amount উপরের যেকোনো একাউন্ট নাম্বারে Send Money করুন। </span>
              <span>তারপর নিচের তথ্য পূরণ করে Submit করুন।</span>
            </div>
             <div class="form-group">
              <label><span style="font-size:13px">Sent Amount</span></label>
                <input class="form-control" name="amount" required type="numeric">
                @error('amount')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                @enderror
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Payment Method</span></label>
                <select  class="form-control" name="paymentmethod">
                  <option disabled="disabled" selected="selected">Choose Option</option>
                    <option>bKash</option>
                    <option>Nagad</option>
                </select>
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Sender Mobile Banking No</span></label>
                <input class="form-control" name="sendernumber" type="numeric">
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Transaction ID</span></label>
                <input class="form-control" name="transection" type="numeric">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary"><span style="font-size:18px">Submit</span></button>
      </form>
    </div>
  </div>
</div>
@endsection
