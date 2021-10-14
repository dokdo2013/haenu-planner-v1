<?
include "../template/connect_information.php";
$spa_data = $_POST['plan'];
$spa_pid = $_POST['pid'];
$spa_query_cancel1 = "UPDATE study_planner SET work='0' WHERE PID='$spa_pid'";
$spa_result_cancel1 = $mysqli->query($spa_query_cancel1);
$spa_query_cancel2 = "UPDATE study_planner SET data='$spa_data' WHERE PID='$spa_pid'";
$spa_result_cancel2 = $mysqli->query($spa_query_cancel2);
?>
