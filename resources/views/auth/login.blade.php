@extends('master')
@section('header')
<!-- Bootstrap 3.3.2 -->
<link href="http://static.youngchina.review/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="http://static.youngchina.review/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="http://static.youngchina.review/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="http://static.youngchina.review/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
@endsection
@section('content')
    <body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>YCA</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
           <!-- <p class="login-box-msg">Sign in to start your session</p>-->
            <form method="POST" action="/auth/login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group has-feedback">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="http://static.youngchina.review/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="http://static.youngchina.review/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="http://static.youngchina.review/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    </body>
@endsection