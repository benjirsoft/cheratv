@extends('layout.customer.admin') 
@section('content') 
<div class="main-wrapper login-body login_class">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox login_pswd">
					<div class="login-right">
						<div class="login-right-wrap mb-5 mt-5">
							<h1>Change Password</h1>
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
							<form action="{{ route('changepassword')}}" method="post">
								@csrf
								<div class="form-group mt-5">
									<input class="form-control" required  name="old_password" type="password" placeholder="Old Password"> </div>
								<div class="form-group">
									<input class="form-control" required name="newpassword" type="password" placeholder="New Password"> </div>
								<div class="form-group">
									<input class="form-control" required name="confirmpassword" type="password" placeholder="Confirm Password"> </div>
								<div class="form-group mt-5">
									<button class="btn btn-primary" type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection