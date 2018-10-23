<?php
require('./common/mysql.php');

$passwdA=$_POST['passwdA'];
$passwdB=$_POST['passwdB'];

//var_dump($passwdA);
if($passwdA != $passwdB){
    echo json_encode(['r'=>'password_inconsistency']);
    exit;
}


$sql = 'update admin set passwd = "'.md5($passwdB).'" where aid ='.(int)$_SESSION['aid'].' LIMIT 1';
//echo $sql;
$r = $mydb->query($sql);
if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}