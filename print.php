<!-- Bootstrap core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="dashboard.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="bootstrap/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<meta charset="utf-8">
<div id='spsp'>
<br>
<h2 class="sub-header">스터디 플래너</h2>
<div class="alert alert-info" role="alert"><? echo '오늘은 '.date("Y-m-d").'입니다.';?></div>

<?
  include "template/connect_information.php";
  $yesterday = date("Y-m-d", mktime(0,0,0, date("m"), date("d")-1, date("Y")));
  $today = date("Y-m-d");
  $tomorrow = date("Y-m-d", mktime(0,0,0, date("m"), date("d")+1, date("Y")));

  $sp_query_0 = "SELECT * FROM study_planner WHERE date='$today'";
  $sp_result_0 = $mysqli->query($sp_query_0);
  $sp_row_0 = mysqli_num_rows($sp_result_0);

  if($sp_row_0 == '0'){ ?>
  <div class="alert alert-danger" role="alert">아직 학습플래너가 입력되지 않았습니다.</div>
<? }

?>

<script>
window.print();
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
          include "template/type0.php";
        else if($sp_res_work == '1')
          include "template/type1.php";
        else if($sp_res_work == '2')
          include "template/type2.php";
    }
  }
?>

<div id="main_field"></div>
<div id="field"></div>

</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bootstrap/assets/js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
