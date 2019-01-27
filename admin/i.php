<?php
// require_once('../includes/config.php');
//   $settingsSql = "SELECT name,value FROM blink_options WHERE user = 0 or 1";
//   $settingsResult = mysqli_query($db, $sql);
//   $settings = array();
//   while ($settingItem = mysqli_fetch_assoc($settingsResult)) {
//     $settings[$settingItem['name']] = $settingItem['value'];
//   }
// echo $settings['markdown'];
function is_url($v){
	$pattern="#(http|https)://(.*\.)?.*\..*#i";
	if(preg_match($pattern,$v)){
		return true;
	}else{
		return false;
	}
}
if (is_url($url) == false) {

}
?>
