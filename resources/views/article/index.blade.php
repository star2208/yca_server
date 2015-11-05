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
        @include('article.sidebar')
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
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">文章列表</h3>
                                <div class="box-tools">
                                    <div class="input-group">
                                        <!--
                                        <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                        -->
                                    </div>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>标题</th>
                                        <th>栏目</th>
                                        <th>作者</th>
                                        <th>发布日期</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    <?php foreach ($articles as $article){?>
                                    <tr>
                                        <td><?php echo($article->id );?></td>
                                        <td><?php echo($article->title );?></td>
                                        <td><?php echo($article->topic->name );?></td>
                                        <td><?php echo($article->author->name );?></td>
                                        <td><?php echo($article->publishTime );?></td>
                                        <td><?php
                                                if ($article->publishTime < $nowtime)
                                                {
                                                    echo("<span class='label label-success'>已发布</span>");
                                                }
                                                else
                                                {
                                                    echo("<span class='label label-warning'>等待发布</span>");
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a type="button" class="label label-primary" href="/article/edit/main/<?php echo($article->id );?>">编辑基础信息</a>
                                            <a type="button" class="label label-primary" href="/article/edit/content/<?php echo($article->id );?>">编辑内容</a>
                                            <form method="post" action="/article/delete/<?php echo($article->id );?>" style="margin:0px;display: inline">
                                                <a type="submit" class="label label-primary">删除</a>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    <!--
                                    <tr>
                                        <td>183</td>
                                        <td>简评</td>
                                        <td>共产党宣言</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-success">已发布</span></td>
                                    </tr>
                                    <tr>
                                        <td>219</td>
                                        <td>共产党宣言</td>
                                        <td>语录</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-warning">等待发布</span></td>

                                    </tr>
                                    <tr>
                                        <td>657</td>
                                        <td>共产党宣言</td>
                                        <td>Bob Doe</td>
                                        <td>史海沉钩</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-primary">待审核</span></td>

                                    </tr>
                                    <tr>
                                        <td>175</td>
                                        <td>共产党宣言</td>
                                        <td>国际观察</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="label label-danger">未添加内容</span></td>

                                    </tr>-->
                                </table>
                                <div class="box-footer">
                                    <button class="btn btn-default" onclick="window.location.href='/article/create'"><i class="fa fa-plus"></i>添加文章</button>
                                    {!! $articles->render() !!}
                                    <!--
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="#">«</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>-->
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