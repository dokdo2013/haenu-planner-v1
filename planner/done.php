<?
include "../template/connect_information.php";
$spa_data = $_POST['plan'];
$spa_pid = $_POST['pid'];
$spa_query_done1 = "UPDATE study_planner SET work='1' WHERE PID='$spa_pid'";
$spa_result_done1 = $mysqli->query($spa_query_done1);
$spa_query_done2 = "UPDATE study_planner SET data='$spa_data' WHERE PID='$spa_pid'";
$spa_result_done2 = $mysqli->query($spa_query_done2);
?>
