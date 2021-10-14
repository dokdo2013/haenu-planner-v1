<? session_start(); ?>

<?
global $sp_res_data,$sp_res_pid,$i;
$teemp = $i;
?>
<div id="pre_set20">
  <form id="<?=$i++?>">
    <div class="input-group" style="margin-bottom: 10px">
      <div class="input-group-btn">
        <div class="btn-group">
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>   <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="javascript:action_cancel(<?=$teemp?>);">완료취소</a></li>
            <li class="divider"></li>
            <li><a href="javascript:action_delete(<?=$teemp?>);">삭제하기</a></li>
          </ul>
        </div>
      </div>
      <input type="text" class="form-control" name="plan" aria-label="todo01" value="<?=$sp_res_data?>">
      <input type="hidden" name="pid" value="<?=$sp_res_pid?>">
      <div class="input-group-btn">
        <button type="button" onclick="action_edit(<?=$teemp?>)" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
      </div>
    </div>
  </form>
</div>
