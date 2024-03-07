@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h5 class="page-title mt-4"><span style="font-size: 18px;">Confirm Your Pin</span></h5>
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
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <form action="{{ route('boostsharepurchaseaddconfirm')}}" method="POST">
      	@csrf
        <div class="row formtype">
          <div class="col-md-12">
            <div class="form-group">
              <label><span style="font-size:13px">Transfer Pin</span></label>
                <input class="form-control"  name="transectionpin" type="password">
                <input class="form-control" name="amount" value="{{ $amountofshare }}" type="hidden">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary"><span style="font-size:18px">Submit</span></button>
      </form>
    </div>
  </div>
</div>
@endsection
