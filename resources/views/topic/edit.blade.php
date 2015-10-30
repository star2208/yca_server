@extends('master')
@section('header')
    <link rel="stylesheet" href="http://static.youngchina.review/plugins/colorpicker/bootstrap-colorpicker.min.css">
@endsection
@section('content')
    <body class="skin-blue">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo"><b>Admin</b>YCA</a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        @include('topic.sidebar')
                <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    少年中国评论
                    <small>APP控制台</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/topic"><i class="fa fa-dashboard"></i>栏目</a></li>
                    <li class="active">创建栏目</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">栏目信息</h3>
                            </div>
                            <form role="form"  action="/topic/update" method="post" >
                                <div class="box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon">题目</span>
                                        <input name = "name" type="text" class="form-control" placeholder="输入栏目题目" value="<?php echo($topic->name);?>">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">简介</span>
                                        <input name = "describe" type="text" class="form-control" placeholder="输入栏目简介，例如：如何赛艇" value="<?php echo($topic->describe);?>">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker colorpicker-element">
                                            <span class="input-group-addon">背景颜色</span>
                                            <input name="color" type="text" class="form-control" value="<?php echo($topic->color);?>">
                                            <div class="input-group-addon">
                                                <i style="background-color: rgb(0, 0, 0);"></i>
                                            </div>
                                        </div><!-- /.input group -->
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">修改栏目</button>
                                </div>
                                <input  name = "id" value="<?php echo($topic->id);?>" type='hidden'/>
                            </form>
                        </div><!-- /.box -->
                    </div><!--/.col (left) -->
                </div>   <!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0
            </div>
            <strong>Copyright &copy; 2015-3015 <a href="http://youngchina.review/">少年中国评论</a>.</strong> All rights reserved.
        </footer>
    </div><!-- ./wrapper -->
    @section('footer')
        <script src="http://cdn.bootcss.com/jquery.form/3.51/jquery.form.js"></script>
        <!-- bootstrap color picker -->
        <script src="http://static.youngchina.review/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
        <script>
            $(function () {
                $(".my-colorpicker").colorpicker();
            });
        </script>
    @endsection
    </body>
@endsection