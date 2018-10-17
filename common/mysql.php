<?php
isset($_SESSION)||session_start();
$mydb=new mysqli('localhost','root','root','weblog',3306);
$mydb->query('SET NAMES UTF8');