@extends('dashboard.layouts.master')

@section('css')
{{-- multi select --}}
<link href="{{URL::asset('dashboard/assets/css/multiSelect.css')}}" rel="stylesheet">

{{-- notifIt --}}
<link href="{{URL::asset('dashboard/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet">

<style>
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
@section('childRoute','edit password')

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

                <form action="{{ route('doctors.updatePassword') }}" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <input type="hidden" name="id" value="{{ $doctor->id }}" />

                    <div class="pd-30 pd-sm-40 bg-gray-200">
                        {{-- old password --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="old_password">old password</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="password" class="form-control" name="old_password" id="old_password" />
                            </div>
                        </div>

                        {{-- new password --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="password">new password</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="password" class="form-control" name="password" id="password" />
                            </div>
                        </div>

                        {{-- confirmation password --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="password_confirmation">password confirmation</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" />
                            </div>
                        </div>

                        {{-- submit --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col col-md-2">
                                <button type="submit" class="btn btn-primary">save</button>
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