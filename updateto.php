<?php
require('./common/mysql.php');
foreach ($_POST as $key => $value) {
    $$key = $value;
}
$sql = 'UPDATE admin SET aname = "' . $username . '",passwd = "' .md5($passwd). '", updatetimes="'.date('Y-m-d H:i:s').'", head = "' . $head . '" WHERE aid = ' . (int)$aid;
// echo $sql;
$r = $mysql->query($sql);

if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}