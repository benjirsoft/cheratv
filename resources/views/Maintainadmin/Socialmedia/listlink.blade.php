@extends('layout.maintenceadmin.admin')
@section('content')
<div class="content container-fluid">
		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Social Work List</li>
							</ul>
						</div>
					</div>
		</div>
		<div class="row">
			<div class="col-md-12 d-flex">
						<table class="table table-striped table-light">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Link</th>
                                    <th>Total Work</th>
                                    <th>TK</th>
                                    <th>User</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($link as $videos)
                                    <tr>
                                        <td>{{ $videos->title }}</td>
                                        <td>{{ App\Models\Socialworkcategory::where('id', $videos->category)->first()->name ?? null ; }}</td>
                                        <td>{{ $videos->link }}</td>
                                        <td>{{ $videos->qty }}</td>
                                        <td>{{ $videos->amount }}</td>
                                        <td>{{ $videos->user_id }}</td>
                                        <td>{{ $videos->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>        
			</div>

	</div>	
@endsection
