<?php
//include config
require_once('../includes/config.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){header('Location: login.php');}
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM blink_users WHERE uid='$uid'";
$result = mysqli_query($db, $sql);
$userResult = mysqli_fetch_assoc($result);
$settingsSql = "SELECT name,value FROM blink_options WHERE user = 0 or ".$uid;
$settingsResult = mysqli_query($db, $settingsSql);
$settings = array();
while ($settingItem = mysqli_fetch_assoc($settingsResult)) {
  $settings[$settingItem['name']] = $settingItem['value'];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../style/bulmaswatch.min.css">
    <link rel="stylesheet" href="../style/quill.snow.css">
    <link rel="stylesheet" href="../style/datepicker.min.css">
    <link rel="stylesheet" href="../style/jquery.timepicker.min.css">
    <link rel="stylesheet" href="../style/dashboard.css">
  </head>
  <body>
  <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo-white.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="add-post.php">
        Write
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Manage
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="posts.php">
            Posts
          </a>
          <a class="navbar-item" href="category.php">
            Categories
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="profile.php">
            Profile
          </a>
        </div>
      </div>
      <a class="navbar-item" href="settings.php">Settings</a>
    </div>
    <div class="navbar-end">
      <a class="navbar-item" href="profile.php"><?php echo $userResult['screenName']; ?></a>
      <a class="navbar-item" href="logout.php">Logout</a>
      <a class="navbar-item">
        Visite Website
      </a>
    </div>
  </div>
</nav>
