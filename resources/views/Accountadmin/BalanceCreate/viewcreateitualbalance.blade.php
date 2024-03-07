@extends('layout.account.admin')
@section('content')	
	<div class="content container-fluid">

		<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Vitual Balance Create List</li>
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
                                    <th style="width: 10px">SL</th>
                                    <th>Balance</th>
                                    <th>Date Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @if($viewvitualbalance->count())
                                @foreach ($viewvitualbalance as $index => $vitualbalance)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $vitualbalance->balances }}</td>
                                        <td>{{ \Carbon\Carbon::parse($vitualbalance->created_at)->format('M d, Y h:i A') }}</td>
                                       
                                    </tr>
                                @endforeach
                                @else   
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-center">No New found.</h5>
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
