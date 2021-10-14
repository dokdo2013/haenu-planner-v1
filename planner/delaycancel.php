<?
include "../template/connect_information.php";
$spa_data = $_POST['plan'];
$spa_pid = $_POST['pid'];
$spa_dpid = $_POST['dpid'];
$spa_tomorrow = date("Y-m-d", mktime(0,0,0, date("m"), date("d")+1, date("Y")));
$sp_query_00 = "SELECT PID FROM study_planner ORDER BY `PID` DESC";
$sp_result_00 = $mysqli->query($sp_query_00);
$sp_row_00 = mysqli_fetch_array($sp_result_00);
$sp_res1 = $sp_row_00[0];
$sp_res = $sp_res1 + 1;
$spa_query_delay1 = "DELETE FROM study_planner WHERE PID='$spa_dpid'";
$spa_result_delay1 = $mysqli->query($spa_query_delay1);
$spa_query_delay2 = "UPDATE study_planner SET work='0' WHERE PID='$spa_pid'";
$spa_result_delay2 = $mysqli->query($spa_query_delay2);
$spa_query_delay3 = "UPDATE study_planner SET DPID='' WHERE PID='$spa_pid'";
$spa_result_delay3 = $mysqli->query($spa_query_delay3);
?>
