@extends('auth::layouts.master')

@section('title')
Register To Dashboard
@endsection


@section('content')
<div class="page">
    <div class="container">
        <div class="login-head">
            <a href="#">
                {{-- Image Logo --}}
                <span>50*50</span>
            </a>
            <h1 class="site-name">Site Name</h1>
        </div>
        <h2>Welcome back!</h2>

        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li class="validation-error">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        {{-- form user --}}
        <div class="panel" id="user">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>name</label>
                    <input class="form-control" type="text" name="name" value="islam-{{rand(0,10)}}" id="name" />
                </div>

                <div class="form-group">
                    <label>email</label>
                    <input class="form-control" type="text" name="email" value="user-{{rand(0,10)}}@example.com"
                        id="email" />
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input class="form-control" type="password" name="password" value="123456789" id="password" />
                </div>

                <div class="form-group">
                    <label>confirm password</label>
                    <input class="form-control" type="password" name="password_confirmation" value="123456789"
                        id="password_confirmation" />
                </div>

                <button class="form-control">register</button>
            </form>

            <div class="panel-footer">
                <p>
                    <a href="">Already registered?</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection