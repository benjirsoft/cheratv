@extends('layout.account.admin') 
@section('content') 
<div class="main-wrapper login-body login_class">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox login_pswd">
					<div class="login-right">
						<div class="login-right-wrap mb-5 mt-5">
							<h1>Set Transection Pin</h1>
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
							<form action="{{ route('storepin')}}" method="POST">
								@csrf
								<div class="form-group">
									<label>New Pin</label>
									<input placeholder="Add 5 Digit Pin" class="form-control" name="newpin" type="text">
								</div>
								<div class="form-group">
									<label>Confirm Pin</label>
									<input placeholder="Add 5 Digit Pin" class="form-control" name="confirmpin" type="text">
								</div>
								
								<div class="form-group mt-5">
									<button class="btn btn-primary btn-block" type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection