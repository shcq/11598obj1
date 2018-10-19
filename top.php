<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>悠长博客</title>
    <link rel="stylesheet" href="./js/bootstrap-4.1.2-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="icon" href="./images/icon.png">
</head>
<body>

<div style="overflow: hidden">
    <div style="">
        <div id="bg"></div>
    </div>

    <!--顶部图片-->
    <div id="topimg"></div>

    <!--导航栏-->
    <div class="container" id="nav">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <!--<div class="col-4" style="background: gold">-->
                    <a href="index.php"><img src="images/logo.png" style="width:220px;height: 90px"/></a>
                    <!--</div>-->
                </div>
                <div class="row text-center nav_h" style="height: 50px;line-height: 50px">
                    <div class="col-2"><a href="index.php">首页</a></div>
                    <div class="col-2"><a href="hotarticle.php">热门文章</a></div>
                    <div class="col-2"><a href="leavemessage.php">留言</a></div>
                    <div class="col-2"><a href="aboutus.php">关于我们</a></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4 text-center" style="line-height: 130px">
                        <img src="images/user.png" height="50" width="50"/>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-8">
                                <!--欢迎来到悠长博客-->
                                <div style="text-align: center;margin-top: 45px">
                                    <span>欢迎来到悠长博客!</span><br>
                                    <span><a href="">登录</a></span> |
                                    <span><a href="">注册</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--内容主题-->
    <div class="container">
        <div class="row">
            <!--左侧各个功能框-->
            <div class="col-3"  style="padding-left: 0 ">
                <!--博主信息简介-->
                <div style="height: 250px;border: 1px solid #c5b164;padding-top: 20px" class="model_bg">
                    <div style="text-align: center"><img src="images/user.png" style="height: 65px;width: 65px"/></div>
                    <p style="text-align: center;padding-top: 10px">昵称</p>
                    <div style="margin-left: 25px">简介:</div>
                    <div style="width: 200px;height: 70px;margin: 0 auto;border: 1px solid #c5b164">fff</div>
                </div>

                <!--搜索栏目-->
                <div style="height: 50px;border: 1px solid #c5b164;margin-top: 10px">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img src="images/搜索.png" height="30"
                                                                                  width="30"/></span>
                        </div>
                        <input type="text" class="form-control" placeholder="请输入搜索关键字" aria-label="Username"
                               aria-describedby="basic-addon1">
                    </div>

                </div>

                <!--最近访问用户-->
                <div style="height: 200px;border: 1px solid #c5b164;margin-top: 10px;" class="model_bg">
                    <div style="width: 100%;height:50px;text-align: center;line-height: 50px">最近访问的用户</div>
                    <div style="width: 200px;height:130px;margin:5px  auto;border: 1px solid #c5b164">
                        hhh
                    </div>
                </div>

                <!--热门文章-->
                <div style="height: 200px;border: 1px solid #c5b164;margin-top: 10px" class="model_bg">
                    <div style="width: 100%;height:50px;text-align: center;line-height: 50px">热门文章</div>
                    <div style="width: 200px;height:130px;margin:5px  auto;border: 1px solid #c5b164">
                        hhh
                    </div>
                </div>
            </div>