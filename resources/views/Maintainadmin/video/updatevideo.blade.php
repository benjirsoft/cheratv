@extends('layout.maintenceadmin.admin')
@section('content')	
	<div class="content container-fluid">

		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Update Video</li>
							</ul>
						</div>
					</div>
		</div>
		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{session()->get('success')}}
		    </div>
		@endif
		<form action="{{ route('updatevideo') }}" method="POST"  enctype="multipart/form-data">
		    @csrf
		    <div class="form-group">
		        <label for="user_id">Title</label>
		        <input type="text" value="{{ $video->title }}" class="form-control" name="title">
		        @if($errors->has('title'))
			        <span class="text-danger">{{ $errors->first('title') }}</span>
			    @endif
		    </div>
		    <input type="text" value="{{ $video->id }}" class="form-control" name="id"  hidden>
		    <div class="form-group">
		        <label for="category_id">Category ID</label>
		        <select  class="form-select" name="category_id">
                    <option value="" style="display: none" selected>Select Package</option>

                        <option value="{{ $video->category_id }}">{{ $video->category_id }}</option>
                        
                </select>
		        @if($errors->has('category_id'))
			        <span class="text-danger">{{ $errors->first('category_id') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="tag_id">Tag ID</label>
		        <select  class="form-select" name="tag_id">
                    <option value="" style="display: none" selected>Select Package</option>
                        <option value="{{ $video->tag_id }}">{{ $video->tag_id }}</option>
                </select>
		        @if($errors->has('tag_id'))
			        <span class="text-danger">{{ $errors->first('tag_id') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="thambleimage">Thamble Image</label>
		        <input type="file" value="{{ $video->thambleimage }}" class="form-control-file" name="thambleimage">
		        @if($errors->has('thambleimage'))
			        <span class="text-danger">{{ $errors->first('thambleimage') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="video">Video</label>
		        <input type="text" value="{{ $video->video }}" class="form-control" name="video">
		        @if($errors->has('video'))
			        <span class="text-danger">{{ $errors->first('video') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="tag_id">Description</label>
		         <input type="text" value="{{ $video->description }}" size="100" class="form-control" name="description">
		         @if($errors->has('description'))
			        <span class="text-danger">{{ $errors->first('description') }}</span>
			    @endif
		    </div>
		    <button type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>
	
@endsection
