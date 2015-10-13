@extends('master')
@section('header')
<link href="http://static.youngchina.review/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="/">
                            <i class="fa fa-circle-o"></i><span>总览</span>
                        </a>
                    </li>
                    <!--
                    <li class="treeview">
                        <a href="/review">
                            <i class="fa fa-edit"></i> <span>简评</span>
                        </a>
                    </li>-->
                    <li class="active">
                        <a href="/article">
                            <i class="fa fa-book"></i><span>文章</span>
                        </a>
                    </li>
                    <li>
                        <a href="/notification">
                            <i class="fa fa-calendar"></i> <span>推送任务</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    少年中国评论
                    <small>APP控制台</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/article"><i class="fa fa-dashboard"></i>文章</a></li>
                    <li class="active">创建文章</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">基础信息</h3>
                            </div>
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon">标题</span>
                                    <input type="text" class="form-control" placeholder="输入标题内容">
                                    <!--
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" type="button">确定</button>
                                    </span>
                                    -->
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon">作者</span>
                                    <select class="form-control">
                                        <option>YCA1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">发布时间</span>
                                        <input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime form-control">
                                    </div><!-- /.input group -->
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">刷新预览</button>
                                <button type="submit" class="btn btn-primary">发布文章</button>
                            </div>
                        </div>
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">封面</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form"  method="POST" action="/file">
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="file" id="exampleInputFile" name="uploadFile"  enctype="multipart/form-data">
                                        <p class="help-block">封面图片，640*320像素，且经过压缩处理。由于图片服务器可能被随时干掉，编辑请保留所有图片存档以便恢复。</p>
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">上传</button>
                                </div>
                            </form>
                        </div><!-- /.box -->
                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="box-title">文章内容</h3>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加大标题</button>
                                <button type="submit" class="btn btn-primary">添加小标题</button>
                                <button type="submit" class="btn btn-primary">添加插图</button>
                                <button type="submit" class="btn btn-primary">添加一段正文</button>
                                <button type="submit" class="btn btn-primary">添加一段正文</button>
                            </div>
                        </div>
                    </div><!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">
                        <!-- general form elements disabled -->
                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">预览</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">

                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!--/.col (right) -->
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
    <script type="text/javascript" src="http://static.youngchina.review/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="http://static.youngchina.review/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
    </script>
    @endsection
    </body>
@endsection