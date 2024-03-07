@extends('layout.maintenceadmin.admin')
@section('content')	
	<div class="content container-fluid">

		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Add New link</li>
							</ul>
						</div>
					</div>
		</div>
		
		<?php 
		
		    $categorly = App\Models\Socialworkcategory::all();
		
		?>
		@if(session()->has('success'))
		    <div class="alert alert-success">
		        {{session()->get('success')}}
		    </div>
		@endif
		<form action="{{ route('linkadd') }}" method="POST"  enctype="multipart/form-data">
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
		        <select  class="form-select" name="category">
                    <option value="" style="display: none" selected>Select Package</option>
                        @foreach($categorly as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                </select>
		        @if($errors->has('category_id'))
			        <span class="text-danger">{{ $errors->first('category_id') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="tag_id">Total Work</label>
		        <input type="text" class="form-control" name="qty">
		        @if($errors->has('tag_id'))
			        <span class="text-danger">{{ $errors->first('tag_id') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="amount">Tk</label>
		        <input type="text" class="form-control" name="amount">
		        @if($errors->has('amount'))
			        <span class="text-danger">{{ $errors->first('amount') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="link">link</label>
		        <input type="text" class="form-control" name="link">
		        @if($errors->has('link'))
			        <span class="text-danger">{{ $errors->first('link') }}</span>
			    @endif
		    </div>
		    <div class="form-group">
		        <label for="video">User ID</label>
		        <input type="text" class="form-control" name="user_id" required>
		    </div>
		    <div class="form-group">
		        <label for="description">Description</label>
		         <textarea class="form-control" name="description" rows="4"></textarea>
		         @if($errors->has('description'))
			        <span class="text-danger">{{ $errors->first('description') }}</span>
			    @endif
		    </div>
		    <button type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>
	
@endsection
