@extends('layouts.app')

@section('content')
<div class="card-body register-card-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{ route('create_user') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>

        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror

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

        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="d-flex justify-content-center">
            <!-- /.col -->
            <div>
                <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>


    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
</div>
@endsection
