@extends('layout.maintenceadmin.admin')
@section('content')	

	<div class="content container-fluid">

		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Add New Category</li>
							</ul>
						</div>
					</div>
		</div>
		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{session()->get('success')}}
		    </div>
		@endif
		<form action="{{ route('addsocialworkcategory') }}" method="POST">
		    @csrf
		    <div class="form-group">
		        <label for="user_id">Category Name</label>
		        <input type="text" class="form-control" name="name">
		        @if($errors->has('categories'))
			        <span class="text-danger">{{ $errors->first('categories') }}</span>
			    @endif
		    </div>
		    <button type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>
	
@endsection
