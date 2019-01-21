<?php
include_once 'config.php';
$uid = mysqli_real_escape_string($db, $_POST['uid']);
  if ($_POST['preferences']=="1") {
    $markdown = mysqli_real_escape_string($db, $_POST['markdown']);
    $sql = "UPDATE blink_options SET value = $markdown WHERE name = 'markdown' AND user = $uid;";
    echo $sql;
    mysqli_query($db, $sql);
    header("Location: ../admin/profile.php?action=updated");
    exit();
  }
