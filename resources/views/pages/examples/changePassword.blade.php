@extends('Project/index')
@section('style')
<link rel="stylesheet" href="/bootstrap/css/customCss.css">
@endsection
@section('content')
<div class="col-md-6 col-md-offset-3">
            @if(isset($message))
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @endif
        </div>
        <div class="col-md-8 col-md-offset-2">
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
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Change Password</p>

                <form action="{{URL::route('change')}}" method="post" id="changePassword">

                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="OldPassword" placeholder="Old Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-sm btn-flat">Change Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-box-body -->
        </div>
@endsection
@section('footer')
<script src='/bootstrap/js/jqueryvalidation.js' type="text/javascript"></script>
        <script src="/bootstrap/js/validation.js" type="text/javascript"></script>
        
@endsection