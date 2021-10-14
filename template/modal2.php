<?
  include "../template/connect_information.php";
  $query_title2 = "SELECT data FROM system_setting WHERE category='title'";
  $result_title2 = $mysqli->query($query_title2);
  $row_title2 = mysqli_fetch_row($result_title2);
  $title2 = $row_title2[0];
?>

<!-- Button trigger modal
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  커스터마이징
</button>
-->
<!-- Modal -->
<div class="modal fade" id="firstModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">커스터마이징</h4>
      </div>
      <div class="modal-body">
        여기서 본인의 플래너를 커스터마이징할 수 있습니다.
        기능은 계속 추가될 예정입니다.<br><br>

        <form method="post" action="./ajax/customize.php">
          <div class="form-group">
            <label for="recipient-name" class="control-label">플래너 이름:</label>
            <input type="text" class="form-control" name="planner_name" id="planner_name" value="<?=$title2?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">준비중인 시험:</label><br>
            <?
              $query_test2 = "SELECT data FROM system_setting WHERE category='target_test'";
              $result_test2 = $mysqli->query($query_test2);
              $row_test2 = mysqli_fetch_row($result_test2);
              $test2 = $row_test2[0];
              if($test2 == "2019 수능") {
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
          <? } else if($test2 == "2020 수능") { ?>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="2019 수능"> 2019 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2020 수능" checked> 2020 수능
            </label>
            <label class="radio-inline">
              <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="2021 수능"> 2021 수능
            </label>
          <? } else if($test2 == "2021 수능") { ?>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
