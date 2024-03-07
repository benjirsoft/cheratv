@extends('layout.maintenceadmin.admin')
@section('content')	

	<div class="content container-fluid">

		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Add Website Content</li>
							</ul>
						</div>
					</div>
		</div>
		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{session()->get('success')}}
		    </div>
		@endif
		<form action="{{ route('addwebsite') }}" method="POST"  enctype="multipart/form-data">
		    @csrf
		    <div class="form-group">
		        <label for="user_id">Title</label>
		        <input type="text" class="form-control" name="title">
		        @if($errors->has('title'))
			        <span class="text-danger">{{ $errors->first('title') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="category_id">Footer</label>
		        <input type="text" class="form-control" name="footer">
		        @if($errors->has('footer'))
			        <span class="text-danger">{{ $errors->first('footer') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="thambleimage">Website Logo</label>
		        <input type="file" class="form-control-file" name="logo">
		        @if($errors->has('logo'))
			        <span class="text-danger">{{ $errors->first('logo') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="tag_id">Aboutus</label>
		         <textarea class="form-control" name="aboutus" rows="4"></textarea>
		         @if($errors->has('aboutus'))
			        <span class="text-danger">{{ $errors->first('aboutus') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="tag_id">Ruls</label>
		         <textarea class="form-control" name="ruls" rows="4"></textarea>
		         @if($errors->has('ruls'))
			        <span class="text-danger">{{ $errors->first('ruls') }}</span>
			    @endif
		    </div>
		    <button type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>
	
@endsection
