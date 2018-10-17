<?php
require('./common/mysql.php');

if(!$_SESSION['aid']){
    header('Location:./login.html');
    exit;
}