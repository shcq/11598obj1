<?php
require('./common/mysql.php');
foreach ($_POST as $key => $value) {
    $$key = $value;
}

$sql = 'UPDATE users SET uname = "' . $uname . '", head = "' . $head . '" WHERE uid = ' . (int)$uid;
$r = $mydb->query($sql);

if ($r) {
    echo json_encode(['r'=>'ok', 'id'=>100]);
} else {
    echo json_encode(['r'=>'fail']);
}