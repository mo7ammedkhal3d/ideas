@extends('layouts.layout')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h3 class="text-center text-dark">Login</h3>
                    <div class="form-group mt-3">
                        <label for="email" class="text-dark">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control" autocomplete="">
                        @error('email')
                            <span class="fs-6 d-block text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <span class="fs-6 d-block text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="remember-me" class="text-dark"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{ route('register') }}" class="text-dark btn-outline-info">Register here</a>
                    </div>
                </form>
                <div class="col-12 col-md-5 ">
                    <div class="my-5 d-flex justify-conetnt-center flex-column align-items-start gap-3">
                        <h4 class="mb-4 fw-bold">Or you can Sinin via </h4>
                        <a href="{{ route('authViaGoogle') }}">
                            <img src="{{ asset('assets/img/goole-icon.png') }}" height="50px" alt="">
                        </a>
                        <a href="{{ route('authViaGoogle') }}">
                            <img src="{{ asset('assets/img/twitter_5968958.png') }}" height="50px" alt="">
                        </a>
                        <a href="{{ route('authViaGoogle') }}">
                            <img src="{{ asset('assets/img/linkedin_145807.png') }}" height="50px" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
