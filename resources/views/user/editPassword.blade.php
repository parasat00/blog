@extends('layouts.main')

@section('title', 'Edit User')

@section('header', 'Edit User')

@section('content')
    <form class="container" method="post" action="{{ route('users.updatePassword', $user->id) }}">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-4 mb-3">
                <div>
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ $user->image }}" alt="user-image" class="rounded-circle" width="180">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Role</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->role === 1 ? 'Admin' : ($user->role === 2 ? 'Writer' : 'User') }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="col-sm-3" for="password">
                                <h6 class="mb-0">Password</h6>
                            </label>
                            <input type="password" class="col-sm-9 form-control" name="password" id="password">
                        </div>
                        <hr>
                        <div class="row">
                            <label class="col-sm-3" for="password_confirmation">
                                <h6 class="mb-0">Confirm Password</h6>
                            </label>
                            <input type="password" class="col-sm-9 form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <input type="submit" value="Update" class="btn btn-success">
        </div>
    </form>
@endsection
