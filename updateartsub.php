<?php
$mydb = new mysqli('localhost', 'root', 'root', 'weblog', 3306);
$mydb->query('SET NAMES UTF8');

foreach ($_POST as $key => $value) $$key = $value;
//var_dump($_POST);

$sql = 'update arlist set title = "'.$title.'",content = "'.$content.'",updatetime="'.date('Y-m-d H:i:s').'" where arid ='.(int)$arid;
//echo $sql;
$r = $mydb->query($sql);
if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}