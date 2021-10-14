<?
include "../template/connect_information.php";
$spa_pid = $_POST['pid'];
$spa_dpid = $_POST['dpid'];
$spa_query_delay1 = "DELETE FROM study_planner WHERE PID='$spa_dpid'";
$spa_result_delay1 = $mysqli->query($spa_query_delay1);
$spa_query_delay2 = "DELETE FROM study_planner WHERE PID='$spa_pid'";
$spa_result_delay2 = $mysqli->query($spa_query_delay2);
?>
