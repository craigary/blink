<?php
require_once('../includes/config.php');
  $settingsSql = "SELECT name,value FROM blink_options WHERE user = 0 or 1";
  $settingsResult = mysqli_query($db, $sql);
  $settings = array();
  while ($rows = mysqli_fetch_assoc($settingsResult)) {
    $settings[$rows['name']] = $rows['value'];
}
echo $settings['markdown'];
?>
