@extends('layouts.layout')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-between flex-wrap col-8 col-sm-8 col-md-10">
                <form class="form mt-5 w-md-50 w-100" action="{{ route('register') }}" method="POST">
                    @csrf
                    <h3 class="text-center text-dark">Register</h3>
                    <div class="form-group">
                        <label for="name" class="text-dark">Name:</label><br>
                        <input type="name" name="name" id="name" class="form-control" autocomplete="">
                        @error('name')
                            <span class="fs-6 d-block text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
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
                    <div class="form-group mt-3">
                        <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
                        <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
                        @error('password_confirmation')
                            <span class="fs-6 d-block text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="remember-me" class="text-dark"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{ route('login') }}" class="text-dark btn-outline-info">Login here</a>
                    </div>
                </form>

                <div class="my-5 d-flex justify-conetnt-center flex-column align-items-center">
                    <h4 class="mb-4">Or you can login via </h4>
                    <a href="#" class="border">
                        <img src="{{asset('assets/img/goole-icon.png')}}" height="50px" alt="">
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
