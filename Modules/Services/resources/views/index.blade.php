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

@section('mainRoute','services')
@section('childRoute','show all')

@section('content')
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (Auth::guard('admin')->check())
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addService">
                    Add Services
                </button>
                @include('services::add')
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-5p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0 pr-2">name</th>
                                <th class="wd-15p border-bottom-0 pr-2">price</th>
                                <th class="wd-15p border-bottom-0 pr-2">Status</th>
                                <th class="wd-15p border-bottom-0 pr-2">description</th>
                                <th class="wd-15p border-bottom-0 pr-2">Processes</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->price }}</td>
                                <td>
                                    <div class="dot-label bg-{{ $service->status == 1 ? 'success':'danger'}} ml-1">
                                    </div>
                                    {{ $service->status == 1 ? 'enabled' : 'not enabled'}}
                                </td>
                                <td>{{ Str::limit($service->description, 50) }}</td>
                                <td>{{ $service->created_at->diffForHumans() }}</td>
                                <td class="d-flex">
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true"
                                            class="btn ripple btn-outline-primary btn-sm"
                                            data-toggle="dropdown">processes
                                            <i class="fas fa-caret-down mr-1"></i>
                                        </button>

                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="#edit-{{ $service->id }}"
                                                data-toggle="modal">
                                                <i class="fas fa-user"></i>
                                                edit data
                                            </a>

                                            <a class="dropdown-item" href="#updateStatus-{{ $service->id }}"
                                                data-toggle="modal">
                                                <i class="fas fa-circle"></i>
                                                update status
                                            </a>

                                            <a class="dropdown-item" href="#delete-{{ $service->id}}"
                                                data-toggle="modal">
                                                <i class="fas fa-trash"></i>
                                                delete service
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('services::models')
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