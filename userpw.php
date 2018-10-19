<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>个人后台</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="icon" href="./images/icon.png">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <a href="usercenter.php"><div class="layui-logo">个人后台</div></a>

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
                        <dd><a href="userpw.php">修改密码</a></dd>
                        <dd><a href="userupdatames.php">修改个人资料</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <form class="layui-form" action="">
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" name="username" required lay-verify="required" value="111" readonly
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">用户名不可改</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码框</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password" required lay-verify="required" placeholder="请输入密码"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">输入新密码</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">确认密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password" required lay-verify="required" placeholder="确认密码"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">再次输入新密码</div>
                </div>



                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn pwsubmit" lay-submit lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
            <script src="./layui/layui.js"></script>
            <script>
                //Demo
                layui.use('form', function () {
                    var form = layui.form;

                    //监听提交
                    form.on('submit(formDemo)', function (data) {
                        layer.msg(JSON.stringify(data.field));
                        return false;
                    });
                });
            </script>
        </div>
    </div>

<?php require 'abottom.php'?>