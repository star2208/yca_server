@extends('master')
@section('header')
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
                    <li>
                        <a href="/article">
                            <i class="fa fa-book"></i><span>文章</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="/author">
                            <i class="fa fa-edit"></i> <span>作者</span>
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
                    <li><a href="/author"><i class="fa fa-dashboard"></i>作者</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">作者列表</h3>
                                <!--
                                <div class="box-tools">
                                    <div class="input-group">
                                        <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>-->
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>名称</th>
                                        <th>添加时间</th>
                                        <th>状态</th>
                                        <th>描述</th>
                                    </tr>
                                    <tr>
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-success">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                        <td>219</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-warning">Pending</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                        <td>657</td>
                                        <td>Bob Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-primary">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <tr>
                                        <td>175</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-danger">Denied</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                </table>
                                <!--
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="#">«</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>
                                -->
                                <div class="box-footer">
                                    <button class="btn btn-default" onclick="window.location.href='/author/create'"><i class="fa fa-plus"></i>添加作者</button>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </div>
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

    @endsection
</body>
@endsection