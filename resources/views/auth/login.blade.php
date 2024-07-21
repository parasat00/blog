@extends('layouts.app')

@section('content')
<div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        @include('utils.alert')

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
    </p>
    <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
    </p>
</div>
@endsection
