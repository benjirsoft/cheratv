@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="page-title mt-5">Edit Profile</h3>
      </div>
    </div>
  </div>
  
  
  <div class="box inform_css mt-3">
    <div class="row">
      <div class="col-lg-12">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
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
        <form action="{{ route('bioupdate')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row formtype">
            <div class="col-md-4">
              <div class="form-group">
                    <label>File Upload</label>
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" id="customFile" name="image">
                      <label class="custom-file-label" for="image">Choose file</label>       
                    </div>
                    @if($profileimage->image)
                      <img src="https://jolbihongo.com/public/uploads/{{ $profileimage->image }}" alt="User Image"  width="200" height="160">
                    @else
                      <img src="{{ asset('assets') }}/img/profiles/avatar-01.jpg" width="200" height="160"/>
                    @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Your Bio Status</label>
                <textarea cols="30" rows="6" name="description" class="form-control">{{ $profileimage->description }}</textarea>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary buttonedit mt-3">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection