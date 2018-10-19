<?php
require('./common/mysql.php');
foreach ($_POST as $key => $value) {
    $$key = $value;
}
$sql = 'UPDATE users SET uname = "' . $username . '",passwd = "' .md5($passwd). '", updatetimes="'.date('Y-m-d H:i:s').'", head = "' . $head . '" WHERE uid = ' . (int)$uid;
// echo $sql;
$r = $mysql->query($sql);

if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}