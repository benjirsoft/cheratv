@extends('layout.account.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="page-title mt-5">Transfer Balance</h3>
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

      <!-- Display validation error messages --> @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
     
     
      <form action="{{ route('accounttransfer.initiate')}}" method="get">
        @csrf
        <div class="row formtype">
          <div class="col-md-4">
            <div class="form-group">
              <label>Receiver ID</label>
                <input class="form-control" name="receiverid" required type="text">
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
              <label>Total Amount</label>
                <input class="form-control" name="amount" required type="number">
                
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Transfer Balance</button>
      </form>
    </div>
  </div>
</div>
@endsection