@extends('auth::layouts.master')

@section('title')
Login To Dashboard
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

        <div class="selectRole">
            <label for="selectRole">example choise</label>
            <select class="form-control" id="selectRole">
                <option value="0" selected disabled>...</option>
                <option value="admin">admin</option>
                <option value="user">user</option>
                <option value="patient">patient</option>
            </select>
        </div>

        {{--? form admin --}}
        <div class="panel multi-panel" id="admin">
            <form action="{{ route('login.admin') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>email</label>
                    <input class="form-control" type="text" name="email" value="admin@gmail.com" id="email_admin" />
                </div>

                <div class="form-group">
                    <label>password</label>
                    <input class="form-control" type="password" name="password" value="123456789" id="password_admin" />
                </div>

                <button class="form-control">sign in</button>
            </form>

            <div class="panel-footer">
                <p>
                    <a href="">Forget password?</a>
                </p>
                <p>
                    Don't have an account?
                    <a href="{{ url('/' . $page='signup') }}">Create an
                        Account</a>
                </p>
            </div>
        </div>

        {{--? form user --}}
        <div class="panel multi-panel" id="user">
            <form action="{{ route('login.user') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>email</label>
                    <input class="form-control" type="text" name="email" value="user@gmail.com" id="email_user" />
                </div>

                <div class="form-group">
                    <label>password</label>
                    <input class="form-control" type="password" name="password" value="123456789" id="password_user" />
                </div>

                <button class="form-control">sign in</button>
            </form>

            <div class="panel-footer">
                <p>
                    <a href="">Forget password?</a>
                </p>
                <p>
                    Don't have an account?
                    <a href="{{ url('/' . $page='signup') }}">Create an
                        Account</a>
                </p>
            </div>
        </div>

        {{--? form patient --}}
        <div class="panel multi-panel" id="patient">
            <form action="{{ route('login.patient') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>email</label>
                    <input class="form-control" type="text" name="email" value="patient@gmail.com" id="email_patient" />
                </div>

                <div class="form-group">
                    <label>password</label>
                    <input class="form-control" type="password" name="password" value="123456789"
                        id="password_patient" />
                </div>

                <button class="form-control">sign in</button>
            </form>

            <div class="panel-footer">
                <p>
                    <a href="">Forget password?</a>
                </p>
                <p>
                    Don't have an account?
                    <a href="{{ url('/' . $page='signup') }}">Create an
                        Account</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection