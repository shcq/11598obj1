<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./css/comcss.css">
</head>
<body>
<?php
require('./common/mysql.php');
$where=' WHERE status=1';
$urlext='';
$uname='';
if(isset($_GET['uname'])&&trim($_GET['uname'])){
    $uname=trim($_GET['uname']);
    $where.=' AND uname LIKE "%'.$uname.'%"';
    $urlext.='&uname='.urlencode($uname);
}
$sql='SELECT * FROM users'.$where;
//var_dump($sql);
$r=$mydb->query($sql);
//    var_dump($r);
//    exit;

$us=$r->fetch_all(MYSQLI_ASSOC);
?>
<form action="./search.php" class="layui-form" method="get">
    <a href="./search.php?<?=$urlext?>"></a>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label mylabel"> 姓名: </label>
            <div class="layui-input-inline" style="width: 100px;">
                <input type="text" name="uname" class="layui-input" value="<?=$uname?>">
            </div>
            <div class="layui-input-inline">
                <button class="layui-btn"><i class="layui-icon layui-icon-search" style="font-size: 16px; color: #666;"></i>  查询</label></button>
                <div class="layui-form-mid layui-word-aux utip">关键字查询</div>
            </div>
        </div>
    </div>
</form>
<table class="layui-table classlist "style="text-align: center">
    <thead>

</thead>
    <tbody>
<?php
foreach ($us as $k=>$v){
echo '<tr>
                <td>'.$v['uid'].'</td>
                <td>'.str_replace($uname,'<span class="warn">'.$uname.'</span>',$v['uname']).'</td>        
                <td>'.$v['passwd'].'</td>
                <td>'.$v['head'].'</td>                
              </tr>';}
?>
</tbody>
</table>
<script src="./layui/layui.all.js"></script>
<script src="js/manage.js"></script>
</body>
</html>