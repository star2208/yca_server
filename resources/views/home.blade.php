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
                <li class="active treeview">
                    <a href="/">
                        <i class="fa fa-circle-o"></i><span>总览</span>
                    </a>
                </li>
                <li>
                    <a href="/article">
                        <i class="fa fa-book"></i><span>文章</span>
                    </a>
                </li>
                <li>
                    <a href="/author">
                        <i class="fa fa-edit"></i> <span>作者</span>
                    </a>
                </li>
                <li>
                    <a href="/topic">
                        <i class="fa fa-columns"></i> <span>栏目</span>
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
                <li><a href="/"><i class="fa fa-dashboard"></i>首页</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo($notification_count) ?></h3>
                            <p>今日推送任务</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-notifications"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo($homepage_count) ?></h3>
                            <p>今日首页新增文章</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo($today_article_count) ?></h3>
                            <p>今日新文章</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo($article_count) ?></h3>
                            <p>文章总数</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-newspaper-o"></i>
                            <h3 class="box-title">FAQ</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="callout callout-Gray">
                                <h4>这是什么？</h4>
                                <p>这是少年中国评论（YCA）的app管理后台。他用来管理首页，专栏，文章以及作者信息和推送任务</p>
                            </div>
                            <div class="callout callout-Gray">
                                <h4>现在有Android和IOS版吗？</h4>
                                <p>现在都没有，Android版正在开发，现在在对接这里的数据</p>
                            </div>
                            <div class="callout callout-Gray">
                                <h4>使用遇到bug怎么办？</h4>
                                <p>联系技术组的吕天成，QQ：462892672</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div><!-- /.row (main row) -->

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