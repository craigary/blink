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
    <?php echo '<link rel="stylesheet" href="style/theme/'.$settings['theme'].'.css" />' ?>
</head>
<body>
    <header>
        <div class="logo"><a href="/"><?php echo $settings['siteName']; ?></a></div>
        <div class="nav">
        <?php 
          if(basename($_SERVER['SCRIPT_FILENAME']) == 'page.php') {
            echo '<a href="/">blog</a>';
          } else {
            echo '<a href="/" class="nav_focus">blog</a>';
          }
          $pageQuery='SELECT * FROM blink_contents WHERE isPage = 1';
          $pageQueryResult = mysqli_query($db,$pageQuery);
          while($pageRows = mysqli_fetch_assoc($pageQueryResult)) {
            if($_GET['id'] == $pageRows['cid']){
              echo '<a href="page.php?id='.$pageRows['cid'].'" class="nav_focus">'.$pageRows['title'].'</a>';
            } else{
              echo '<a href="page.php?id='.$pageRows['cid'].'">'.$pageRows['title'].'</a>';
            }
          }
        ?>
          <p class="searchButton modal-button" data-target="#modal"><ion-icon name="search"></ion-icon></p>
        </div>
      </header>
<section>

<div id="modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-content">
    <div class = search>
    <div class="searchbarwrapper">
       <form autocomplete="off" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
        <input type="search" id="searchinput" placeholder="type keyword(s) here" autofocus>
      </form>
    </div>
    </div>
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>

</section>




<section>
    <div class="container">
        <div class="columns">