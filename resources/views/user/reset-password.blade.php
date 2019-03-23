@extends('user.master')
@section('title','Reset password')
@section('content')
<div class="card card-container" style="margin-top:100px; max-width:500px">
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h4>Reset password</h4>
            </div>
        </div>
    </div>
    <form class="form-signin" method="post" action="reset-password">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{$email}}" readonly required>

        <input type="password" name="password" class="form-control" placeholder="Enter password" required>

        <input type="password" name="password_confirmation" class="form-control" placeholder="Enter confirmation password" required>
        
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Reset</button>
    </form><!-- /form -->
    <a href="/login" class="forgot-password">
        Login
    </a>
</div><!-- /card-container -->
@endsection