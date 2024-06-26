@extends('dashboard.layouts.master')

@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet">
@endsection

@section('mainRoute','sections')
@section('childRoute','show all')

@section('content')
<!-- row opened -->
<div class="row row-sm">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header pb-0">
				@if (Auth::guard('admin')->check())
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
					Add Section
				</button>
				@include('sections::add')
				@endif
			</div>

			<div class="card-body">
				<div class="table-responsive">

					<table class="table text-md-nowrap" id="example1">
						<thead>
							<tr>
								<th class="wd-5p border-bottom-0">#</th>
								<th class="wd-15p border-bottom-0 pr-2">name</th>
								<th class="wd-15p border-bottom-0 pr-2">description</th>
								<th class="wd-15p border-bottom-0 pr-2">Date added</th>
								<th class="wd-15p border-bottom-0 pr-2">Processes</th>
							</tr>
						</thead>

						<tbody>
							@foreach($sections as $section)
							<tr>
								<td>{{ $section->id }}</td>
								<td><small>
										<a href="{{ route('sections.show', ['id' => $section->id]) }}">{{ $section->name
											}}
										</a>
									</small></td>
								<td><small>{{ \Str::limit($section->description, 50, '...') }}</small></td>
								<td><small>{{ $section->created_at->diffForHumans() }}</small></td>
								<td class="d-flex">
									<a class="btn btn-sm btn-success ml-1" href="#edit-{{$section->id}}"
										data-toggle="modal">
										<i class="fas fa-pen"></i>
									</a>

									<a class="btn btn-sm btn-danger" href="#delete-{{$section->id}}"
										data-toggle="modal">
										<i class="fas fa-trash"></i>
									</a>
								</td>
							</tr>

							@include('sections::models')
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--/div-->
	@include('sections::message')
</div>
<!-- /row -->
@endsection

@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('dashboard/assets/js/table-data.js')}}"></script>

{{-- notify --}}
<script src="{{URL::asset('dashboard/assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection