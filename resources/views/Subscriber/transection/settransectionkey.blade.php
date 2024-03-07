@extends('layout.customer.admin') 
@section('content') 
<div class="main-wrapper login-body login_class">
		<div class="login-wrapper">
			<div class="container">
				        

				<div class="loginbox login_pswd">
					<div class="login-right">
						<div class="login-right-wrap mb-5 mt-5">
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
							<h1>Set Transfer Pin</h1>
							<form action="{{ route('settreansecction')}}" method="POST">
								@csrf
								<div class="form-group">
									<input class="form-control" placeholder="New Pin 5 Digit" name="newpin" type="numeric"></div>
								<div class="form-group">
									<input class="form-control" placeholder="Confirm Pin 5 Digit" name="confirmpin" type="numeric"></div>
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