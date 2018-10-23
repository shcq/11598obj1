<?php
require('./common/mysql.php');

if(!$_SESSION['aid']&&!$_SESSION['uid']){
    header('Location:./login.html');
    exit;
}