@extends('dashboard.layouts.master')

@section('css')
{{-- multi select --}}
<link href="{{URL::asset('dashboard/assets/css/multiSelect.css')}}" rel="stylesheet">

{{-- notifIt --}}
<link href="{{URL::asset('dashboard/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet">

<style>
    * {
        font-size: 14px !important;
    }

    input[name='phone'] {
        text-align: end;
    }

    .pull-left {
        padding-right: 10px !important;
        text-align: right !important;
    }

    .dropdown-toggle::after {
        display: none !important;
    }
</style>
@endsection

@section('mainRoute','doctors')
@section('childRoute','edit doctor')

@section('content')
<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('doctors.update') }}" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <input type="hidden" name="id" value="{{ $doctor->id }}" />

                    <div class="pd-30 pd-sm-40 bg-gray-200">
                        {{-- name --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="name">name</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $doctor->name }}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- email --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="email">email</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="email" disabled class="form-control email" name="email" id="email"
                                    value="{{ $doctor->email }}">
                            </div>
                        </div>

                        {{-- phone --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="phone">phone</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="tel" class="form-control" name="phone" id="phone"
                                    value="{{ $doctor->phone }}">
                            </div>
                        </div>

                        {{-- section --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="section">section</label>
                            </div>

                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <select name="section_id" class="form-control" id="section">
                                    <option value="-1" selected disabled>...</option>
                                    @foreach($sections as $section)
                                    <option value="{{ $section->id }}" {{ $doctor->section_id == $section->id ?
                                        'selected' : '' }} >{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- appointments --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="appointments">appointments</label>
                            </div>

                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <select id="appointments" name="appointments" class="form-control"
                                    data-placeholder="multi select" multiple data-multi-select>
                                    @foreach ($all_appointments as $appointment)
                                    <option value="{{ $appointment }}" {{ in_array($appointment, $appointments)
                                        ? 'selected' : '' }}>
                                        {{ ucfirst($appointment) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- filename --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col col-md-2">
                                <button type="submit" class="btn btn-primary">save</button>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0 d-flex">
                                <input type="file" accept="image/*" name="filename"
                                    style="width:fit-content; height:fit-content;" onchange="previewImage(event)">

                                @if ($doctor->image)
                                <img id="output"
                                    src="{{asset('dashboard/uploads/doctors/' . $doctor->id . '/' . $doctor->image->filename)}}"
                                    style="width: 150px; height: 150px; border-radius:50%;" alt="image">

                                @else
                                no image
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /row -->

@include('doctors::message')
@endsection

@section('js')
{{-- multi select --}}
<script src="{{URL::asset('dashboard/assets/js/multiSelect.js')}}"></script>

{{-- notify --}}
<script src="{{URL::asset('dashboard/assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/notify/js/notifit-custom.js')}}"></script>

<script>
    function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
</script>
@endsection