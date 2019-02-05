<?php
include_once 'config.php';
$uid = mysqli_real_escape_string($db, $_POST['uid']);

if ($_POST['preferences']=="1") {
    $markdown = mysqli_real_escape_string($db, $_POST['markdown']);
    $sql = "UPDATE blink_options SET value = $markdown WHERE name = 'markdown' AND user = $uid;";
    mysqli_query($db, $sql);
    header("Location: ../admin/profile.php?action=updated");
    exit();
}

if ($_POST['changePassword']=="1") {
  $currentPass = mysqli_real_escape_string($db, $_POST['currentPass']);
  $newPass = mysqli_real_escape_string($db, $_POST['newPass']);
  $doubleCheck = mysqli_real_escape_string($db, $_POST['doubleCheck']);

  if (empty($currentPass) || empty($newPass) || empty($doubleCheck)) {
    header("Location: ../admin/profile.php?action=passwordEmpty");
    exit();
  } elseif ($newPass !== $doubleCheck) {
      header("Location: ../admin/profile.php?action=newPassNotSame");
      exit();
  } else {
    $hashedPWD =  password_hash($currentPass, PASSWORD_DEFAULT);
    if ($userResult['password'] !== $hashedPWD) {
      header("Location: ../admin/profile.php?action=passDontMatch");
      exit();
    } else {
      $hashedPWD =  password_hash($newPass, PASSWORD_DEFAULT);
      $sql = "UPDATE blink_useres set password = '$hashedPWD' WHERE uid=".$uid;
      header("Location: ../admin/profile.php?action=passChangeSuccess");
      exit();
    }
  }
}

if ($_POST['info']=="1") {
  // $sql = "UPDATE blink_useres set password = '$hashedPWD' WHERE uid=".$uid;
  $screenName = mysqli_real_escape_string($db, $_POST['screenName']);
  $website = mysqli_real_escape_string($db, $_POST['website']);
  $mail = mysqli_real_escape_string($db, $_POST['mail']);
  function is_url($v){
  	$pattern="#(http|https)://(.*\.)?.*\..*#i";
  	if(preg_match($pattern,$v)){
  		return true;
  	}else{
  		return false;
  	}
}
if (empty($screenName) || empty($mail) || empty($website)) {
    header("Location: ../admin/profile.php?action=infoEmpty");
    exit();
  } elseif (is_url($website) == false) {
    header("Location: ../admin/profile.php?action=wrongurl");
    exit();
  } else {
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../admin/profile.php?action=wrongemail");
      exit();
    } else {
      $sql = "UPDATE blink_users set screenName = '$screenName', mail = '$mail', website = '$website' WHERE uid=".$uid;
      mysqli_query($db, $sql);
      header("Location: ../admin/profile.php?action=infoUpdated");
      exit();
    }
  }
}

if ($_POST['changeSettings']=="1") {
  $siteName = mysqli_real_escape_string($db, $_POST['siteName']);
  $siteUrl = mysqli_real_escape_string($db, $_POST['siteUrl']);
  $siteDescription = mysqli_real_escape_string($db, $_POST['siteDescription']);
  $siteKeywords = mysqli_real_escape_string($db, $_POST['siteKeywords']);
  $siteTheme = mysqli_real_escape_string($db, $_POST['siteTheme']);
  $postsPerPage = mysqli_real_escape_string($db, $_POST['postsPerPage']);
  $codeEmbed = mysqli_real_escape_string($db, $_POST['codeEmbed']);
  if (empty($siteName) || empty($siteUrl)) {
    header("Location: ../admin/settings.php?action=infoEmpty");
    exit();
  } else {
    $sql = "REPLACE INTO blink_options (`name`, `user`, `value`)
    VALUES
      ('siteName', 0, '$siteName'),
      ('siteUrl', 0, '$siteUrl'),
      ('siteDescription', 0, '$siteDescription'),
      ('siteKeywords', 0, '$siteKeywords'),
      ('theme', 0, '$siteTheme'),
      ('postsPerPage', 0, '$postsPerPage'),
      ('codeEmbed', 0, '$codeEmbed');";
      echo $sql;
    mysqli_query($db, $sql);
    header("Location: ../admin/settings.php?action=updated");
    exit();
  }
}