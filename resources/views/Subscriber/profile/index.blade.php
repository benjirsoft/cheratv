@extends('layout.customer.admin') 
@section('content') 
<div class="content container-fluid">
  <div class="page-header mt-5">
    <div class="row">
      <div class="col">
        <h3 class="page-title">Profile</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Profile</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="profile-header">
        <div class="row align-items-center">
          <div class="col-auto profile-image">
            <a href="#">
              @if($profile->image)
                <img src="https://jolbihongo.com/public/uploads/{{ $profile->image }}" alt="User Image" class="avatar-img rounded-circle">
              @else
                <img src="{{ asset('assets') }}/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img">
              @endif
            </a>
          </div>
          <div class="col ml-md-n2 profile-user-info">
            <h4 class="user-name mb-3">{{ $profile->username->name }}</h4>
            <h6 class="text-muted mt-1">Subscriber</h6>
            @if($profile->description) 
            <div class="about-text">{{ $profile->description }}</div>
            @else
            <div class="about-text">Secure a responsible career opportunity to fully utilize my training and skills, while making a significant contribution to the success of the company</div>
            @endif
          </div>
          <div class="col-auto profile-btn">
            <a href="{{ route('profileimage')}}" class="btn btn-primary"> Edit </a>
          </div>
        </div>
      </div>
      <div class="tab-content profile-tab-cont">
        <div class="tab-pane fade show active" id="per_details_tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title d-flex justify-content-between">
                    <span>Personal Details</span>
                    <a class="edit-link" data-toggle="modal" href="#edit_personal_details">
                      <i class="fa fa-edit mr-1"></i>Edit </a>
                  </h5>
                  <div class="row mt-5">
                    <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Name</p>
                    <p class="col-sm-9">{{ $profile->username->name }}</p>
                  </div>
                  <div class="row">
                    <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Subscriber ID</p>
                    <p class="col-sm-9">{{ $profile->username->id }}</p>
                  </div>
                  <div class="row">
                    <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email</p>
                    <p class="col-sm-9">
                      <a href="#">{{ $profile->username->email }}</a>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Refarrel Link</p>
                    <p class="col-sm-9">
                      <a href="#">Link</a>
                    </p>
                  </div>
                  <div class="row">
                    <p class="col-sm-3 text-sm-right mb-0">Mobile Banking No</p>
                    <p style="color:red; text-decoration:bold" class="col-sm-9 mb-0">{{ $personalinfo->mobilebankingno }}</p>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Personal Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('updateperasonal')}}" method="POST">
                        @csrf
                        <div class="row form-row">
                          <div class="col-12 col-sm-6">
                            <div class="form-group">
                              <label>Gender</label>
                              <select class="form-control" id="sel1" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <div class="form-group">
                              <label>Mobile Banking No (bKash)</label>
                              <input type="text" value="{{ $personalinfo->mobilebankingno }}" name="mobilebankingno" class="form-control">
                            </div>
                          </div>
                          <div class="col-12">
                              <label>Address</label>
                              <input type="text" value="{{ $personalinfo->address }}" name="address" class="form-control" value="">
                          </div>
                          <br>
                          <div class="col-12 col-sm-6">
                            <div class="form-group">
                              <label>City</label>
                              <input type="text" value="{{ $personalinfo->city }}" name="city" class="form-control" value="">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <div class="form-group">
                              <label>Blood Group</label>
                              <input type="text" value="{{ $personalinfo->state }}" name="state" class="form-control" value="">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <div class="form-group">
                              <label>Date Of Birth(Ex. 31/12/1995)</label>
                              <input type="text" value="{{ $personalinfo->zipcode }}" name="zipcode" class="form-control" value="">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <div class="form-group">
                              <label>Country</label>
                              <input type="text" value="{{ $personalinfo->country }}" name="country" class="form-control" value="Bangladesh">
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection