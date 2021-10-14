<?
  include "../template/connect_information_data.php";
  $mysqli = new mysqli($dbinfo['host'], $dbinfo['user'], $dbinfo['password'], 'system_manage');
  // 연결 오류 발생 시 스크립트 종료
  if ($mysqli->connect_errno) {
      die('Connect Error: '.$mysqli->connect_error);
  }

  // 접속 종료
  //$mysqli->close();
  $mysqli->query("USE system_manage");
  $mysqli->query("set session character_set_connection=utf8;");
  $mysqli->query("set session character_set_results=utf8;");
  $mysqli->query("set session character_set_client=utf8;");


  $id = $_POST['id'];
  $data = $_POST['data'];
  $time = date('Y-m-d H:i:s');

  $query1 = "INSERT INTO `feedback`(`time`, `id`, `feedback`)
    VALUES ('$time','$id','$data')";

  $mysqli->query($query1);

  header('Location: ../main.php?feedback=success');
?>
