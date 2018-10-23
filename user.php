<?php
require('./common/mysql.php');


$sql='SELECT * FROM admin WHERE status=1';
$r1=$mydb->query($sql);
$a=$r1->fetch_array(MYSQLI_ASSOC);
foreach ($a as $key=>$value){
    $$key=$value;
}
$uid=(int)$_SESSION['uid'];
$sql='SELECT * FROM users WHERE status=1 AND uid='.$uid;
$r=$mydb->query($sql);
$us=$r->fetch_array(MYSQLI_ASSOC);
foreach ($us as $key=>$value){
    $key=$value;
}

	
	//查询最近访问用户
	$sql='SELECT uid,uname,lasttimes FROM users WHERE 1 order by lasttimes desc LIMIT 5';
	$y=$mydb->query($sql);
	$currentuser=$y->fetch_all(MYSQLI_ASSOC);



	//搜索文章

	$where=' WHERE status=1';
	$urlext='';
    $title='';
if(isset($_GET['title'])&&trim($_GET['title'])){
    $title=trim($_GET['title']);
    $where.=' AND title LIKE "%'.$title.'%"';
    $urlext.='&title='.urlencode($title);
}

//分页
$pagenum = 2;
//计算总页数 $totalpage = ($totalnums / $pagenum)
$sql = 'SELECT COUNT(arid) AS totalnums FROM arlist' . $where;

$r = $mydb->query($sql);
$row = $r->fetch_array(MYSQLI_ASSOC);
//var_dump($row);
//var_dump($pagenum);
$totalpage = ceil($row['totalnums'] / $pagenum);

//当前是第几页
$page = (isset($_GET['page']) && (int)$_GET['page'] > 0 && (int)$_GET['page'] <= $totalpage) ? $_GET['page'] : 1;

$sql = 'SELECT * FROM arlist' . $where . ' LIMIT ' . ($page - 1) * $pagenum . ', ' . $pagenum;
$r1=$mydb->query($sql);
$articles=$r1->fetch_all(MYSQLI_ASSOC);
require('./page.php');
$ext = '';
if(isset($_GET['arid'])){
    $arid=$_GET['arid'];

    $sql='SELECT arid ,title ,  content FROM arlist WHERE status = 1 AND arid=' .$arid;

    $sql1 ='UPDATE arlist SET arnums = arnums+1 WHERE status = 1 AND arid=' .$arid;
    $mydb->query($sql1);
    $r=$mydb->query($sql);
    $list=$r->fetch_all(MYSQLI_ASSOC);

}
//留言
else if(isset($_GET['leavemessage'])) {
    $ext = 'leavemessage=1&';
    $sql1 = 'SELECT COUNT(mid) AS totalnums FROM message';
//    var_dump($sql1);
    $r1 = $mydb->query($sql1);
    $row1 = $r1->fetch_array(MYSQLI_ASSOC);
    $totalpage = ceil($row1['totalnums'] / $pagenum);
    $page = (isset($_GET['page']) && (int)$_GET['page'] > 0 && (int)$_GET['page'] <= $totalpage) ? $_GET['page'] : 1;
    $sql = 'SELECT content ,addtime ,  username FROM message LIMIT ' . ($page - 1) * $pagenum . ', ' . $pagenum;
    //var_dump($sql);
    $r = $mydb->query($sql);
    $message = $r->fetch_all(MYSQLI_ASSOC);
    require('./page.php');
}else if(isset($_GET['hotarticle'])) {
    $ext = 'hotarticle=1&';
    $sql1 = 'SELECT COUNT(arid) AS totalnums FROM arlist';
//    var_dump($sql1);
    $r1 = $mydb->query($sql1);
    $row1 = $r1->fetch_array(MYSQLI_ASSOC);
    $totalpage = ceil($row1['totalnums'] / $pagenum);
    $page = (isset($_GET['page']) && (int)$_GET['page'] > 0 && (int)$_GET['page'] <= $totalpage) ? $_GET['page'] : 1;
    //查询热门文章
    $sql='SELECT arid, arnums,title ,content FROM arlist WHERE status = 1  order by arnums desc 
          LIMIT '.($page - 1) * $pagenum . ', ' . $pagenum;
    $x=$mydb->query($sql);
    $hot=$x->fetch_all(MYSQLI_ASSOC);
    require('./page.php');
}

else{
    $sql='SELECT arid ,title ,  content FROM arlist WHERE status = 1 LIMIT '.($page-1)*$pagenum.',' . $pagenum;
    echo $sql;
    $r=$mydb->query($sql);
    $list=$r->fetch_all(MYSQLI_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>悠长博客</title>
    <link rel="stylesheet" href="./js/bootstrap-4.1.2-dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./js/jquery-3.3.1.js"></script>
    <script src="./js/bootstrap-4.1.2-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="js/bootstrap-4.1.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/comcss.css">
    <link rel="stylesheet" href="css/my.css">
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
                    <a href="user.php"><img src="images/logo.png" style="width:220px;height: 90px"/></a>
                </div>
                <div class="row text-center nav_h" style="height: 50px;line-height: 50px">
                    <div class="col-2"><a href="./user.php">首页</a></div>
                    <div class="col-2"><a href="user.php?hotarticle">热门文章</a></div>
                    <div class="col-2"><a href="./user.php?leavemessage">留言</a></div>
                    <div class="col-2"><a href="./user.php?aboutus">关于我们</a></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-4 text-center header" style="line-height: 60px;margin-top: 10px;">
                        <img src="<?=$us['head'] ? $us['head']  : 'images/user.png' ?>" height="50" width="50"/>
                        <button type="button" class="btn btn-outline-warning" style="
                                padding: 0 2px;"><span style="font-size: 15px">
                                        <a href="./usercenter.php">个人后台</a></span></button>
                    </div>
                    <div class="col-8">
                        <div class="row">

                            <div class="col-8">
                                <!--欢迎来到悠长博客-->

                                <div style="text-align: center;margin-top: 25px">

                                    <span><?= $us['uname'] ?></br>欢迎来到悠长博客!</span><br>
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
        <div class="row" style="overflow: hidden;">
            <!--左侧各个功能框-->
            <div class="col-3"  style="padding-left: 0 ">
                <!--博主信息简介-->
                <div style="height: 250px;border: 1px solid #c5b164;padding-top: 20px" class="model_bg">
                    <div style="text-align: center"><img src="<?= $head?>" style="height: 65px;width: 65px;border-radius: 50%;"/></div>
                    <p style="text-align: center;padding-top: 10px"><?= $aname?></p>
                    <div style="margin-left: 25px">简介:</div>
                    <div style="width: 200px;height: 70px;margin: 0 auto;border: 1px solid #c5b164"><?=$a['info']?></div>
<!--                    <button type="button" class="btn btn-primary btn-sm">Small button</button>-->
                </div>

                <!--搜索栏目-->
                <div style="height: 43px;border: 1px solid #c5b164;margin-top: 10px">
                    <div class="input-group mb-3">
                        <form action="./user.php"  method="get">
                            <a href="./user.php?page=<?=$p.$urlext?>"></a>

                            <button type="button" class="btn btn-success">搜索</button>
                            <input type="text" style="height: 40px;width:160px;font-family: 新宋体"
                                   name="title" class="layui-input" placeholder="请输入搜索关键字"
                            value="<?= $title ?>">
                            <button style="background-color: #c2c2c2;width: 40px;height: 40px">
                            <img src="images/搜索.png" height="30" width="30"/>
                            </button>
                        </form>
                    </div>

                </div>

                <!--最近访问用户-->
                <div class="model_bg">
                    <div style="width: 100%;height:50px;text-align: center;line-height: 50px">最近访问的用户</div>
                    <div style="width: 200px;height:250px;margin:5px  auto;border: 1px solid #c5b164">
                        <ul class="user">
                            <?php
                            foreach($currentuser as $k=>$v){
//						var_dump($v);
//						exit;
                                echo '<li>'.$v['uname'].' </br> <span>'.$v['lasttimes'].'访问</span></li>';

                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <!--热门文章-->
                <div class="model_bg">
                    <div style="width: 100%;height:50px;text-align: center;line-height: 50px">热门文章</div>
                    <div style="width: 200px;height:250px;margin:5px  auto;border: 1px solid #c5b164">
                        <ul class="hot">
                        <?php
                        $sql='SELECT arid, arnums,title ,content FROM arlist WHERE status = 1  
                        order by arnums desc LIMIT 5';
                        $x1=$mydb->query($sql);
                        $hot1=$x1->fetch_all(MYSQLI_ASSOC);
                        foreach($hot1 as $k=>$v){
                            //	var_dump($v);
                            //	exit;
                            echo '<li>
                    				<a href="user.php?arid='.$v['arid'].'">
                    				 '.$v['title'].' </a><span> '.$v['arnums'].'次浏览</span>
                    			  </li>';
                        }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!--右边文章主体-->
                	<?php
                		//文章详情
                		if(isset($_GET['arid'])){
                			echo'
            <div class="col-9" class="model_bg">
                <div style="width: 100%;height: 100px; text-align: center;line-height: 100px"><span class="font">发表的文章</span></div>
                <div style="width: 100%;height: 3px;background: #c5b164"></div>
                <div class="articlebox" style=" overflow: hidden;">
                	';
                    foreach($list as $k=>$v){
                        //			var_dump($v);
                        //			exit;
                        echo '
                				<div class="article">
                				<div style="magin-top:20px;"><h3> '.$v['title'].'</h3></div>
                				<hr>
                				<div class="content1"> '.$v['content'].' </div>
                				</div>
                				';
                		}
                			
                		}
                		
                		//搜索
                		else if(isset($_GET['title'])){
                			echo'
                			<div class="col-9" class="model_bg">
                <div style="width: 100%;height: 100px; text-align: center;line-height: 100px"><span class="font">搜索文章</span></div>
                <div style="width: 100%;height: 3px;background: #c5b164"></div>
                <div class="articlebox" style=" overflow: hidden;">
                	';
                    foreach ($articles as $k=>$v)
                    {
                        echo '
                        	<div class="article">
                        	<div>
                               <h4><a href="user.php?arid='.$v['arid'].'">'.str_replace($title,'<span class="warn">'.$title.'</span>',$v['title']).'</a></h4>
                               <hr>
                               <div class="content">'.$v['content'].'</div>
                            </div>
                            </div>
                            ';
                    }
                    
                		}
                		//留言板
                		else if(isset($_GET['leavemessage'])){
                			echo'
                			<div class="col-9" class="model_bg">
                <div style="width: 100%;height: 100px; text-align: center;line-height: 100px"><span class="font">留言板</span></div>
                <div style="width: 100%;height: 3px;background: #c5b164"></div>
                <div class="articlebox" style=" overflow: hidden;">
                	<div class="form-group">
    <textarea class="form-control" rows="6" placeholder="对本博客有什么批评或者建议的请留言给我们，我们会努力做的更好的，谢谢！"></textarea>
    <input type="hidden" name="hidden" value="'.$_SESSION['uname'].'">
    </br>
    			<button type="button" id="message" class="btn btn-primary btn-lg btn-block">提交留言</button></br><hr>
  					</div>
                	
                	';
                	
                    foreach ($message as $k=>$v)
                    {
                        echo '
                        	<div class="message">
                        	<div style="text-align: left ;margin-bottom: 10px;color: #9c7c40;font-family: 宋体"> ----- 留言：---</div>
                               <div class="mcontent">'.$v['content'].'</div>
                               <div style=" text-align: right;padding: 10px">'.$v['username'].' 发表于 '.$v['addtime'].'</div>
                            </div>
                            ';

                    }


                		}

                		//热门文章
                		else if(isset($_GET['hotarticle'])){
                			echo'
                			<div class="col-9" class="model_bg">
                <div style="width: 100%;height: 100px; text-align: center;line-height: 100px"><span class="font">热门文章</span></div>
                <div style="width: 100%;height: 3px;background: #c5b164"></div>
                <div class="articlebox" style=" overflow: hidden;">
                	';
                				foreach($hot as $k=>$v){
                	//			var_dump($v);
                	//			exit;
                			echo '
                				<div class="article">
                				<h4><a href="user.php?arid='.$v['arid'].'"> '.$v['title'].' </a><div  style="text-align:right;padding-right:180px;font-size:13px"> <b>'.$v['arnums'].'</b>次浏览</div></h4>
                				<hr>
                				<div class="content"> '.$v['content'].' </div>
                				</div>
                				';
                    }
                }
                		else if(isset($_GET['aboutus'])){
                			echo'
                			<div class="col-9">
    <div style="width: 100%;height: 100px;text-align: center;line-height: 100px"><span class="font">关于我们</span></div>
    <div style="width: 100%;height: 3px;background: #c5b164"></div>
    <div style="width: 700px;height: 450px;border: 2px solid #c5b164;margin: 20px auto">
        <p style="margin-top: 20px" class="wow bounceInDown">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;这是由我们三人开发的一个关于历史的博客，我们借此平台和广大各位网友一起讨论我们中国的一些历史兴衰：王朝的兴起、衰弱；皇帝的功与过，是开疆扩土、以身作则还是昏庸无道、懦弱无能，每个皇帝背后的故事；重大战役的转变。我们可以讨论如果事情朝着另一个方向发展，那么我们的历史又如何改变等等。
        </p>
        <p class="wow bounceInUp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们会经常发布一些或大或小历史事件的博文，欢迎来到此博客尽情讨论。</p>
    </div>

</div>
                			';
                		}
                		
                //文章列表
                		else{
                			echo'
                			<div class="col-9" class="model_bg">
                <div style="width: 100%;height: 100px; text-align: center;line-height: 100px"><span class="font">发表的文章</span></div>
                <div style="width: 100%;height: 3px;background: #c5b164"></div>
                <div class="articlebox" style=" overflow: hidden;">
                	';
                    foreach($list as $k=>$v){
                        //			var_dump($v);
                        //			exit;
                        echo '
                				<div class="article">
                				<h4><a href="user.php?arid='.$v['arid'].'"> '.$v['title'].' </a></h4>
                				<hr>
                				<div class="content"> '.$v['content'].' </div>
                				</div>
                				';
                		}
                		
                		}
                	?>
            <ul class="pagination">
                <li>
                    <a href="./user.php?<?=$ext?>page=<?= $prev .$urlext?>">上一页</a>
                </li>
                <?php
                for ($p = $start; $p <= $end; $p++)
                {


                    echo '<li>
                        <a href="./user.php?'.$ext.'page='  . $p . $urlext. '">' . $p . '</a></li>';
                }
                ?>
                <li>
                    <a href="./user.php?<?=$ext?>page=<?= $next . $urlext ?>" >下一页</a>
                </li>


            </ul>
                </div>
            </div>
        </div>
    </div>
<script src="./js/leavemessage.js" type="text/javascript" charset="utf-8"></script>
<?php
	require('./bottom.php');
	?>
