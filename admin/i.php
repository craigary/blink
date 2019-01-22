<?php
require_once('../includes/config.php');
  $settingsSql = "SELECT name,value FROM blink_options WHERE user = 0 or 1";
  $settingsResult = mysqli_query($db, $sql);
  $settings = array();
  while ($settingItem = mysqli_fetch_assoc($settingsResult)) {
    $settings[$settingItem['name']] = $settingItem['value'];
  }
echo $settings['markdown'];
?>
