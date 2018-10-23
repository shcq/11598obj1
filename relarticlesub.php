<?php
$mydb = new mysqli('localhost', 'root', 'root', 'weblog', 3306);
$mydb->query('SET NAMES UTF8');

foreach ($_POST as $key => $value) $$key = $value;

$sql = 'insert into arlist(title,content,addtime) values("'.$title.'","'.$content.'","'.date('Y-m-d H:i:s', time()).'") ';
//echo $sql;

$r = $mydb->query($sql);
if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}
