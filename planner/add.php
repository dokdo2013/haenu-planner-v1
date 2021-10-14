<?
include "../template/connect_information.php";
$spa_data = $_POST['plan'];
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
$spa_today = date("Y-m-d");
$spa_query_add = "INSERT INTO `study_planner`(`date`, `data`, `work`, `PID`, `DPID`)
  VALUES ('$spa_today','$spa_data','0','$sp_res','')";
$spa_result_add = $mysqli->query($spa_query_add);
?>
