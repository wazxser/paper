<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>

<style type="text/css">
    body{
        margin: 0px;
    }
    .daohang{
        background:#4cae4c;
        width:100%;
        height: 50px;
        text-align:center;
    }
    .form input{
        height:30px;
        width:300px;
        border-radius:5px;
        border:solid 1px #aaa;
    }
</style>

<body>

<div>
    <a href="<?php echo U('Home/Index/index');?>"><img src="/paper/Public/img/paper.jpg" width="30%" height="100px"/></a>
    <input placeholder="查找" type="text" name="chazhao">
    <a href="<?php echo U('Home/Denglu/denglu');?>">登录</a>
    <a href="<?php echo U('Home/Zhuce/zhuce');?>">注册</a>
</div>

<div class="daohang">
    <a href="#">首页</a>
    <a href="#">第一项</a>
    <a href="#">第一项</a>
    <a href="#">第一项</a>
</div>

<div>
    <form action="Zhuce" method="post">
        <input type="text" name="name" placeholder="用户名"><br>
        <input type="password" name="pwd" placeholder="密码"><br>
        <input type="password" name="pwdcon" placeholder="确认密码"><br>
        <input type="submit" value="注册">
        <input type="reset" value="重置">
    </form>
</div>

</body>
</html>