<?php
require './common/admin.php';
$uid=(int)$_SESSION['uid'];
$sql='SELECT * FROM users WHERE status=1 AND uid='.$uid;
$r=$mydb->query($sql);
$adm=$r->fetch_array(MYSQLI_ASSOC);
foreach ($adm as $key=>$value){
    $$key=$value;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>个人后台</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="icon" href="./images/icon.png">
    <link rel="stylesheet" href="./css/comcss.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <a href="usercenter.php"><div class="layui-logo">个人后台</div></a>
        <a href="user.php"><div class="layui-logo" style="left: 90px">回到首页</div></a>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <img src="<?=$head ? $head : './img/罗小黑1.jpg' ?>" class="layui-nav-img">
                <?=$uname ?>
            </li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">个人中心</a>
                    <dl class="layui-nav-child">
                        <dd><a href="userpw.php">修改密码</a></dd>
                        <dd><a href="userupdatames.php">修改个人资料</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>