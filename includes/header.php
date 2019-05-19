<?php
$settingsSql = "SELECT name,value FROM blink_options WHERE user = 0";
$settingsResult = mysqli_query($db, $settingsSql);
$settings = array();
while ($settingItem = mysqli_fetch_assoc($settingsResult)) {
  $settings[$settingItem['name']] = $settingItem['value'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo $settings['siteDescription']; ?>">
  <meta name="keywords" content="<?php echo $settings['siteKeywords']; ?>">
  <title>
    <?php
    if (!isset($_GET['id'])) {
      echo $settings['siteName'];
    } else {
      echo $settings['siteName'] . ' - ' . $row['title'];
    } ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/bulmaswatch.min.css" />
  <?php echo '<link rel="stylesheet" href="style/theme/' . $settings['theme'] . '.css" />' ?>
</head>

<body>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script>
    window.onload = function() {
      $("img").each(function() {
        $(this).attr("data-src", $(this).attr("src"));
        $(this).removeAttr("src");
        $(this).attr("class", "lazyload");
      });
      if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll("img.lazyload");
        images.forEach(img => {
          img.src = img.dataset.src;
          img.setAttribute("loading", "lazy");
        });
      } else {
        let script = document.createElement("script");
        script.src = "/js/lazysizes.min.js";;
        document.body.appendChild(script)
      }
    }
  </script>
  <!-- user script below -->
  <?php
  echo $settings['codeEmbed'];
  ?>
  <!-- user script above -->
  <header>
    <div class="logo"><a href="/"><?php echo $settings['siteName']; ?></a></div>
    <div class="nav">
      <?php
      if (basename($_SERVER['SCRIPT_FILENAME']) == 'page.php') {
        echo '<a href="/">blog</a>';
      } else {
        echo '<a href="/" class="nav_focus">blog</a>';
      }
      $pageQuery = 'SELECT * FROM blink_contents WHERE isPage = 1';
      $pageQueryResult = mysqli_query($db, $pageQuery);
      while ($pageRows = mysqli_fetch_assoc($pageQueryResult)) {
        if ($_GET['id'] == $pageRows['cid']) {
          echo '<a href="page.php?id=' . $pageRows['cid'] . '" class="nav_focus">' . $pageRows['title'] . '</a>';
        } else {
          echo '<a href="page.php?id=' . $pageRows['cid'] . '">' . $pageRows['title'] . '</a>';
        }
      }
      ?>
      <p class="searchButton modal-button" data-target="#modal">
        <ion-icon name="search"></ion-icon>
      </p>
    </div>
  </header>
  <section>

    <div id="modal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-content">
        <div class=search>
          <div class="searchbarwrapper">
            <form autocomplete="off" autocapitalize="off" spellcheck="false">
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