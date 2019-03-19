@extends('user.master')
@section('title','Register')
@section('content')
<div class="card card-container" id="register-form">
    <div class="text-center">
        <h4>Register account</h4>
    </div>
    <p id="profile-name" class="profile-name-card"></p>
    <form class="form-signin" method="post" action="/register">
        @csrf
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus value="{{old('username')}}">
        @if($errors->has('username'))
            <div class="text-danger">
                {{$errors->first('username')}}
            </div>
        @endif
        <input type="email" name="email" class="form-control" placeholder="Email address" required value="{{old('email')}}">
        @if($errors->has('email'))
            <div class="text-danger">
                {{$errors->first('email')}}
            </div>
        @endif
        <input type="text" name="fullname" class="form-control" placeholder="Fullname" required value="{{old('fullname')}}">
        @if($errors->has('fullname'))
            <div class="text-danger">
                {{$errors->first('fullname')}}
            </div>
        @endif
        <input type="date" name="birthdate" class="form-control" placeholder="Birthdate" required >
        @if($errors->has('birthdate'))
            <div class="text-danger">
                {{$errors->first('birthdate')}}
            </div>
        @endif
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        @if($errors->has('password'))
            <div class="text-danger">
                {{$errors->first('password')}}
            </div>
        @endif
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
        @if($errors->has('password_confirmation'))
            <div class="text-danger">
                {{$errors->first('password_confirmation')}}
            </div>
        @endif
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign up</button>
    </form><!-- /form -->
    <a href="/login" class="forgot-password">
        Have account? Login
    </a>
</div><!-- /card-container -->
@endsection