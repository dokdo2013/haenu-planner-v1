<?
include "./template/google_analytics.php"
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Include the above in your HEAD tag -->
<link rel="stylesheet" href="login.css">
<title>로그인</title>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <!--<img src="http://cdn.24.co.za/files/Cms/General/d/6847/c17d0c2399a54d39a9490b1b03769a99.jpg" id="icon" style="width:300px; height:177px" alt="User Icon" />
      --><br><br><br><h1 style="font-size:2em">해누플래너 로그인</h1><br>
    </div>

    <?
      $fail = $_GET['fail'];
      if($fail == 'y'){
        echo "<font style=\"color:red\">로그인 실패. 아이디나 비밀번호를 확인해주세요.</font>";
      }
      $signup = $_GET['signup'];
      if($signup == 'y'){
        echo "<font style=\"color:blue\">회원가입 완료. 로그인을 진행해주세요.</font>";
      }
    ?>

    <!-- Login Form -->
    <form action="login_check.php" method="post">
      <input type="text" id="id" class="fadeIn second" name="id" placeholder="아이디">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="비밀번호" style="-webkit-text-security: disc;">
      <input type="submit" class="fadeIn fourth" value="로그인">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="signup.php">아직 회원이 아니신가요?</a>
    </div>

  </div>
</div>
