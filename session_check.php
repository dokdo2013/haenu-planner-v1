<?
  session_start();
  if($_SESSION["user_id"] != '') // 세션이 존재할 때
  {
    header ('Location: main.php');
  }else{
    header('Location: login.php');
  }
?>
