@extends('layout.maintenceadmin.admin')
@section('content')
<div class="content container-fluid">
		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Website Content List</li>
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
                                    <th>Thamble Image</th>
                                    <th>Video</th>
                                    <th  class="text-right" style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @if($video->count())
                                @foreach ($video as $videos)
                                    <tr>
                                      
                                        <td style="width:100px">{{ $videos->title }}</td>
                                        <td>
                                            <div style="max-width: 363px; max-height:203px;overflow:hidden">
                                                <img width="363" height="203" src="{{ asset($videos->thambleimage) }}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            <iframe width="200" height="150" src="{{ $videos->video }}" frameborder="0" allowfullscreen></iframe>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('editevideo', [$videos->id]) }}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>

                                            <form action="{{ route('videodelete', [$videos->id]) }}" method="POST"   enctype="multipart/form-data" class="mr-1">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                @else   
                                    <tr>
                                        <td colspan="10">
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
@endsection
