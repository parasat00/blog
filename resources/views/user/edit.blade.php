@extends('layouts.main')

@section('title', 'Edit User')

@section('header', 'Edit User')

@section('content')
    <form class="container" method="post" action="{{ route('users.update', $user->id) }}">
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
                            <label class="col-sm-3" for="name">
                                <h6 class="mb-0">Name</h6>
                            </label>
                            <input type="text" class="col-sm-9 form-control" name="name" id="name" value="{{ $user->name }}">
                        </div>
                        <hr>
                        <div class="row">
                            <label class="col-sm-3" for="email">
                                <h6 class="mb-0">Email</h6>
                            </label>
                            <input type="email" class="col-sm-9 form-control" value="{{ $user->email }}" name="email" id="email">
                        </div>
{{--                        <hr>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-3">--}}
{{--                                <h6 class="mb-0">Role</h6>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-9 text-secondary">--}}
{{--                                {{ $user->role === 1 ? 'Admin' : ($user->role === 2 ? 'Writer' : 'User') }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <input type="submit" value="Update" class="btn btn-success">
        </div>
    </form>
@endsection
