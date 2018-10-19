
<?php require './common/mysql.php'?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>个人后台</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="icon" href="./images/icon.png">
    <link rel="stylesheet" href="css/comcss.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <a href="pcenter.php"><div class="layui-logo">个人后台</div></a>
        <a href="admin.php"><div class="layui-logo" style="left: 90px">回到首页</div></a>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                贤心
            </li>
            <li class="layui-nav-item"><a href="">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">个人中心</a>
                    <dl class="layui-nav-child">
                        <dd><a href="passwd.php">修改密码</a></dd>
                        <dd><a href="updatames.php">修改个人资料</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;">文章管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="articlelist.php">文章列表</a></dd>
                        <dd><a href="relarticle.php">发布文章</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>