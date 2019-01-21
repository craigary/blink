<?php
require_once('../includes/config.php');

  $sql = "SELECT name,value FROM blink_options WHERE user = 0 or 1";
  $result = mysqli_query($db, $sql);
  $jarr = array();
  while ($rows = mysqli_fetch_assoc($result)) {
    $jarr[$rows['name']] = $rows['value'];
}
$arr=json_encode($jarr);
echo $arr;
// $settings = json_decode($arr,true);
// print_r($settings);
// echo $settings[0][name];
?>
