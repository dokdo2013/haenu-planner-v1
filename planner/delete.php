<?
include "../template/connect_information.php";
$spa_pid = $_POST['pid'];
$spa_query_delete1 = "DELETE FROM study_planner WHERE PID='$spa_pid'";
$spa_result_delete1 = $mysqli->query($spa_query_delete1);
?>
