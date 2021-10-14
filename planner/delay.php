<?
include "../template/connect_information.php";
$spa_data = $_POST['plan'];
$spa_pid = $_POST['pid'];

$sp_query_00 = "SELECT PID FROM study_planner";
$sp_result_00 = $mysqli->query($sp_query_00);
$sp_numrows_00 = mysqli_num_rows($sp_result_00);
$sp_top = 0;
while($sp_numrows_00--){
	$sp_row_01 = mysqli_fetch_row($sp_result_00);
	if($sp_top < $sp_row_01[0])
		$sp_top = $sp_row_01[0];
}

$sp_res = $sp_top + 1;
$spa_tomorrow = date("Y-m-d", mktime(0,0,0, date("m"), date("d")+1, date("Y")));
$spa_query_delay1 = "INSERT INTO `study_planner`(`date`, `data`, `work`, `PID`, `DPID`)
  VALUES ('$spa_tomorrow','$spa_data','0','$sp_res','')";
$spa_result_delay1 = $mysqli->query($spa_query_delay1);
$spa_query_delay2 = "UPDATE study_planner SET work='2' WHERE PID='$spa_pid'";
$spa_result_delay2 = $mysqli->query($spa_query_delay2);
$spa_query_delay3 = "UPDATE study_planner SET DPID='$sp_res' WHERE PID='$spa_pid'";
$spa_result_delay3 = $mysqli->query($spa_query_delay3);
?>
