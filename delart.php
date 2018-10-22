<?php
$mysql = new mysqli('localhost', 'root', 'root', 'weblog', 3306);
$mysql->query('SET NAMES UTF8');

$arid = $_GET['arid'];

$sql = 'UPDATE arlist SET status = 0 WHERE arid = ' . (int)$arid;

$r = $mysql->query($sql);


if ($r) {
    echo json_encode(['r1'=>'ok']);
} else {
    echo json_encode(['r1'=>'fail']);
}