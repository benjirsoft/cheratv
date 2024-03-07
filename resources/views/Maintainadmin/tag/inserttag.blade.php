@extends('layout.maintenceadmin.admin')
@section('content')	

	<div class="content container-fluid">

		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Add New SubCategory</li>
							</ul>
						</div>
					</div>
		</div>
		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{session()->get('success')}}
		    </div>
		@endif
		<form action="{{ route('addtag') }}" method="POST">
		    @csrf
		    <div class="form-group">
		        <label for="user_id">SubCategory Name</label>
		        <input type="text" class="form-control" name="tag">
		        @if($errors->has('tag'))
			        <span class="text-danger">{{ $errors->first('tag') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="category_id">SubCategory Description</label>
		        <input type="text" class="form-control" name="description">
		        @if($errors->has('description'))
			        <span class="text-danger">{{ $errors->first('description') }}</span>
			    @endif
		    </div>
		    	
		    <button type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>
	
@endsection