<?php
require './common/mysql.php';


foreach($_POST as $k=>$v){
	$$k = $v;
}

$sql = 'INSERT INTO message(content ,addtime ,username) VALUES ("' . $x . '", "'.date('Y-m-d H:i:s').'" ,"' . $hidden . '")';
$r = $mydb->query($sql);

if($r) {
	echo json_encode(['r'=>'ok']);
} else{
	echo json_encode(['r'=>'fail']);
}
