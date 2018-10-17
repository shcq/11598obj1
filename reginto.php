<?php
require('./common/mysql.php');
$username=$_POST['username'];
$passwd=$_POST['passwd'];

$sql='SELECT aid,aname,passwd FROM admin 
WHERE aname="'.$username.'" LIMIT 1';
$r=$mydb->query($sql);
$admin=$r->fetch_array(MYSQLI_ASSOC);

if($admin){
    echo json_encode(['r'=>'uname already exist']);
//    exit;
}else{
    $sql='INSERT INTO admin(aname,passwd,lasttimes) VALUES ("'.$username.'","'.md5($passwd).'","'.date('Y-m-d H:i:s',time()).'")';
    $r=$mydb->query($sql);
    echo json_encode(['r'=>'register success']);
}
//echo json_encode(['r'=>'failed']);