@extends('layout.account.admin') 
@section('content') 
<div class="main-wrapper login-body login_class">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox login_pswd">
					<div class="login-right">
						<div class="login-right-wrap mb-5 mt-5">
							<h1>Change Transection Pin</h1>
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
							<form action="{{ route('updateconfirm')}}" method="POST">
								@csrf
								<div class="form-group mt-5">
									<label>Old  pin</label>
									<input class="form-control" name="oldpin" type="text" placeholder="old pin"> </div>
								<div class="form-group">
									<label>New  pin</label>
									<input class="form-control" type="text" name="newpin" placeholder="New Pin 5 Digit"> </div>
								<div class="form-group">
									<label>Confirm  pin</label>
									<input class="form-control" type="text" name="confirmpin" placeholder="Confirm Pin 5 Digit"> </div>
								<div class="form-group mt-5">
									<button class="btn btn-primary btn-block" type="submit">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection