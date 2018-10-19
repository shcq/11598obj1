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
            <form class="layui-form">
                <div class="layui-form-item">
                    <label class="layui-form-label">昵称</label>
                    <div class="layui-input-inline">
                        <input type="text" name="sname" placeholder="请输入昵称" autocomplete="off" class="layui-input">
                    </div><div class="layui-form-mid layui-word-aux">*必填</div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">头像</label>
                    <div class="layui-input-inline">
                        <input type="file" name="header" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">手机号</label>
                    <div class="layui-input-inline">
                        <input type="text" name="tel" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">*必填</div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">简介</label>
                    <div class="layui-input-block">
                        <div id="editor">

                        </div>

                        <textarea name="info" id="info" cols="30" rows="10" class="hide"></textarea>

                        <!-- <div id="editor1">
                        <p>上海</p>
                        </div> -->

                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn addstu" type="button">修改</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!--<script src="http://unpkg.com/wangeditor/release/wangEditor.min.js"></script>-->

<?php require 'abottom.php'?>