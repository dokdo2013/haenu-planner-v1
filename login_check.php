<?  session_start();

  $id = $_POST['id'];
  $password = $_POST['password'];

  include "template/connect_information_data.php";
  $mysqli = new mysqli($dbinfo['host'], $dbinfo['user'], $dbinfo['password'], 'system_manage');

  $mysqli->query("set session character_set_connection=utf8;");
  $mysqli->query("set session character_set_results=utf8;");
  $mysqli->query("set session character_set_client=utf8;");

  $id_chk_query = "SELECT pw FROM account WHERE id='$id'";
  $id_chk = $mysqli->query($id_chk_query);
  $pw_chk = $id_chk->fetch_row();
  $pw_row = mysqli_num_rows($id_chk);
  if($pw_row == 1){
    if($pw_chk[0] == $password){
      $_SESSION["user_id"] = $id;
      $name_query = "SELECT name FROM account WHERE id='$id'";
      $name_res = $mysqli->query($name_query);
      $name_row = $name_res->fetch_row();
      $_SESSION["name"] = $name_row[0];

      $today_date = date('Y-m-d H:i:s');
      $log_query = "INSERT INTO user_log (`timestamp`,`user_id`,`action`) VALUES ('$today_date','$id','login')";
      $mysqli->query($log_query);

      $recent_query = "UPDATE account SET recentlogin='$today_date' WHERE id='$id'";
      $mysqli->query($recent_query);

      header('Location: ./main.php');

    }else{
      $log_date = date('Y-m-d H:i:s');
      $log_query = "INSERT INTO user_log (`timestamp`,`user_id`,`action`) VALUES ('$log_date','$id','login fail')";
      $mysqli->query($log_query);
      header('Location: ./login.php?fail=y');
    }
  }else{
    $log_date = date('Y-m-d H:i:s');
    $log_query = "INSERT INTO user_log (`timestamp`,`user_id`,`action`) VALUES ('$log_date','$id','login fail')";
    $mysqli->query($log_query);
    header('Location: ./login.php?fail=y');
  }
?>
