<?php
$settingsSql = "SELECT name,value FROM blink_options WHERE user = 0";
$settingsResult = mysqli_query($db, $settingsSql);
$settings = array();
while ($settingItem = mysqli_fetch_assoc($settingsResult)) {
  $settings[$settingItem['name']] = $settingItem['value'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php
    	if(!isset($row['postTitle'])) {
    		echo $blogName;
    	} else {
    		echo $blogName.' - '.$row['postTitle'];
			}?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/bulmaswatch.min.css" />
    <?php echo '<link rel="stylesheet" href="style/theme/'.$settings['theme'].'" />' ?>
</head>
<body>
    <header>
        <div class="logo"><?php echo $settings['siteName']; ?></div>
        <div class="nav">
          <a href="#" class="nav_focus">blog</a>
          <a href="#">archive</a>
          <a href="#">categories</a>
          <a href="#">backyard</a>
        </div>
      </header>
<section>
    <div class="container">
        <div class="columns">