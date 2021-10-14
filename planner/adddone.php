<?
include "../template/connect_information.php";
$spa_data = $_POST['plan'];
$sp_query_1 = "SELECT * FROM study_planner";
$sp_result_1 = $mysqli->query($sp_query_1);
$sp_row_1 = mysqli_num_rows($sp_result_1);
$spa_today = date("Y-m-d");
$spa_query_add = "INSERT INTO `study_planner`(`date`, `data`, `work`, `PID`, `DPID`)
  VALUES ('$spa_today','$spa_data','1','$sp_row_1','')";
$spa_result_add = $mysqli->query($spa_query_add);
?>
