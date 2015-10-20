@extends('master')
@section('header')
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
        @include('author.sidebar')
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
                    <li class="active">编辑作者</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">作者信息</h3>
                            </div>
                            <form role="form"  action="/author/create" method="post" >
                                <div class="box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon">姓名</span>
                                        <input name = "name" type="text" class="form-control" placeholder="输入作者姓名" value="<?php echo($author->name);?>">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">简介</span>
                                        <input name = "describe" type="text" class="form-control" placeholder="输入作者简介，例如：谈笑风生的长者" value="<?php echo($author->describe);?>">
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-body">
                                    <div class="form-group">
                                            <input id="fileupload" type="file" name="file">
                                        <p class="help-block">头像图片，320*320像素</p>
                                    </div>

                                    <div class="progress" style="display: none;">
                                        <span class="bar"></span><span class="percent">0%</span >
                                    </div>
                                    <div class="files"></div>
                                </div><!-- /.box-body -->
                                <div id="showimg"></div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">创建作者</button>
                                </div>
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
    <script type="text/javascript">
        $(function () {
            var bar = $('.bar');
            var percent = $('.percent');
            var showimg = $('#showimg');
            var progress = $(".progress");
            var files = $(".files");
            var btn = $(".btn span");
            var fileupload = $("#fileupload");
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
                        var obj = jQuery.parseJSON(data.data);
                        console.log(obj);
                        files.html(
                            "<input  name = 'headimage' value='" + obj.uuid + "' type='hidden'/>"+
                            "<div class='input-group'><div class='input-group-btn'><button id='delete'  rel='"+obj.uuid+"' type='button' class='delimg btn btn-danger '>删除</button></div><!-- /btn-group --><input type='text' class='form-control' readonly value='" + obj.name +"("+obj.size +"k)'"+"></div>"
                        );
                        //显示上传后的图片
                        var img = obj.url;
                        showimg.html("<img src='"+img+"'>");

                    },
                    error:function(xhr){ //上传失败
                        btn.html("上传失败");
                        bar.width('0');
                        files.html(xhr.responseText); //返回失败信息
                    }
                });
            });
            $(function () {
                $(document).on('click',"#delete",function(){
                    var pic = $(this).attr("rel");
                    $.post("/file/delete",{id:pic},function(msg){
                        console.log(msg);
                        if(msg.status == 200){
                            files.html("<span class='label label-success'>删除成功</span>");
                            showimg.empty(); //清空图片
                            progress.hide(); //隐藏进度条
                            fileupload.val('');
                        }else{
                            files.html("删除失败.");
                        }
                    });
                });
            });
        });
    </script>
    @endsection
    </body>
@endsection