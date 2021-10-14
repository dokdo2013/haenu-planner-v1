<?
global $sp_res_data,$sp_res_pid;

?>
<div id="pre_set20">
  <form>
    <div class="input-group input-group-lg" style="margin-bottom: 10px">
      <input type="text" class="form-control" name="plan" aria-label="todo01" value="<?=$sp_res_data?>">
      <input type="hidden" name="pid" value="<?=$sp_res_pid?>">
      <div class="input-group-btn">
        <div class="btn-group btn-group-lg">
          <button type="button" onclick="action_done()" class="btn btn-danger">완료하기</button>
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">완료하기</a></li>
            <li><a href="#">완료취소</a></li>
            <li><a href="#">내일로 연기</a></li>
          </ul>
        </div>
        <button type="button" onclick="action_edit()" class="btn btn-default">수정하기</button>
      </div>
    </div>
  </form>
</div>
