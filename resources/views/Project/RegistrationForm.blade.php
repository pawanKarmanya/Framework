@extends('Project/index')
@section('content')
<div class="col-md-6 col-md-offset-3">
    @if(isset($message))
    <div class="alert alert-info">
        {{$message}}
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul class="error">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
<div class="register-box">

    <div class="register-logo">
        <a href="../../index2.html"><b>Registration Form</b></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="{{URL::route('register')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="FirstName" placeholder="First Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="LastName" placeholder="Last Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="UserName" placeholder="UserName">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
            <div class="radio">
                <label>
                    <input type="radio" name="GenderId" id="GenderId" value="Male" >
                Male
                </label>
            </div>
                <div class="radio">
                <label>
                    <input type="radio" name="GenderId" id="GenderId" value="Female" >
                Female
                </label>
            </div>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="Password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Confirm Password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="{{ URL::route('login')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
@endsection