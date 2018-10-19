<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改用户信息</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./css/comcss.css">
</head>
<body>
<?php
    require('./common/mysql.php');
    $uid=(int)$_GET['uid'];
    $sql='SELECT * FROM users WHERE status=1 AND uid='.$uid;
    $r=$mydb->query($sql);
    $us=$r->fetch_array(MYSQLI_ASSOC);
    foreach ($us as $key=>$value){
        $$key=$value;
    }
?>

<div class="layui-container ">
    <h1>用户信息修改</h1>
    <div class="layui-row">
        <input type="hidden" name="uid" value="<?=$uid?>">
        <form class="layui-form loginform">
        <div class="layui-form-item">
            <label class="layui-form-label"><i class="layui-icon layui-icon-username" style="font-size: 16px; color: #666;"></i>  账号</label>
            <div class="layui-input-inline">
                <input type="text" name="username" placeholder="请输入姓名" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux utip">用户名2-4位汉字</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><i class="layui-icon layui-icon-password" style="font-size: 16px; color: #666;"></i>  密码</label>
            <div class="layui-input-inline">
                <input type="password" name="passwd" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux ptip">密码6位数字</div>
        </div>
            <div class="layui-form-item">
                <label class="layui-form-label">头像</label>
                <div class="layui-input-inline">
                    <label class="header" for="header">
                        <img src="<?=$head ? $head : './img/罗小黑1.jpg' ?>" alt="">
                    </label>
                    <input type="file" name="header" id="header" class="preheader">
                    <input type="hidden" name="head" value="<?=$head?>">
                </div>
            </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn update layui-bg-blue" type="button">用户修改</button>
            </div>
        </div>
    </form>
    </div>
</div>
<script src="./layui/layui.all.js"></script>
<script src="./js/manage.js"></script>
</body>
</html>
