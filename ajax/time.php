<?
  include "../template/connect_information.php";
  $studytime = $_POST['data'];
  $leftDateAbs = $_POST['leftDateAbs'];
  $query_time = "UPDATE studytime SET studytime='$studytime' WHERE day='$leftDateAbs'";
  $result_time = $mysqli->query($query_time);
?>
