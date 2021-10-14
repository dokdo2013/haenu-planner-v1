<?
  $id = $_POST['id'];
  $password = $_POST['password'];

  include "../template/connect_information_data.php";
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
      session_start();
      $_SESSION['user_id'] = $id;
      $name_query = "SELECT name FROM account WHERE id='$id'";
      $name_res = $mysqli->query($name_query);
      $name_row = $name_res->fetch_row();

      $_SESSION['name'] = $name_row[0];

      header('Location: ./main.php');
    }else{
      header('Location: ./login.php?fail=y');
    }
  }else{
    header('Location: ./login.php?fail=y');
  }
?>
