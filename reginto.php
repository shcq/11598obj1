<?php
require('./common/mysql.php');
foreach ($_POST as $key => $value) {
    $$key = $value;
}
$sql='SELECT uid FROM users
WHERE uname="'.$username.'" LIMIT 1';
$r=$mydb->query($sql);
$admin=$r->fetch_array(MYSQLI_ASSOC);
//$sql='UPDATE users SET head="'.$head.'"
//    WHERE uid='.(int)$uid;
//$r=$mydb->query($sql);
if($admin){
    echo json_encode(['r'=>'uname already exist']);
//    exit;
}else{
    $sql='INSERT INTO users(uname,passwd,head,lasttimes) VALUES ("'.$username.'","'.md5($passwd).'","'.$head.'","'.date('Y-m-d H:i:s',time()).'")';
    $r=$mydb->query($sql);
    echo json_encode(['r'=>'register success']);
}
