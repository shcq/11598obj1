<?php
require('./common/mysql.php');
foreach ($_POST as $key => $value) {
    $$key = $value;
}

$sql = 'UPDATE admin SET aname = "' . $aname . '", head = "' . $head . '",  updatetimes="'.date('Y-m-d H:i:s').'", info = "' . addslashes($info) . '" WHERE aid = ' . (int)$aid;
// echo $sql;
// exit;
$r = $mydb->query($sql);

if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}