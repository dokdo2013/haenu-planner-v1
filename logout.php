<?php
session_start();
$id = $_SESSION['user_id'];
include "template/connect_information_data.php";
$mysqli = new mysqli($dbinfo['host'], $dbinfo['user'], $dbinfo['password'], 'system_manage');
$log_date = date('Y-m-d H:i:s');
$log_query = "INSERT INTO user_log (`timestamp`,`user_id`,`action`) VALUES ('$log_date','$id','logout')";
$mysqli->query($log_query);

session_destroy();
?>
<meta http-equiv='refresh' content='0;url=../main.php'>
