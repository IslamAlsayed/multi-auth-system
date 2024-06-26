@extends('dashboard.layouts.master')

@section('css')
<!-- Internal Data table css -->

<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

{{-- notifIt --}}
<link href="{{URL::asset('dashboard/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet">
@endsection

@section('mainRoute','doctors')
@section('childRoute','show all')

@section('content')
<!-- row opened -->
<div class="row row-sm">
	<div class="col-xl-12">
		<div class="card">
			@if (Auth::guard('admin')->check())
			<div class="card-header">
				<a href="{{ route('doctors.create') }}" class="btn btn-primary">Add Doctor</a>
				<a class="btn btn-danger" href="#deleteAll" id="deleteAllModel">
					delete group
					<i class="fas fa-trash"></i>
				</a>
			</div>
			@endif

			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-md-nowrap" id="example1">
						<thead>
							<tr>
								<th class="wd-5p border-bottom-0 pr-2">#</th>
								<th class="wd-5p border-bottom-0 pr-2">select</th>
								<th class="wd-15p border-bottom-0 pr-2">name</th>
								<th class="wd-15p border-bottom-0 pr-2">photo</th>
								<th class="wd-15p border-bottom-0 pr-2">section</th>
								<th class="wd-15p border-bottom-0 pr-2">email</th>
								<th class="wd-20p border-bottom-0 pr-2">phone</th>
								{{-- <th class="wd-20p border-bottom-0 pr-2">added date</th> --}}
								<th class="wd-20p border-bottom-0 pr-2">status</th>
								<th class="wd-20p border-bottom-0 pr-2">action</th>
							</tr>
						</thead>

						<tbody>
							@foreach($doctors as $doctor)
							<tr>
								<td>{{ $doctor->id }}</td>
								<td>
									<input type="checkbox" name="deleteOne" class="checkbox deleteOne"
										value="{{ $doctor->id }}">
								</td>
								<td><small>{{ $doctor->name }}</small></td>
								<td>
									@if($doctor->image)
									<img src="{{asset('dashboard/uploads/doctors/' . $doctor->id . '/' . $doctor->image->filename)}}"
										style="width: 50px; height: 50px" alt="image">
									@else
									<img src="{{asset('dashboard/uploads/doctor_default.png')}}"
										style="width: 50px; height: 50px" alt="image">
									@endif
								</td>
								<td><small>{{ $doctor->section->name }}</small></td>
								<td><small class="email">{{ $doctor->email }}</small></td>
								<td><small>{{ $doctor->phone }}</small></td>
								{{-- <td><small>{{ $doctor->created_at->diffForHumans() }}</small></td> --}}
								<td>
									<div class="dot-label bg-{{ $doctor->status == 1 ? 'success':'danger'}} ml-1"></div>
									<small>{{$doctor->status == 1 ? 'enabled' : 'not enabled' }}</small>
								</td>
								<td class="d-flex">
									<div class="dropdown">
										<button aria-expanded="false" aria-haspopup="true"
											class="btn ripple btn-outline-primary btn-sm"
											data-toggle="dropdown">processes
											<i class="fas fa-caret-down mr-1"></i>
										</button>

										<div class="dropdown-menu tx-13">
											<a class="dropdown-item"
												href="{{ route('doctors.edit', ['id' => $doctor->id ]) }}">
												<i class="fas fa-user"></i>
												edit data
											</a>

											<a class="dropdown-item"
												href="{{ route('doctors.changeEmail', ['id' => $doctor->id ]) }}">
												<i class="fas fa-key"></i>
												change email
											</a>

											<a class="dropdown-item"
												href="{{ route('doctors.changePassword', ['id' => $doctor->id ]) }}">
												<i class="fas fa-key"></i>
												change password
											</a>

											<a class="dropdown-item" href="#updateStatus-{{ $doctor->id }}"
												data-toggle="modal">
												<i class="fas fa-circle"></i>
												update status
											</a>

											<a class="dropdown-item" href="#delete-{{ $doctor->id }}"
												data-toggle="modal">
												<i class="fas fa-trash"></i>
												delete doctor
											</a>
										</div>
									</div>

									{{-- <a href="{{ route('doctors.edit', ['id' => $doctor->id ]) }}"
										class="btn btn-sm btn-success ml-1">
										<i class="fas fa-pen"></i>
									</a>

									<a class="btn btn-sm btn-danger" href="#delete-{{ $doctor->id }}"
										data-toggle="modal">
										<i class="fas fa-trash"></i>
									</a> --}}
								</td>
							</tr>

							@include('doctors::models')
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--/div-->
	@include('doctors::message')
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

{{-- main scrip --}}
<script src="{{URL::asset('dashboard/assets/js/main.js')}}"></script>
@endsection