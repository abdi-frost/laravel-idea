@extends('layout.layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="" method="POST">
                @csrf
                <h3 class="text-center text-dark">Register</h3>
                <div class="form-group">
                    <label for="name" class="text-dark">Name:</label><br>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')
                        <div class="mt-1 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <div class="mt-1 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="password_confirmation" class="text-dark">Confirm Password:</label><br>
                    <input type="text" name="password_confirmation" id="password_confirmation-password" class="form-control">
                    @error('password')
                        <div class="mt-1 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <button type="submit" name="submit" class="btn btn-dark btn-md">Submit</button>
                </div>
                <div class="text-right mt-2">
                    <a href="/login" class="text-dark">Login here</a>
                </div>
            </form>
        </div>
    </div>
@endsection