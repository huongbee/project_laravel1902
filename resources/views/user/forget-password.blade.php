@extends('user.master')
@section('title','Forget password')
@section('content')
<div class="card card-container" style="margin-top:200px; max-width:500px">
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h4>Forget password</h4>
            </div>
        </div>
    </div>
    <form class="form-signin" method="post" action="send-email-forgetpassword">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Enter email" required autofocus>
        
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Submit</button>
    </form><!-- /form -->
    <a href="/login" class="forgot-password">
        Back
    </a>
</div><!-- /card-container -->
@endsection