@extends('user.master')
@section('content')
<div class="card card-container" id="register-form">
    <div class="text-center">
        <h4>Register account</h4>
    </div>
    <p id="profile-name" class="profile-name-card"></p>
    <form class="form-signin" method="post" action="#">
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="email" name="email" class="form-control" placeholder="Email address" required >
        <input type="text" name="fullname" class="form-control" placeholder="Fullname" required >
        <input type="date" name="birthdate" class="form-control" placeholder="Birthdate" required >
    
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="password" name="confirmation_password" class="form-control" placeholder="Password Confirmation" required>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign up</button>
    </form><!-- /form -->
    <a href="/login" class="forgot-password">
        Have account? Login
    </a>
</div><!-- /card-container -->
@endsection