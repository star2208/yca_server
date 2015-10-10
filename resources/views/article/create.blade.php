@extends('master')
@section('header')
@section('header')
        <!-- Bootstrap 3.3.2 -->
<link href="http://static.youngchina.review/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- FontAwesome 4.3.0 -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons 2.0.0 -->
<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="http://static.youngchina.review/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link href="http://static.youngchina.review/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="http://static.youngchina.review/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="http://static.youngchina.review/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="http://static.youngchina.review/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="http://static.youngchina.review/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="http://static.youngchina.review/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="http://static.youngchina.review/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
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
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">编辑</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputFile">封面</label>
                                        <input type="file" id="exampleInputFile" name="uploadFile"  enctype="multipart/form-data">
                                        <p class="help-block">封面图片，640*320像素，且经过压缩处理。由于图片服务器可能被随时干掉，编辑请保留所有图片存档以便恢复。</p>
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                    <button type="submit" class="btn btn-primary">预览</button>
                                </div>
                            </form>
                        </div><!-- /.box -->
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

    <!-- jQuery 2.1.3 -->
    <script src="http://static.youngchina.review/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="http://static.youngchina.review/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://static.youngchina.review/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="http://static.youngchina.review/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="http://static.youngchina.review/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>

    <script src="http://static.youngchina.review/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="http://static.youngchina.review/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="http://static.youngchina.review/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="http://static.youngchina.review/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="http://static.youngchina.review/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="http://static.youngchina.review/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="http://static.youngchina.review/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='http://static.youngchina.review/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="http://static.youngchina.review/dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="http://static.youngchina.review/dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="http://static.youngchina.review/dist/js/demo.js" type="text/javascript"></script>
    </body>
@endsection