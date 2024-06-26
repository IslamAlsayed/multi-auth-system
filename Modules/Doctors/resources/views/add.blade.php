@extends('dashboard.layouts.master')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<link rel="stylesheet" href="{{URL::asset('dashboard/assets/plugins/notify/css/notifIt.css')}}" />

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
@section('childRoute','add new doctor')

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

                <form action="{{ route('doctors') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="pd-30 pd-sm-40 bg-gray-200">
                        {{--? name --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="name">name</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="text" class="form-control" autofocus name="name" id="name"
                                    value="{{ old('name') }}">
                            </div>
                        </div>

                        {{--? email --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="email">email</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="email" class="form-control email" name="email" id="email"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        {{--? password --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="password">password</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="password" class="form-control" name="password" id="password"
                                    value="{{ old('password') }}">
                            </div>
                        </div>

                        {{--? phone --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="phone">phone</label>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <input type="tel" class="form-control" name="phone" id="phone"
                                    value="{{ old('phone') }}">
                            </div>
                        </div>

                        {{--? section --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="section">section</label>
                            </div>

                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <select name="section_id" class="form-control" id="section">
                                    <option value="-1" selected disabled>...</option>
                                    @foreach($sections as $section)
                                    <option value="{{ $section->id }}" {{ (old('section_id')==$section->id) ?
                                        'selected':''}}>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{--? appointments --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-2">
                                <label for="appointments">appointments</label>
                            </div>

                            <div class="col-md-10 mg-t-5 mg-md-t-0">
                                <select multiple name="appointments[]" class="form-control selectpicker"
                                    id="appointments">
                                    <option value="-1" selected disabled>...</option>
                                    @foreach ($all_appointments as $appointment)
                                    <option value="{{ $appointment }}">{{ $appointment }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{--? photo --}}
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col col-md-2">
                                <button type="submit" class="btn btn-primary">save</button>
                            </div>
                            <div class="col-md-10 mg-t-5 mg-md-t-0 d-flex">
                                <input type="file" accept="image/*" name="filename"
                                    style="width:fit-content; height:fit-content;" onchange="previewImage(event)">

                                <img style="border-radius:50%; width:150px; max-width:150px; height:150px; max-height:150px"
                                    id="output" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!--Internal  Notify js -->
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