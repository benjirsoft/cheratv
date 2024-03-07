@extends('layout.maintenceadmin.admin')
@section('content')
<div class="content container-fluid">
		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Social Work Status</li>
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
                                    <th>Total Work</th>
                                    <th>Done</th>
                                    <th>Pending</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($results as $videos)
                                    <tr>
                                        <td>{{ $videos->title }}</td>
                                        <td>{{ \App\Models\Socialworkcategory::where('id', $videos->category)->first()->name ?? null }}</td>
                                        <td>{{ $videos->qty }}</td>
                                        <td>{{ $videos->totalcount }}</td>
                                        <td>{{ $videos->qty - $videos->totalcount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>        
			</div>

	</div>	
@endsection
