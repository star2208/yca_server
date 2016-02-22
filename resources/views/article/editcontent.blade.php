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
                    <li class="active">编辑文章内容</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary collapsed-box">
                                    <div class="box-header">
                                        <h3 class="box-title">封面</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <img src="/file?uuid=<?php echo($article->cover);?>&width=640&height=320" style='max-width:100%'>
                                    </div>
                                </div><!-- /.box -->
                            </div>
                            <div class="col-md-12">
                                <div class="box box-success collapsed-box">
                                    <div class="box-header">
                                        <h3 class="box-title">基础信息</h3>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
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
                                            <input name = "title" type="text" class="form-control" placeholder="输入标题内容" readonly value="<?php echo($article->title);?>">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon">栏目</span>
                                            <input name = "title" type="text" class="form-control" placeholder="输入标题内容" readonly value="<?php echo($article->topic->name);?>">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon">作者</span>
                                            <input name = "title" type="text" class="form-control" placeholder="输入标题内容" readonly value="<?php echo($article->author->name);?>">

                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">发布时间</span>
                                                <input name = "publishTime" size="16" type="text"  class="form_datetime form-control"  readonly value="<?php echo($article->publishTime);?>">
                                            </div><!-- /.input group -->
                                        </div>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                        </div>

                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="box-title">删除最后一段文章内容</h3>
                            </div>
                            <div class="box-footer">
                                <button id="delete" type="submit" class="btn btn-danger small.margin">删除</button>
                            </div>
                        </div>

                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">添加大标题</h3>
                            </div>
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon">大标题</span>
                                    <input type="text" id="title_h1" placeholder="输入大标题内容" class="form-control">
                                    <span class="input-group-btn">
                                        <button  id="big_title" type="submit" class="btn btn-warning btn-flat">提交</button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">添加小标题</h3>
                            </div>
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon">小标题</span>
                                    <input type="text" id="title_h2" placeholder="输入小标题内容" class="form-control">
                                    <span class="input-group-btn">
                                        <button id = "small_title" type="submit" class="btn btn-warning btn-flat">提交</button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">添加引用</h3>
                            </div>
                            <div class="box-body">
                                <div class="input-group">
                                    <span class="input-group-addon">链接地址</span>
                                    <input type="text" id="link_url" placeholder="输入小标题内容" class="form-control">
                                    <span class="input-group-addon">引用名称</span>
                                    <input type="text" id="link_text" placeholder="输入引用名称" class="form-control">
                                    <span class="input-group-btn">
                                        <button id = "link_btn" type="submit" class="btn btn-warning btn-flat">提交</button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">添加插图</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <input id="fileupload" type="file" name="file">
                                    <p class="help-block">插图，640*320像素，且经过压缩处理。由于图片服务器可能被随时干掉，编辑请保留所有图片存档以便恢复。</p>
                                </div>
                                <div class="progress" style="display: none;">
                                    <span class="bar"></span><span class="percent">0%</span >
                                </div>
                            </div>
                        </div>

                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">一段正文</h3>
                            </div>
                            <div class="box-body">
                                <textarea id="text_area" class="form-control" rows="3" placeholder="输入一段正文内容"></textarea>
                            </div>
                            <div class="box-footer">
                                <button id="text" type="submit" class="btn btn-warning small.margin">提交</button>
                            </div>
                        </div>
                        <?php if(array_key_exists('admin',$user->level)) { echo("
                        <div class='box box-danger'>
                            <div class='box-header'>
                                <h3 class='box-title'>审核（管理员可见）</h3>
                            </div>
                            <div id='accept_div' class='box-body'>
                                ");
                                if($article->accepted)
                                {
                                    echo("<h3>审核通过</h3>");
                                }
                                else
                                {
                                    echo("<h3>尚未审核</h3>");
                                }
                         echo("
                            </div>
                            <div class='box-footer'>
                                <button id='accept' type='submit' class='btn btn-success small.margin'>通过审核</button>
                                <button id='cancel_accept' type='submit' class='btn btn-danger small.margin'>取消审核（会撤下已经发布的文章）</button>
                            </div>
                        </div>
                        ");} ?>
                    </div><!--/.col (left) -->
                    <!-- right column -->


                    <div class="col-md-6">
                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">内容</h3>
                            </div>
                            <div class="box-body" id="article_content">

                            </div>
                        </div>
                    </div>



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
            $.refresh_preview = function(content) {
                console.log(content);
                var article_content = $('#article_content');
                article_content.empty();
                $("#title_h1").val('');
                $("#title_h2").val('');
                $("#text_area").val('');
                $(".progress").hide();
                $("#link_url").val('');
                $("#link_text").val('');
                $.each(content, function(i,val){
                    switch(val['type'])
                    {
                        case 0:
                            article_content.append("<h1>" + val['text'] + "</h1>");
                            break;
                        case 1:
                            article_content.append("<h2>" + val['text'] + "</h2>");
                            break;
                        case 2:
                            article_content.append("<h3>" + val['text'] + "</h3>");
                            break;
                        case 3:
                            article_content.append("<img src='/file?uuid="+val['img']+"&width=640&height=320' style='max-width:100%'>");
                            break;
                        case 4:
                            article_content.append("<a href='" + val['link_url'] + "' target='_blank'>" + val['link_text'] + "</a><br>");
                            break;
                        default:
                            break;
                    }
                });
            };
            $.refresh_preview(<?php echo(json_encode($article->content["content"])); ?>);
            $(function () {
                var bar = $('.bar');
                var percent = $('.percent');
                var progress = $(".progress");
                var fileupload = $("#fileupload");
                var article_id = "<?php echo($article->id); ?>";
                $("#fileupload").wrap("<form id='myupload'  role='form' action='/file' method='post' enctype='multipart/form-data'></form>");
                $("#fileupload").change(function(){ //选择文件
                    $("#myupload").ajaxSubmit({
                        dataType:  'json', //数据格式为json
                        beforeSend: function() { //开始上传
                            progress.show(); //显示进度条
                            var percentVal = '0%'; //开始进度为0%
                            bar.width(percentVal); //进度条的宽度
                            percent.html(percentVal); //显示进度为0%
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                            var percentVal = percentComplete + '%'; //获得进度
                            bar.width(percentVal); //上传进度条宽度变宽
                            percent.html(percentVal); //显示上传进度百分比
                        },
                        success: function(data) {
                            var obj = jQuery.parseJSON(data.data);
                            console.log();
                            $.post("/article/content/add/pic" ,{pic_id:obj.uuid,id:article_id},function(msg){
                                console.log(msg);
                                $.refresh_preview(msg["content"]);
                            });
                        },
                        error:function(xhr){
                            bar.width('0');
                        }
                    });
                });
                $(function () {
                    $(document).on('click',"#delete",function(){
                        $.post("/article/content/delete/" + article_id ,function(msg){
                            console.log(msg);
                            $.refresh_preview(msg["content"]);
                        });
                    });
                });
                $(function () {
                    $(document).on('click',"#big_title",function(){
                        $.post("/article/content/add/big",{big_title:$("#title_h1").val(),id:article_id},function(msg){
                            console.log(msg);
                            $.refresh_preview(msg["content"]);
                        });
                    });
                });
                $(function () {
                    $(document).on('click',"#small_title",function(){
                        $.post("/article/content/add/small",{small_title:$("#title_h2").val(),id:article_id},function(msg){
                            console.log(msg);
                            $.refresh_preview(msg["content"]);
                        });
                    });
                });
                $(function () {
                    $(document).on('click',"#text",function(){
                        $.post("/article/content/add/text",{text:$("#text_area").val(),id:article_id},function(msg){
                            console.log(msg);
                            $.refresh_preview(msg["content"]);
                        });
                    });
                });
                $(function () {
                    $(document).on('click',"#link_btn",function(){
                        $.post("/article/content/add/link",{link_url:$("#link_url").val(),link_text:$("#link_text").val(),id:article_id},function(msg){
                            console.log(msg);
                            $.refresh_preview(msg["content"]);
                        });
                    });
                });
                $(function () {
                    $(document).on('click',"#accept",function(){
                        $.post("/article/accept",{id:article_id},function(msg){
                            console.log(msg);
                            $("#accept_div").html('<h3>审核通过</h3>');
                        });
                    });
                });
                $(function () {
                    $(document).on('click',"#cancel_accept",function(){
                        $.post("/article/cancel_accept",{id:article_id},function(msg){
                            console.log(msg);
                            $("#accept_div").html('<h3>尚未审核</h3>');
                        });
                    });
                });
            });
        </script>
    @endsection
    </body>
@endsection