<?php
require('./common/mysql.php');

$username=$_POST['username'];
$passwd=$_POST['passwd'];

$sql='SELECT uid,uname,passwd FROM users 
WHERE uname="'.$username.'" LIMIT 1';
$r=$mydb->query($sql);
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
$sql='UPDATE users SET lasttimes="'.date('Y-m-d H:i:s',time()).'"
    WHERE uid='.$admin['uid'].' LIMIT 1';
$mydb->query($sql);

$_SESSION['uid']=$admin['uid'];
$_SESSION['uname']=$admin['uname'];
echo json_encode(['r'=>'ok']);
