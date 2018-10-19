<?=
require('./common/mysql.php');
$aid=(int)$_SESSION['aid'];
$sql='SELECT * FROM admin WHERE status=1 AND aid='.$aid;
$r=$mydb->query($sql);
$adm=$r->fetch_array(MYSQLI_ASSOC);
foreach ($adm as $key=>$value){
    $$key=$value;
}

$where=' WHERE status=1';
$urlext='';
$title='';
if(isset($_GET['title'])&&trim($_GET['title'])){
    $title=trim($_GET['title']);
    $where.=' AND title LIKE "%'.$title.'%"';
    $urlext.='&title='.urlencode($title);
}
$sql='SELECT * FROM arlist'.$where;
$r1=$mydb->query($sql);
$articles=$r1->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>悠长博客</title>
    <link rel="stylesheet" href="./js/bootstrap-4.1.2-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="css/comcss.css">
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
                    <a href="admin.php"><img src="images/logo.png" style="width:220px;height: 90px"/></a>
                </div>
                <div class="row text-center nav_h" style="height: 50px;line-height: 50px">
                    <div class="col-2"><a href="admin.php">首页</a></div>
                    <div class="col-2"><a href="ahotart.php">热门文章</a></div>
                    <div class="col-2"><a href="almess.php">留言</a></div>
                    <div class="col-2"><a href="aabout.php">关于我们</a></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4 text-center header" style="line-height: 130px;margin-top: 10px">
                        <img src="<?=$_SESSION['head'] ? $_SESSION['head'] : 'images/user.png' ?>" height="50" width="50"/>
                        <button type="button" class="btn btn-outline-warning" style="
                                padding: 0 2px;margin-top: 10px"><span style="font-size: 15px">
                                        <a href="./updatames.php">个人后台</a></span></button>
                    </div>
                    <div class="col-8">
                        <div class="row">

                            <div class="col-8">
                                <!--欢迎来到悠长博客-->

                                <div style="text-align: center;margin-top: 25px">

                                    <span><?= $aname ?></br>欢迎来到悠长博客!</span><br>
<!--                                    <span><a href="">登录</a></span> |-->
                                    <span><a href="./logout.php">退出登录</a></span>
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
                <div style="height: 270px;border: 1px solid #c5b164;padding-top: 20px" class="model_bg">
                    <div style="text-align: center;" class="header"><img src="<?=$head?>" style="height: 65px;width: 65px"/></div>
                    <p style="text-align: center;padding-top: 10px"><?=$_SESSION['username']?></p>
                    <div style="margin-left: 25px">简介:</div>
                    <div style="width: 200px;height: 70px;margin: 0 auto;border: 1px solid #c5b164"><?=$info?></div>
<!--                    <button type="button" class="btn btn-primary btn-sm">Small button</button>-->
                </div>

                <!--搜索栏目-->
                <div style="height: 43px;border: 1px solid #c5b164;margin-top: 10px">
                    <div class="input-group mb-3">
                        <form action="./admin.php"  method="get">
                            <a href="./admin.php?<?=$urlext?>"></a>
                            <button style="background-color: #c2c2c2;width: 40px;height: 40px">
                                <img src="images/搜索.png" height="30" width="30"/>
                            </button>
                            <input type="text" style="height: 38px;font-family: 新宋体"
                                   name="title" class="layui-input" placeholder="请输入搜索关键字"
                            value="<?= $title ?>">
                        </form>
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

            <!--右边文章主体-->
            <div class="col-9" class="model_bg">
                <div style="width: 100%;height: 100px;text-align: center;line-height: 100px"><span class="font">发表的文章</span></div>
                <div style="width: 100%;height: 3px;background: #c5b164">
                    <?php
                    foreach ($articles as $k=>$v)
                    {
                        echo '<div>
                               <div>'.str_replace($title,'<span class="warn">'.$title.'</span>',$v['title']).'</div>
                               <div>'.$v['content'].'</div>
                            </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 50px"></div>

</div>
<script src="./js/jquery-3.3.1.js"></script>
<script src="./js/bootstrap-4.1.2-dist/js/bootstrap.js"></script>
</body>
</html>





