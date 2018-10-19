<?php
	$mydb=new mysqli('localhost','root','root','weblog',3306);
	$mydb->query('SET NAMES UTF8');
	
	if(isset($_GET['arid'])){
		$arid=$_GET['arid'];
		$sql='SELECT arid ,title ,  content FROM arlist WHERE status = 1 AND arid=' .$arid;
		
		$r=$mydb->query($sql);
		$list=$r->fetch_all(MYSQLI_ASSOC);
	}else{
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
	
	
//	var_dump($list);
//	exit;
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
                    <div class="col-2"><a href="index.php">首页</a></div>
                    <div class="col-2"><a href="index.php?hotarticle=hotarticle">热门文章</a></div>
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
        <div class="row" style="overflow: hidden;">
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
            <div class="col-9" class="model_bg">
                <div style="width: 100%;height: 100px; text-align: center;line-height: 100px"><span class="font">发表的文章</span></div>
                <div style="width: 100%;height: 3px;background: #c5b164"></div>
                <div class="articlebox" style=" overflow: hidden;">
                	<?php
                		//文章详情
                		if(isset($_GET['arid'])){
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
                			//热门文章列表，按浏览次数来排序
                		}else if(isset($_GET['hotarticle'])){
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
                		
                		
                		//文章列表
                		else{
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


</div>
<script src="./js/jquery-3.3.1.js"></script>
<script src="./js/bootstrap-4.1.2-dist/js/bootstrap.js"></script>
</body>
</html>





