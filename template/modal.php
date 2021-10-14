<?
  include "../template/connect_information.php";
  $query_title1 = "SELECT data FROM system_setting WHERE category='title'";
  $result_title1 = $mysqli->query($query_title1);
  $row_title1 = mysqli_fetch_row($result_title1);
  $title = $row_title1[0];
?>

<!-- Button trigger modal
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  커스터마이징
</button>
-->
<!-- Setting Modal -->
<div class="modal fade" id="SettingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">환경설정</h4>
      </div>
      <div class="modal-body">
        여기서 본인의 플래너의 세부사항을 설정할 수 있습니다.
        기능은 계속 추가될 예정입니다.<br><br>

        <form method="post" action="./ajax/customize.php">
          <div class="form-group">
            <label for="recipient-name" class="control-label">플래너 이름:</label>
            <input type="text" class="form-control" name="planner_name" id="planner_name" value="<?=$title?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">준비중인 시험:</label><br>
            <?
              $query_test = "SELECT data FROM system_setting WHERE category='target_test'";
              $result_test = $mysqli->query($query_test);
              $row_test = mysqli_fetch_row($result_test);
              $test = $row_test[0];
              if($test == "2019 수능") {
            ?>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="2019 수능" checked> 2019 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2020 수능"> 2020 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="2021 수능"> 2021 수능
            </label>
          <? } else if($test == "2020 수능") { ?>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="2019 수능"> 2019 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2020 수능" checked> 2020 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="2021 수능"> 2021 수능
            </label>
          <? } else if($test == "2021 수능") { ?>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="2019 수능"> 2019 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2020 수능"> 2020 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="2021 수능" checked> 2021 수능
            </label>
          <? } else { ?>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="2019 수능"> 2019 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2020 수능"> 2020 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="2021 수능" checked> 2021 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio4" value="<?=$test?>" checked> <?=$test?>
            </label>
          <? } ?>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
        <button type="submit" class="btn btn-primary">수정하기</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Mypage Modal -->

<div class="modal fade" id="MypageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">마이페이지</h4>
      </div>
      <div class="modal-body">
        회원정보 수정, 로그인 기록 등의 작업을 할 수 있습니다.
        기능은 계속 추가될 예정입니다.<br><br>
        <strong>아직 개발 중입니다. 작동이 되지 않아요ㅠ</strong><br><br>

        <!--<form method="post" action="./ajax/customize.php">-->
          <div class="form-group">
            <label for="recipient-name" class="control-label">비밀번호 수정:</label>
            <input type="text" class="form-control" name="password_change_first" id="planner_name" value="" placeholder="현재 비밀번호">
            <input type="text" class="form-control" name="password_change_second" id="planner_name" value="" placeholder="바꿀 비밀번호">
            <input type="text" class="form-control" name="password_change_third" id="planner_name" value="" placeholder="바꿀 비밀번호 확인">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
        <button type="button" class="btn btn-primary">수정하기</button>
      </div>
<!--      </form> -->
    </div>
  </div>
</div>


<!-- Report Modal -->


<div class="modal fade" id="ReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">버그제보, 기능제안</h4>
      </div>
      <div class="modal-body">
        사용 중 버그가 있거나 제안하고 싶은 기능이 있으면 아래에 입력해주세요. 가입하실 때 입력한 이메일로 피드백을 보내드립니다.<br><br>

        <form method="post" action="./ajax/feedback.php">
          <div class="form-group">
            <label for="recipient-name" class="control-label">제안 작성:</label>
            <input type="hidden" name="id" value="<?=$_SESSION['user_id']?>">
            <textarea name="data" class="form-control" rows="4"></textarea>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
        <button type="submit" class="btn btn-primary">보내기</button>
      </div>
      </form>
    </div>
  </div>
</div>
