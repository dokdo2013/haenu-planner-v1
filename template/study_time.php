<? session_start(); ?>

<br>
<h2 class="sub-header">학습시간 기록</h2>

<?
  include "connect_information.php";
  $query_date0 = "SELECT data FROM system_setting WHERE category='target_date'";
  $result_date0 = $mysqli->query($query_date0);
  $row_date0 = mysqli_fetch_row($result_date0);

  $s_date = $row_date0[0];
  $s_realDate = date("Y-m-d",strtotime($s_date));
  if($_GET['date'] == '')
    $nDate = date("Y-m-d",time()); // 오늘 날짜를 출력하겠지요?
  else
    $nDate = $_GET['date'];
  $valDate = $s_realDate; // 폼에서 POST로 넘어온 value 값('yyyy-mm-dd' 형식)
  $leftDate = intval((strtotime($nDate)-strtotime($valDate)) / 86400); // 나머지 날짜값이 나옵니다.
  $leftDateAbs = abs($leftDate);

  $query_st = "SELECT studytime FROM studytime WHERE day='$leftDateAbs'";
  $result_st = $mysqli->query($query_st);

  $rows_st = mysqli_num_rows($result_st);
  if($rows_st == 0){
    $query2_st = "INSERT INTO `studytime`(`day`, `studytime`)
      VALUES ('$leftDateAbs','00:00:00')";
    $mysqli->query($query2_st);
  }
  $query3_st = "SELECT studytime FROM studytime WHERE day='$leftDateAbs'";
  $result3_st = $mysqli->query($query3_st);
  $row_st = mysqli_fetch_row($result3_st);

  $feedback = $_GET['feedback'];
?>

<script>
  function action_time() {
    $.ajax({
      url: "ajax/time.php",
      type: "post",
      data: $("#time").serialize(),
    }).done(function(data) {
      $('#st').load("https://www.haenu.com/template/study_time.php?feedback=done");
    });
  }
</script>
<? if($feedback == 'done') { ?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>성공!</strong> 성공적으로 수정했습니다. 닫으려면 우측의 X 버튼을 눌러주세요.
  </div>
<? } ?>
<form id="time">
  <div class="input-group input-group-lg">
    <input type="text" name="data" class="form-control" value="<?=$row_st[0]?>">
    <input type="hidden" name="leftDateAbs" value="<?=$leftDateAbs?>">
    <span class="input-group-btn">
      <button class="btn btn-info" onclick="action_time()" type="button">저장</button>
    </span>
  </div>
</form>
