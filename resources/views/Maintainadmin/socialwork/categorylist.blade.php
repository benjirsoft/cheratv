@extends('layout.maintenceadmin.admin')
@section('content')	
	<div class="content container-fluid">

		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Category List</li>
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
                                    <th>Category Name</th>
                                    <th  class="text-right" style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($list as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('socialworkcategorydelete', [$category->id])}}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>        
			</div>
		</div>

	</div>	
@endsection
