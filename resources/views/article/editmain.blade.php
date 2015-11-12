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
                    <li class="active">编辑文章基础信息</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

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
                                    </div>
                                    <div class="files"></div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div id="showimg"></div>
                                </div>
                        </div><!-- /.box -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">基础信息</h3>
                            </div>
                            <form role="form"  action="/article/update" method="post" >
                                <div class="box-body">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <br>
                                    @endif
                                    <div class="input-group">
                                        <span class="input-group-addon">标题</span>
                                        <input name = "title" type="text" class="form-control" placeholder="输入标题内容" value="<?php echo($article->title);?>">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">简介</span>
                                        <input name = "describe" type="text" class="form-control" placeholder="输入简介内容" value="<?php echo($article->describe);?>">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">栏目</span>
                                        <select class="form-control" name="topic" >
                                            <option value = "<?php echo($article->topic->id);?>"><?php echo($article->topic->name);?></option>
                                            <?php foreach ($topics as $topic){
                                            if($article->topic->name !=$topic){ ?>
                                            <option value = "<?php echo($topic->id );?>"><?php echo($topic->name );?></option>
                                            <?php }}?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">作者</span>
                                        <select class="form-control" name="author" >
                                            <option value = "<?php echo($article->author->id);?>"><?php echo($article->author->name);?></option>
                                            <?php foreach ($authors as $author){
                                            if($article->topic->name !=$topic){ ?>
                                            <option value = "<?php echo($author->id );?>"><?php echo($author->name );?></option>
                                            <?php }}?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">展示类型</span>
                                        <select class="form-control" name="style" >
                                            <option value = "<?php echo($article->style);?>"><?php $dic=['大图','小图','图组'];echo($dic[$article->style]);?></option>
                                            <?php if($article->style != 1) echo("<option value = '1'>大图</option>");?>
                                            <?php if($article->style != 2) echo("<option value = '2'>小图</option>");?>
                                            <?php if($article->style != 3) echo("<option value = '3'>图组</option>");?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">发布时间</span>
                                            <input name = "publishTime" size="16" type="text" value="<?php echo(date_create($article -> publishTime)->format('Y-m-d H:i'));?>" readonly class="form_datetime form-control">
                                        </div><!-- /.input group -->
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">保存修改</button>
                                </div>
                                <input id ="pic_uuid" type="hidden" name="cover" value="">
                                <input  name = "id" value="<?php echo($article->id);?>" type='hidden'/>
                            </form>
                        </div>
                        <!--
                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="box-title">添加文章内容</h3>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary small.margin">大标题</button>
                                <button type="submit" class="btn btn-primary small.margin">小标题</button>
                                <button type="submit" class="btn btn-primary small.margin">插图</button>
                                <button type="submit" class="btn btn-primary small.margin">一段正文</button>
                            </div>
                        </div>
                        -->
                    </div><!--/.col (left) -->
                    <!-- right column -->

                    <!--
                    <div class="col-md-6">
                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">预览</h3>
                            </div>
                            <div class="box-body">
                            </div>
                        </div>
                    </div>
                    -->


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
            var pic_uuid = $('#pic_uuid');
            var bar = $('.bar');
            var percent = $('.percent');
            var showimg = $('#showimg');
            var progress = $(".progress");
            var files = $(".files");
            var btn = $(".btn span");
            var fileupload = $("#fileupload");
            $("#fileupload").wrap("<form id='myupload'  role='form' action='/file' method='post' enctype='multipart/form-data'></form>");
            var uuid = "<?php echo($article ->cover); ?>";
            var img = "/file?uuid="+uuid+"&width=640&height=320";
            showimg.html("<img src='"+img+"' style='max-width:100%'>");
            pic_uuid.val(uuid);

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
                            "<div class='input-group'><div class='input-group-btn'><button id='delete'  rel='"+obj.uuid+"' type='button' class='delimg btn btn-danger '>删除</button></div><!-- /btn-group --><input type='text' class='form-control' readonly value='" + obj.name +"("+obj.size +"k)'"+"></div>"
                        );
                        //显示上传后的图片
                        var img = "/file?uuid="+obj.uuid+"&width=640&height=320";
                        showimg.html("<br><img src='"+img+"' style='max-width:100%'>");
                        pic_uuid.val(obj.uuid);
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