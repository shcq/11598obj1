<?php
<<<<<<< HEAD
	require('./common/mysql.php');
=======
require('./common/mysql.php');
>>>>>>> 8af0f7b4afd972e300f07f21ed0e8a2ae5ebe9a0
	
	if(isset($_GET['arid'])){
		$arid=$_GET['arid'];
		$sql='SELECT arid ,title ,  content FROM arlist WHERE status = 1 AND arid=' .$arid;
		
		$r=$mydb->query($sql);
		$list=$r->fetch_all(MYSQLI_ASSOC);
	}
	//留言
	if(isset($_GET['leavemessage'])){
		
		$sql='SELECT content ,addtime ,  username FROM message WHERE 1';
		
		$r=$mydb->query($sql);
		$message=$r->fetch_all(MYSQLI_ASSOC);
	}
	
	else{
		$sql='SELECT arid ,title ,  content FROM arlist WHERE status = 1 LIMIT 5';
		$r=$mydb->query($sql);
		$list=$r->fetch_all(MYSQLI_ASSOC);
	}
	
	
	
	//查询热门文章
	$sql='SELECT arid, arnums,title ,content FROM arlist WHERE status = 1  order by arnums desc LIMIT 5';
	$x=$mydb->query($sql);
	$hot=$x->fetch_all(MYSQLI_ASSOC);
	
	//查询最近访问用户
	$sql='SELECT cuid,cuname,cunums FROM currentuser WHERE 1 order by time desc LIMIT 5';
	$y=$mydb->query($sql);
	$currentuser=$y->fetch_all(MYSQLI_ASSOC);
	
	//查询博主信息
	$sql='SELECT aid,aname,head FROM admin WHERE 1';
	$m=$mydb->query($sql);
	$admin=$m->fetch_array(MYSQLI_ASSOC);
	foreach ($admin as $k=>$v){
		$$k=$v;
	}

	//搜索文章
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
                    <a href=""><img src="images/logo.png" style="width:220px;height: 90px"/></a>
                    <!--</div>-->
                </div>
                <div class="row text-center nav_h" style="height: 50px;line-height: 50px">
                    <div class="col-2"><a href="./index.php">首页</a></div>
                    <div class="col-2"><a href="index.php?hotarticle=hotarticle">热门文章</a></div>
                    <div class="col-2"><a href="./index.php?leavemessage">留言</a></div>
                    <div class="col-2"><a href="./index.php?aboutus">关于我们</a></div>
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
                                    <span><a href="./login.html">登录</a></span> |
                                    <span><a href="./login.html">注册</a></span>
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
<<<<<<< HEAD
                    <div style="text-align: center"><img src="<?= $head?>" style="height: 65px;width: 65px;border-radius: 50%;"/></div>
                    <p style="text-align: center;padding-top: 10px"><?= $aname?></p>
=======
                    <div style="text-align: center"><img src="images/user.png" style="height: 65px;width: 65px"/></div>
                    <p style="text-align: center;padding-top: 10px"><?=$_SESSION['username']?></p>
>>>>>>> 8af0f7b4afd972e300f07f21ed0e8a2ae5ebe9a0
                    <div style="margin-left: 25px">简介:</div>
                    <div style="width: 200px;height: 70px;margin: 0 auto;border: 1px solid #c5b164">fff</div>
                </div>

                <!--搜索栏目-->
                <div style="height: 43px;border: 1px solid #c5b164;margin-top: 10px">
                    <div class="input-group mb-3">
                        <form action="./index.php"  method="get">
                            <a href="./index.php?<?=$urlext?>"></a>
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
						echo '<li>'.$v['cuname'].' <span>第'.$v['cunums'].'次访问</span></li>';
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
                    		foreach($hot as $k=>$v){
                    	//	var_dump($v);
                    	//	exit;
                    		echo '<li>
                    				<a href="index.php?arid='.$v['arid'].'">
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
                               <h4><a href="index.php?arid='.$v['arid'].'">'.str_replace($title,'<span class="warn">'.$title.'</span>',$v['title']).'</a></h4>
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
    <textarea class="form-control" rows="8" placeholder="对本博客有什么批评或者建议的请留言给我们，我们会努力做的更好的，谢谢！"></textarea>
    <input type="hidden" name="hidden" value="<?= $_SESSION["uname"]?>
    </br>
    			<button type="button" id="message" class="btn btn-primary btn-lg btn-block">提交留言</button></br></br><hr>
  					</div>
                	
                	';
                	
                    foreach ($message as $k=>$v)
                    {
                        echo '
                        	留言：
                        	<div class="message">
                               <div class="mcontent">'.$v['content'].'</div>
                               <span>'.$v['username'].' 发表于 '.$v['addtime'].'</span>
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
                				<h4><a href="index.php?arid='.$v['arid'].'"> '.$v['title'].' </a><div  style="text-align:right;padding-right:180px;font-size:13px"> <b>'.$v['arnums'].'</b>次浏览</div></h4>
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
                				<h4><a href="index.php?arid='.$v['arid'].'"> '.$v['title'].' </a></h4>
                				<hr>
                				<div class="content"> '.$v['content'].' </div>
                				</div>
                				';
                		}
                		
                		}
                	?>
                </div>
            </div>
        </div>
    </div>
<script src="./js/leavemessage.js" type="text/javascript" charset="utf-8"></script>
<?php
	require('./bottom.php');
	?>






