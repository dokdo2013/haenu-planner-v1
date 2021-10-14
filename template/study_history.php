<? session_start(); ?>

<?
  $sd_query = "SELECT data FROM system_setting WHERE category='start_date'";
  $sd_result = $mysqli->query($sd_query);
  $sd_row = mysqli_fetch_row($sd_result);
  $nDate2 = $sd_row[0];
  $leftDate2 = intval((strtotime($nDate2)-strtotime($valDate)) / 86400); // 나머지 날짜값이 나옵니다.
  $leftDateAbs2 = abs($leftDate2) + 1;
?>

<br>
<h2 class="sub-header">이전 학습시간 보기</h2>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>D-DAY</th>
        <th>학습시간</th>
      </tr>
    </thead>
    <tbody>
      <?
      for($i=$leftDateAbs+1;$i<$leftDateAbs2;$i++){
        $query_his = "SELECT studytime FROM studytime WHERE day='$i'";
        $result_his = $mysqli->query($query_his);
        $row_his = mysqli_fetch_array($result_his);
        $temp = $row_his[0];
        echo "<tr>";
        echo "<td>D-$i</td>";
        echo "<td>$temp</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>
