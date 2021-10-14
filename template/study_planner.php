<? session_start(); ?>
<div id='spsp'>
<br>
<h2 class="sub-header">스터디 플래너</h2>

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

  $editDate = $_GET['date'];
  $realToday = date("Y-m-d");
  if($editDate != ''){
    $today = $editDate;
    $yesterday = date("Y-m-d", strtotime("-1 day", strtotime($editDate)));
    $tomorrow = date("Y-m-d", strtotime("+1 day", strtotime($editDate)));
  }
  else{
    $today = date("Y-m-d");
    $yesterday = date("Y-m-d", mktime(0,0,0, date("m"), date("d")-1, date("Y")));
    $tomorrow = date("Y-m-d", mktime(0,0,0, date("m"), date("d")+1, date("Y")));
  }


  $sp_query_0 = "SELECT * FROM study_planner WHERE date='$today'";
  $sp_result_0 = $mysqli->query($sp_query_0);
  $sp_row_0 = mysqli_num_rows($sp_result_0);

  $feedback = $_GET['feedback'];
  ?>
  <div class="alert alert-info" role="alert"><? echo '오늘은 '.$today.'입니다.'.' (D - '.$leftDateAbs.')';?></div>

  <?
  if($sp_row_0 == '0'){ ?>
  <div class="alert alert-danger" role="alert">아직 학습플래너가 입력되지 않았습니다.</div>
<? } if($feedback == 'done') { ?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>성공!</strong> 성공적으로 수정했습니다. 닫으려면 우측의 X 버튼을 눌러주세요.
  </div>
<? } if($feedback == 'delete') { ?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>성공!</strong> 성공적으로 삭제했습니다. 닫으려면 우측의 X 버튼을 눌러주세요.
  </div>
<?  } ?>

<script>
  function popupOpen(){
    var popUrl = "print.php";	//팝업창에 출력될 페이지 URL
    var popOption = "width=625, height=1000, resizable=yes, scrollbars=yes, status=no;";    //팝업창 옵션(optoin)
    window.open(popUrl,"",popOption);
  }

  function refresh() {
    $('#sp').load("https://study.haenu.com/template/study_planner.php");
  }
	function action_add(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/add.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php");
		});
	}
  function action_done(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/done.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php?feedback=done");
		});
	}
  function action_adddone(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/adddone.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php?feedback=done");
		});
	}
  function action_cancel(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/cancel.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php?feedback=done");
		});
	}
  function action_delay(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/delay.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php?feedback=done");
		});
	}
  function action_delaycancel(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/delaycancel.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php?feedback=done");
		});
	}
  function action_delaycanceldone(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/delaycanceldone.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php?feedback=done");
		});
	}
  function action_delaydelete(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/delaydelete.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php?feedback=delete");
		});
	}
  function action_delete(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/delete.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php?feedback=delete");
		});
	}
  function action_edit(x) {
    var temp1 = "#";
    var temp2 = temp1.concat(x);
		$.ajax({
			url: "planner/edit.php",
			type: "post",
			data: $(temp2).serialize(),
		}).done(function(data) {
      $('#sp').load("https://study.haenu.com/template/study_planner.php?feedback=done");
		});
	}

</script>

<div class="btn-group" role="group" style="margin-bottom:10px" aria-label="plusNminus">
  <button type="button" class="btn btn-default" onclick="add_item()">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    Add Line
  </button>
  <button type="button" class="btn btn-default" onclick="refresh()">
    <? if($editDate == "$realToday" || $editDate == ''){ ?>
    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
    Refresh
  <? }else{ ?>
    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
    Today
  <? } ?>
  </button>
  <button type="button" class="btn btn-default" onclick="popupOpen()">
    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
    Print
  </button>
</div>

<script type="text/javascript">
<!--

  var count = 0;
	function add_item(){
		// pre_set 에 있는 내용을 읽어와서 처리..
    if(count == 0){
      var div = document.createElement('div');
  		div.innerHTML = document.getElementById('pre_set').innerHTML;
  		document.getElementById('field').appendChild(div);
      action_add();
      count++;
    }else{
      alert('한 번에 하나씩 추가할 수 있습니다.');
    }

	}

  function remove_item(obj){
  		// obj.parentNode 를 이용하여 삭제
  		document.getElementById('field').removeChild(obj.parentNode);
	}
//-->
</script>

<div id="pre_set" style="display:none">
  <form id="<?=$sp_row_0?>">
    <div class="input-group" style="margin-bottom: 10px">
      <div class="input-group-btn">
        <div class="btn-group">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>   <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
          </ul>
        </div>
      </div>
      <input type="text" class="form-control" name="plan" aria-label="todo01">
      <input type="hidden" name="pid" value="<?=$sp_res?>">
      <div class="input-group-btn">
        <button type="button" onclick="action_add(<?=$sp_row_0?>)" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
      </div>
    </div>
  </form>
</div>

<? if($sp_row_0 == '0'){ ?>
<script>
  add_item();
</script>
<? } ?>

<?
  if($sp_row_0 != '0'){
    $tmp = $sp_row_0;
    $sp_query_2 = "SELECT * FROM study_planner WHERE date='$today'";
    $sp_result_2 = $mysqli->query($sp_query_2);
    $i = 0;
    for($j=0;$j<$tmp;$j++){
        $tmp2 = mysqli_fetch_array($sp_result_2);
        $sp_res_work = $tmp2['work'];
        $sp_res_data = $tmp2['data'];
        $sp_res_pid = $tmp2['PID'];
        $sp_res_dpid = $tmp2['DPID'];

        if($sp_res_work == '0')
          include "type0.php";
        else if($sp_res_work == '1')
          include "type1.php";
        else if($sp_res_work == '2')
          include "type2.php";
    }
  }
?>

<div id="main_field"></div>
<div id="field"></div>

<nav>
  <ul class="pager">
    <li><a href="?date=<?=$yesterday?>">Yesterday (<?=$yesterday?>)</a></li>
    <li><a href="?date=<?=$today?>">Today (<?=$today?>)</a></li>
    <li><a href="?date=<?=$tomorrow?>">Tomorrow (<?=$tomorrow?>)</a></li>
  </ul>
</nav>
</div>
