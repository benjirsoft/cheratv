@extends('layout.maintenceadmin.admin')
@section('content')	
	<div class="content container-fluid">

		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">SubCategory List</li>
							</ul>
						</div>
					</div>
		</div>
		<div class="row">
			<div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="table-responsive">
						<table class="datatable table table-stripped table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>SubCategory Name</th>
                                    <th>Description</th>
                                    <th  class="text-right" style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @if($tags->count())
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->tag }}</td>
                                        <td>{{ $tag->description }}</td>
                                        <td class="d-flex">
                                            <a href="#" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>

                                            <form action="{{ route('subcategory', [$tag->id])}}" method="POST" class="mr-1">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form>
                                            <a href="#" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @else   
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-center">No categories found.</h5>
                                        </td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>        
			</div>
		</div>

	</div>
@endsection
