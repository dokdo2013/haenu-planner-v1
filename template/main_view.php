<? session_start();
include "../template/connect_information.php";

$query_test11 = "SELECT data FROM system_setting WHERE category='target_test'";
$result_test11 = $mysqli->query($query_test11);
$row_test11 = mysqli_fetch_row($result_test11);
$test11 = $row_test11[0];
if($test11 == '2019 수능')
  $testres = "19";
else if($test11 == '2020 수능')
  $testres = "20";
else if($test11 == '2021 수능')
  $testres = "21";

$mysqli2 = new mysqli('localhost', 'root', 'sothing00', 'system_manage');
$mysqli2->query("set session character_set_connection=utf8;");
$mysqli2->query("set session character_set_results=utf8;");
$mysqli2->query("set session character_set_client=utf8;");

$quote_query = "SELECT * FROM quotes WHERE 1";
$quote_res = $mysqli2->query($quote_query);
$quote_row = mysqli_num_rows($quote_res);
$quote_rand = mt_rand (1, $quote_row);
$quote_query2 = "SELECT * FROM quotes WHERE num='$quote_rand'";
$quote_res2 = $mysqli2->query($quote_query2);
$quote_arr = mysqli_fetch_array($quote_res2);

$feedback = $_GET['feedback'];
 ?>
 <?  if($feedback == 'success') { ?>
     <div class="alert alert-success alert-dismissible fade in" role="alert">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <strong>성공!</strong> 빠른 시일 내에 제안을 검토하겠습니다. 고맙습니다!
     </div>
   <? } ?>
<style>
@media (max-width: 450px) {
  #ddaycounter {
    display: none;
  }
}
</style>
<iframe src="https://jinh.kr/SAT_kr/page/SAT<?=$testres?>.html" id="ddaycounter" style="width:100%; height:88px; border:0;"></iframe>
<blockquote>
  <p><?=$quote_arr['message']?></p>
  <footer><cite title="Source Title"><?=$quote_arr['italic_author']?></cite> <?=$quote_arr['main_author']?></footer>
</blockquote>
