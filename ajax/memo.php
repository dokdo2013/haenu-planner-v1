<?
  include "../template/connect_information.php";
  $notepad = $_POST['data'];
  $query_note = "UPDATE notepad SET notepad='$notepad' WHERE num='0'";
  $result_note = $mysqli->query($query_note);
?>
