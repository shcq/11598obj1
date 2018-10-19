<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./css/comcss.css">
</head>
<body>
<div class="layui-container">
    <h1>注册页</h1>
    <div class="layui-row">
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
            <div class="layui-input-block">
                <button class="layui-btn register layui-bg-blue" type="button">注册</button>
            </div>
        </div>

    </form>
    </div>
</div>
<script src="./layui/layui.all.js"></script>
<script src="./js/register.js"></script>
</body>
</html>
</body>
</html>