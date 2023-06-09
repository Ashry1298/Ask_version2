@extends('layout')
@section('title')
    Login page
@endsection

@section('content')
    @include('inc/errors')
    @if (session()->has('failed_login'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session()->get('failed_login') }}</li>
            </ul>
        </div>
    @endif

    <form action="{{ route('auth.handlelogin') }}" method="post" class="shadow p-4 rounded mt-5"
        style="width: 90%; max-width: 50rem;">
        @csrf
        <h1 class="text-center pb-5 display-4 fs-3">
            Login
        </h1>
        <div class="mb-3">
            <label class="form-label">
                Email
            </label>
            <input type="email" class="form-control" value="{{old('email')}}" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">
                password
            </label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">
            Submit</button>
    </form>
    </div>
@endsection
