<?
  include "../template/connect_information.php";
  $name = $_POST['planner_name'];
  $target_test = $_POST['inlineRadioOptions'];

  if($target_test == '2019 수능')       $test_date = "2018-11-15";
  else if($target_test == '2020 수능')  $test_date = "2019-11-14";
  else if($target_test == '2021 수능')  $test_date = "2020-11-19";

  $query1 = "UPDATE system_setting SET data='$name' WHERE category='title'";
  $query2 = "UPDATE system_setting SET data='$target_test' WHERE category='target_test'";
  $query3 = "UPDATE system_setting SET data='$test_date' WHERE category='target_date'";

  $mysqli->query($query1);
  $mysqli->query($query2);
  $mysqli->query($query3);

  header('Location: ../main.php');
?>
