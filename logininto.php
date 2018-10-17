<?php
require('./common/admin.php');
$username=$_POST['username'];
$passwd=$_POST['passwd'];

$sql='SELECT aid,aname,passwd FROM admin 
WHERE aname="'.$username.'" LIMIT 1';
$r=$mydb->query($sql);
//var_dump($r);
//数据库查找到的数据
$admin=$r->fetch_array(MYSQLI_ASSOC);

if(!$admin){
    echo json_encode(['r'=>'uname not exist']);
    exit;
}

if(md5($passwd)!=$admin['passwd']){
    echo json_encode(['r'=>'psd error']);
    exit;
}
$sql='UPDATE admin SET lasttimes="'.date('Y-m-d H:i:s',time()).'"
    WHERE aid='.$admin['aid'].' LIMIT 1';
$mydb->query($sql);

$_SESSION['aid']=$admin['aid'];
$_SESSION['username']=$admin['username'];
echo json_encode(['r'=>'ok']);
