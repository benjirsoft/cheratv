@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h5 class="page-title mt-5"><span style="font-size: 18px;">Payout <span style="font-size:13px">(Withdrawal Processing Maximum 24 Hour)</span></span></h5>
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


      <form action="{{ route('balancewidtrawal')}}" method="post">
        @csrf
        <div class="row formtype">
          <div class="col-md-4">
            <div class="form-group">
              <label><span style="font-size:13px">Payout Amount</span></label><span style="font-size:13px;">(Minimum 300 BDT)</span>
                <input class="form-control" name="amount"  type="number" autocomplete="off"><span>Your Earning Balance {{ $balance }} BDT</span>
                @error('amount')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                @enderror
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Receiver Mobile Banking</span></label>
                <select  class="form-control" name="mobilebankingno">
                  <option disabled="disabled" selected="selected">Choose Option</option>
                  @foreach($userProfiles as $userProfile)
                    <option>{{ $userProfile->mobilebankingno }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
              <label><span style="font-size:13px">Transfer Pin</span></label>
                <input class="form-control" name="pin" type="password" autocomplete="off">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary"><span style="font-size:18px">Submit</span></button>
      </form>
    </div>
  </div>
</div>
@endsection