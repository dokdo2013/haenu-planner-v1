<? session_start(); ?>

<br>
<h2 class="sub-header">메모장</h2>
<?
  include "connect_information.php";
  $query_notepad = "SELECT notepad FROM notepad";
  $result_notepad = $mysqli->query($query_notepad);
  $row_notepad = mysqli_fetch_array($result_notepad);
  $feedback = $_GET['feedback'];
?>
<script>
  function action_memo() {
    $.ajax({
      url: "ajax/memo.php",
      type: "post",
      data: $("#memo").serialize(),
    }).done(function(data) {
      $('#mb').load("https://study.haenu.com/template/memo_board.php?feedback=done");
    });
  }
</script>
<? if($feedback == 'done') { ?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>성공!</strong> 성공적으로 수정했습니다. 닫으려면 우측의 X 버튼을 눌러주세요.
  </div>
<? } ?>
<form id="memo">
  <textarea name="data" class="form-control" rows="20"><?=$row_notepad[0];?></textarea>
  <button type="button" style="margin-top:10px" onclick="action_memo()" class="btn btn-primary">저장</button>
</form>
