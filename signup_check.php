<?
  $name = $_POST['name'];
  $email = $_POST['email'];
  $id = $_POST['id'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];

  include "template/connect_information_data.php";
  $mysqli = new mysqli($dbinfo['host'], $dbinfo['user'], $dbinfo['password'], 'system_manage');
  $mysqli2 = new mysqli($dbinfo['host'], $dbinfo['user'], $dbinfo['password']);
  $mysqli->query("set session character_set_connection=utf8;");
  $mysqli->query("set session character_set_results=utf8;");
  $mysqli->query("set session character_set_client=utf8;");
  $mysqli2->query("set session character_set_connection=utf8;");
  $mysqli2->query("set session character_set_results=utf8;");
  $mysqli2->query("set session character_set_client=utf8;");

  // PRE SETTING
  $chk_query1 = "SELECT * FROM account WHERE email='$email'";
  $chk_result1 = $mysqli->query($chk_query1);
  $chk_row1 = mysqli_num_rows($chk_result1);

  $chk_query2 = "SELECT * FROM account WHERE id='$id'";
  $chk_result2 = $mysqli->query($chk_query2);
  $chk_row2 = mysqli_num_rows($chk_result2);

  // ISBLANK
  if($name == ''){
    echo "<script>alert('이름을 입력해주세요.');</script>";
    echo "<script>history.back();</script>";
  }
  else if($email == ''){
    echo "<script>alert('이메일을 입력해주세요.');</script>";
    echo "<script>history.back();</script>";
  }
  else if($id == ''){
    echo "<script>alert('아이디를 입력해주세요.');</script>";
    echo "<script>history.back();</script>";
  }
  else if($password == ''){
    echo "<script>alert('비밀번호를 입력해주세요.');</script>";
    echo "<script>history.back();</script>";
  }
  else if($confirm == ''){
    echo "<script>alert('비밀번호 확인을 입력해주세요.');</script>";
    echo "<script>history.back();</script>";
  }


  // CHECK EMAIL
  else if($chk_row1 != 0){
    echo "<script>alert('이미 등록된 이메일입니다.');</script>";
    echo "<script>history.back();</script>";
  }

  // CHECK ID
  else if($chk_row2 != 0){
    echo "<script>alert('이미 등록된 아이디입니다.');</script>";
    echo "<script>history.back();</script>";
  }

  // CHECK PW
  else if($password != $confirm){
    echo "<script>alert('비밀번호를 확인해주세요.');</script>";
    echo "<script>history.back();</script>";
  }

  // SIGNUP START
  else{
    session_start();
    $_SESSION["user_id"] = $id;
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $todaydate = date('Y-m-d');
    $todaydatetime = date('Y-m-d H:i:s');
    // ACCOUNT에 내용 삽입
    $query1 = "INSERT INTO account(`name`,`email`,`id`,`pw`,`signup`,`recentlogin`,`isstart`)
      VALUES ('$name','$email','$id','$password','$todaydate','$todaydatetime','0')";
    $mysqli->query($query1);
    // 회원가입 로그 전송
    $log_date = date('Y-m-d H:i:s');
    $log_query = "INSERT INTO user_log (`timestamp`,`user_id`,`action`) VALUES ('$log_date','$id','signup')";
    $mysqli->query($log_query);
    // 개인 데이터베이스 생성
    $mysqli2->query("CREATE DATABASE $id");
    $mysqli2->query("USE $id");
    $mysqli2->query("CREATE TABLE `notepad` (
    	`num` VARCHAR(1) NOT NULL,
    	`notepad` VARCHAR(5000) NOT NULL
    )
    COLLATE='utf8mb4_general_ci'
    ENGINE=InnoDB
    ;");
    $mysqli2->query("CREATE TABLE `studytime` (
      	`day` VARCHAR(3) NOT NULL,
      	`studytime` VARCHAR(30) NOT NULL
      )
      COLLATE='utf8_general_ci'
      ENGINE=InnoDB
      ;");
    $mysqli2->query("CREATE TABLE `study_planner` (
      	`date` DATE NOT NULL,
      	`data` VARCHAR(200) NOT NULL,
      	`work` VARCHAR(1) NOT NULL,
      	`PID` VARCHAR(5) NOT NULL,
      	`DPID` VARCHAR(5) NOT NULL
      )
      COLLATE='utf8mb4_general_ci'
      ENGINE=InnoDB
      ;");
    $mysqli2->query("CREATE TABLE `system_setting` (
    	`category` VARCHAR(20) NOT NULL,
    	`data` VARCHAR(200) NOT NULL
    )
    COLLATE='utf8mb4_general_ci'
    ENGINE=InnoDB
    ;");
    $mysqli2->query("INSERT INTO `notepad`(`num`, `notepad`)
      VALUES ('0','');");
    $temp_data = $name."의 플래너";
    $temp_data2 = "[".$name."] 해누플래너";
    $mysqli2->query("INSERT INTO `system_setting`(`category`, `data`)
      VALUES ('title','$temp_data');");
    $mysqli2->query("INSERT INTO `system_setting`(`category`, `data`)
      VALUES ('website_title','$temp_data2');");
    $mysqli2->query("INSERT INTO `system_setting`(`category`, `data`)
      VALUES ('target_date','2018-11-15');");
    $mysqli2->query("INSERT INTO `system_setting`(`category`, `data`)
      VALUES ('start_date','$todaydate');");
    $mysqli2->query("INSERT INTO `system_setting`(`category`, `data`)
      VALUES ('target_test','2019 수능');");

    header('Location: ./test/loading.php');

  }


?>
