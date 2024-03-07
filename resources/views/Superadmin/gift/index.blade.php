@extends('layout.superadmin.admin') 
@section('content') 
        <div class="page-header">
          <div class="row align-items-center">
            <div class="col">
              <h5 class="page-title mt-5">Create Gift Subscriber</h5> </div>
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
            <form action="{{ route('creategiftsubscribersuperadmin')}}" method="POST">
              @csrf
              <div class="row formtype">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Subscriber ID</label>
                    <input class="form-control" readonly  name="user_id" type="text" value="{{ $latestId}}"> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Name</label>
                      <input class="form-control" name="name" type="text"> </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Refer ID</label>
                    <input type="text" class="form-control" name="sponsor_id" id="usr"> </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Package Name</label>
                    <select class="form-control" name="packages_id" id="sel3" name="sellist1">
                      <option value="" style="display: none" selected>Select Package</option>
                      <option value="224">1Year-Special-365 BDT</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Mobile No</label>
                    <input type="text" name="mobileNo" class="form-control" id="usr"> </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text"  name="email" class="form-control" id="usr"> </div>
                </div>
                <div class="col-md-6">
                  
                  <button type="submit" class="btn btn-primary buttonedit1">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>  
@endsection