<? session_start();
  if(!isset($_SESSION["user_id"])) // 세션이 존재하지 않을 때
  {
    header ('Location: login.php');
  }
  $sessid = $_SESSION['user_id'];
  include "./template/google_analytics.php";
  //include "template/modal2.php";
  include "template/connect_information_data.php";
  $mysqli2 = new mysqli($dbinfo['host'], $dbinfo['user'], $dbinfo['password'], 'system_manage');
  // ISSTART CHECK ======추후 수정 필요======
  $query_first = "SELECT isstart FROM account WHERE id='$sessid'";
  $result_first = $mysqli2->query($query_first);
  $row_first = mysqli_fetch_row($result_first);
  $row_first_real = $row_first[0];
  if($row_first_real == '0'){

  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="해누플래너 Ver1.0">
    <meta name="author" content="HyeonWoo Jo">
    <link rel="icon" href="image/facebook_profile_image.png">

    <?

      include_once "template/connect_information.php";

      $query_title0 = "SELECT data FROM system_setting WHERE category='website_title'";
      $result_title0 = $mysqli->query($query_title0);
      $row_title0 = mysqli_fetch_row($result_title0);

      $query_title1 = "SELECT data FROM system_setting WHERE category='title'";
      $result_title1 = $mysqli->query($query_title1);
      $row_title1 = mysqli_fetch_row($result_title1);

      $query_date0 = "SELECT data FROM system_setting WHERE category='target_date'";
      $result_date0 = $mysqli->query($query_date0);
      $row_date0 = mysqli_fetch_row($result_date0);

      $s_date = $row_date0[0];
      $s_realDate = date("Y-m-d",strtotime($s_date));

      // D-Day Count Source
      if($_GET['date'] == '')
        $nDate = date("Y-m-d",time()); // 오늘 날짜를 출력하겠지요?
      else
        $nDate = $_GET['date'];
      $valDate = $s_realDate; // 폼에서 POST로 넘어온 value 값('yyyy-mm-dd' 형식)
      $leftDate = intval((strtotime($nDate)-strtotime($valDate)) / 86400); // 나머지 날짜값이 나옵니다.
      $leftDateAbs = abs($leftDate);

    ?>

    <title><?=$row_title0[0]?></title>

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

  </head>
<?   include "./template/modal.php"; ?>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top"> <!-- 여기에 background-color 속성 줄 수 있음 -->
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?=$row_title1[0]?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:$('#ReportModal').modal('show')">버그제보,기능제안</a></li>
            <li><a href="javascript:$('#SettingModal').modal('show')">환경설정</a></li>
            <li><a href="javascript:$('#MypageModal').modal('show')">마이페이지 (<?=$_SESSION['name']?>)</a></li>
            <li><a href="logout.php">로그아웃</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#">Main <span class="sr-only">(current)</span></a></li>
            <li><a href="#sp">Study Planner</a></li>
            <li><a href="#st">Study Time</a></li>
            <li><a href="#sh">Study History</a></li>
            <li><a href="#mb">Memo board</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="https://ebsi.co.kr" target="_blank">EBSi</a></li>
            <li><a href="https://megastudy.net" target="_blank">MegaStudy</a></li>
            <li><a href="https://skyedu.com" target="_blank">SkyEdu</a></li>
            <li><a href="https://etoos.com" target="_blank">Etoos</a></li>
            <li><a href="https://mimacstudy.com" target="_blank">DaesungMimac</a></li>
          </ul>
        </div>

        <div id='main' class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <? include "template/main_view.php"; ?>
        </div>
        <div id='sp' class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <? include "template/study_planner.php"; ?>
        </div>
        <div id='st' class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <? include "template/study_time.php"; ?>
        </div>
        <div id='sh' class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <? include "template/study_history.php"; ?>
        </div>
        <div id='mb' class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <? include "template/memo_board.php"; ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bootstrap/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
