@extends('layout.maintenceadmin.admin')
@section('content')	
	<div class="content container-fluid">

		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Add New Video</li>
							</ul>
						</div>
					</div>
		</div>
		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{session()->get('success')}}
		    </div>
		@endif
		<form action="{{ route('addvideo') }}" method="POST"  enctype="multipart/form-data">
		    @csrf
		    <div class="form-group">
		        <label for="user_id">Title</label>
		        <input type="text" class="form-control" name="title">
		        @if($errors->has('title'))
			        <span class="text-danger">{{ $errors->first('title') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="category_id">Category</label>
		        <select  class="form-select" name="category_id">
                    <option value="" style="display: none" selected>Select Package</option>
                        @foreach($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->categories }}</option>
                        @endforeach
                </select>
		        @if($errors->has('category_id'))
			        <span class="text-danger">{{ $errors->first('category_id') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="tag_id">SubCategorySubCategory</label>
		        <select  class="form-select" name="tag_id">
                    <option value="" style="display: none" selected>Select Package</option>
                        @foreach($tags as $t)
                        <option value="{{ $t->id }}">{{ $t->tag }}</option>
                        @endforeach
                </select>
		        @if($errors->has('tag_id'))
			        <span class="text-danger">{{ $errors->first('tag_id') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="thambleimage">Thamble Image</label>
		        <input type="file" class="form-control-file" name="thambleimage">
		        @if($errors->has('thambleimage'))
			        <span class="text-danger">{{ $errors->first('thambleimage') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="video">Video</label>
		        <input type="text" class="form-control" name="video">
		        @if($errors->has('video'))
			        <span class="text-danger">{{ $errors->first('video') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="video">User ID</label>
		        <input type="text" class="form-control" name="userid" required>
		    </div>
		    <div class="form-group">
		        <label for="tag_id">Description</label>
		         <textarea class="form-control" name="description" rows="4"></textarea>
		         @if($errors->has('description'))
			        <span class="text-danger">{{ $errors->first('description') }}</span>
			    @endif
		    </div>
		    <button type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>
	
@endsection