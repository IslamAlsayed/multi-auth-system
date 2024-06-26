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

@section('mainRoute','section')
@section('childRoute','all doctors in section')

@section('content')
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="example1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">section</th>
                                <th scope="col">phone</th>
                                <th scope="col">appointments</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->section->name }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>{{ $doctor->appointments }}</td>
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
                                </td>
                            </tr>
                            @include('sections::updateStatus')
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