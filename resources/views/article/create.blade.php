@extends('master')
@section('header')
<link href="http://static.youngchina.review/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<style type="text/css">
    .demo{width:620px; margin:30px auto}
    .demo p{line-height:32px}
    .btn input {position: absolute;top: 0; right: 0;margin: 0;border: solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;}
    .progress { position:relative; margin-left:0px; margin-top:0px; width:100%;padding: 1px; border-radius:3px; display:none}
    .bar {background-color: #00a65a; display:block; width:0%; height:20px; border-radius: 3px; }
    .percent { position:absolute; height:20px; display:inline-block; top:1px; left:2%; color:#fff }
    .files{height:22px; line-height:22px; margin:10px 0}
</style>
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
                            <!--
                            <form role="form"  method="POST" action="/file" enctype="multipart/form-data">
                            -->
                                <div class="box-body">
                                    <div class="form-group">
                                            <input id="fileupload" type="file" name="file">
                                        <p class="help-block">封面图片，640*320像素，且经过压缩处理。由于图片服务器可能被随时干掉，编辑请保留所有图片存档以便恢复。</p>
                                    </div>

                                    <div class="progress" style="display: none;">
                                        <span class="bar"></span><span class="percent">0%</span >
                                    </div>s
                                    <div class="files"></div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div id="showimg"></div>
                                </div>
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
    <script src="http://cdn.bootcss.com/jquery.form/3.51/jquery.form.js"></script>
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
        $(function () {
            var bar = $('.bar');
            var percent = $('.percent');
            var showimg = $('#showimg');
            var progress = $(".progress");
            var files = $(".files");
            var btn = $(".btn span");
            $("#fileupload").wrap("<form id='myupload'  role='form' action='/file' method='post' enctype='multipart/form-data'></form>");
            $("#fileupload").change(function(){ //选择文件
                $("#myupload").ajaxSubmit({
                    dataType:  'json', //数据格式为json
                    beforeSend: function() { //开始上传
                        showimg.empty(); //清空显示的图片
                        progress.show(); //显示进度条
                        var percentVal = '0%'; //开始进度为0%
                        bar.width(percentVal); //进度条的宽度
                        percent.html(percentVal); //显示进度为0%
                        btn.html("上传中..."); //上传按钮显示上传中
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%'; //获得进度
                        bar.width(percentVal); //上传进度条宽度变宽
                        percent.html(percentVal); //显示上传进度百分比
                    },
                    success: function(data) { //成功
                        //获得后台返回的json数据，显示文件名，大小，以及删除按钮
                        console.log(data);
                        var obj = jQuery.parseJSON(data.data);
                        files.html("<b>"+obj.name+"("+obj.size+"k)</b><span class='delimg btn btn-primary' rel='"+obj.url+"'>删除</span>");
                        //显示上传后的图片
                        var img = obj.url;
                        showimg.html("<img src='"+img+"'>");
                        btn.html("添加附件"); //上传按钮还原
                    },
                    error:function(xhr){ //上传失败
                        btn.html("上传失败");
                        bar.width('0');
                        files.html(xhr.responseText); //返回失败信息
                    }
                });
            });
        });
        $(function () {
            $(".delimg").on('click',function(){
                var pic = $(this).attr("rel");
                $.post("action.php?act=delimg",{imagename:pic},function(msg){
                    if(msg==1){
                        files.html("删除成功.");
                        showimg.empty(); //清空图片
                        progress.hide(); //隐藏进度条
                    }else{
                        alert(msg);
                    }
                });
            });
        });
    </script>
    @endsection
    </body>
@endsection