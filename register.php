<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./css/comcss.css">
    <style>
        body {
            margin:0;
        }
        canvas {
            background:#CFF09E;
            display:block;
        }
    </style>
</head>
<body>
<?php
    require('./common/mysql.php');
?>
<canvas id="c" style="z-index: -1;position:absolute"></canvas>
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
                <button class="layui-btn register1 layui-bg-blue" type="button">注册</button>
                <button class="layui-btn returns layui-bg-blue" type="button">返回</button>
            </div>
        </div>

    </form>
    </div>
</div>
<script src="./layui/layui.all.js"></script>
<script src="js/manage.js"></script>
<script>
        (function(){

            var c = document.getElementById("c"),
                ctx = c.getContext("2d");

            c.width = innerWidth;
            c.height = innerHeight;

            var lines = [],
                maxSpeed = 5,
                spacing = 5,
                xSpacing = 0,
                n = innerWidth / spacing,
                colors = ["#3B8686", "#79BD9A", "#A8DBA8", "#0B486B"],
                i;

            for (i = 0; i < n; i++){
                xSpacing += spacing;
                lines.push({
                    x: xSpacing,
                    y: Math.round(Math.random()*c.height),
                    width: 2,
                    height: Math.round(Math.random()*(innerHeight/10)),
                    speed: Math.random()*maxSpeed + 1,
                    color: colors[Math.floor(Math.random() * colors.length)]
                });
            }


            function draw(){
                var i;
                ctx.clearRect(0,0,c.width,c.height);

                for (i = 0; i < n; i++){
                    ctx.fillStyle = lines[i].color;
                    ctx.fillRect(lines[i].x, lines[i].y, lines[i].width, lines[i].height);
                    lines[i].y += lines[i].speed;

                    if (lines[i].y > c.height)
                        lines[i].y = 0 - lines[i].height;
                }

                requestAnimationFrame(draw);

            }

            draw();

        }());
    </script>
</body>
</html>