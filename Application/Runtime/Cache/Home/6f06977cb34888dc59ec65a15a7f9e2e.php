<?php if (!defined('THINK_PATH')) exit();?><html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <!-- Bootstrap Core CSS -->
    <link href="/html/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/html/css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="brand">Your Paper</div>
<div class="address-bar">论文共享</div>
<!--<iframe src='/paper/index.php/Home/Index/header' style='width:100%;float:left;scrolling:0'/>-->

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            <a class="navbar-brand" href="index.html">Business Casual</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <!-- /.navbar-collapse -->
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="<?php echo U('Home/Index/index');?>">首页</a>
            </li>
            <li>
                <a href="<?php echo U('Home/Lunwen/lunwen');?>">论文</a>
            </li>
            <li>
                <a href="<?php echo U('Home/Shangchuan/shangchuan');?>">分享</a>
            </li>
            <li>
                <a href="<?php echo U('Home/Denglu/denglu');?>">登录</a>
            </li>
            <li>
                <a href="<?php echo U('Home/Zhuce/zhuce');?>">注册</a>
            </li>
            <li>
                <a href="<?php echo U('Home/Index/logout');?>">注销</a>
            </li>
            <li>
                <a style="background: #dddddd;border-radius: 5px;padding:2px;color:#fff;margin-top:30px;"><?php echo ($name); ?>(<?php echo ($score); ?>)</a>
            </li>

        </ul>
    </div>
</nav>
<!-- jQuery -->
<script src="/html/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/html/js/bootstrap.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>注册</title>

    <!-- Bootstrap Core CSS -->
    <link href="/paper/Public/html/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/paper/Public/html/css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="row">
    <div class="box" style="margin: 0px 200px 30px 200px">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">
                <strong>注册</strong>
            </h2>
            <hr>
            <style type="text/css">
                input{
                    width:310px;
                    margin: 0px 0px 0px 130px;
                }
                label{
                    margin: 0px 0px 0px 130px;
                }
                button{
                    margin: 0px 0px 10px 130px;
                }
            </style>
            <form role="form" method="post" action="zhuce">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label>用户名：</label>
                        <input style="width:410px;" type="text" name="name" class="form-control">
                    </div>
                    <br />
                    <div class="form-group col-lg-4">
                        <label>密码：</label>
                        <input style="width:410px;" type="password" name="pwd" class="form-control">
                    </div>
                    <br />
                    <div class="form-group col-lg-4">
                        <label>确认密码：</label>
                        <input style="width:410px;" type="password" name="pwdcon" class="form-control">
                    </div>
                    <br />
                    <div class="form-group col-lg-12">
                        <input type="hidden" name="save" value="contact">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container -->


<!-- jQuery -->
<script src="/paper/Public/html/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/paper/Public/html/js/bootstrap.min.js"></script>

</body>

</html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>首页</title>

    <!-- Bootstrap Core CSS -->
    <link href="/html/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/html/css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p><a href="http://www.twt.edu.cn">天外天 &hearts; 天津大学</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="/html/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/html/js/bootstrap.min.js"></script>

</body>
</html>