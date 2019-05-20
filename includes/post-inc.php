<?php
include_once 'config.php';
$querytype = mysqli_real_escape_string($db, $_POST['submit']);
if ($querytype == "Submit") {
  $postTitle = mysqli_real_escape_string($db, $_POST['postTitle']);
  $postDescription = mysqli_real_escape_string($db, $_POST['description_textarea']);
  $postContent = mysqli_real_escape_string($db, $_POST['article_textarea']);
  $categoryId = mysqli_real_escape_string($db, $_POST['categoryId']);
  $uid = mysqli_real_escape_string($db, $_POST['uid']);
  if (isset($_POST['isPage'])) {
    $isPage = mysqli_real_escape_string($db, $_POST['isPage']);
  } else {
    $isPage = 0;
  }
  $currentDate = strtotime($_POST['date']);
  $date = date('Y-m-d H:i:s', $currentDate);
  if (empty($postTitle)) {
    header("Location: ../admin/add-post.php?action=emptytitle");
    exit();
  } else {
    if (empty($postContent)) {
      header("Location: ../admin/add-post.php?action=emptycontent");
      exit();
    } else {

      if (empty($postDescription)) {
        $postDescription = substr($postContent, 0, 450);
      }
      
        $sql = "INSERT INTO blink_contents (description, created, modified, categories, title, text, authorid, status, isPage) VALUES ('$postDescription', NOW(), NOW(), $categoryId,'$postTitle','$postContent',$uid,'publish', $isPage);";
        $result = mysqli_query($db, $sql);
        header("Location: ../admin/posts.php?action=posted");
        exit();
    }
  }
} elseif ($querytype == "Update") {
  $postid = mysqli_real_escape_string($db, $_POST['postID']);
  $postTitle = mysqli_real_escape_string($db, $_POST['postTitle']);
  $postDescription = mysqli_real_escape_string($db, $_POST['description_textarea']);
  $postContent = mysqli_real_escape_string($db, $_POST['article_textarea']);
  $categoryId = mysqli_real_escape_string($db, $_POST['categoryId']);
  if (isset($_POST['isPage'])) {
    $isPage = mysqli_real_escape_string($db, $_POST['isPage']);
  } else {
    $isPage = 0;
  }
  $uid = mysqli_real_escape_string($db, $_POST['uid']);
  $cid = mysqli_real_escape_string($db, $_POST['cid']);
  $date = $_POST['date'] . " " . $_POST['time'];
  $date = mysqli_real_escape_string($db, $date);
  if (empty($postTitle)) {
    header("Location: ../admin/edit-post.php?id=" . $postid . "&action=emptytitle");
    exit();
  } else {
    if (empty($postContent)) {
      header("Location: ../admin/edit-post.php?id=" . $postid . "&action=emptycontent");
      exit();
    } else {
      if (empty($postDescription)) {
        $postDescription = substr($postContent, 0, 450);
      }
        $sql = "UPDATE blink_contents SET title = '$postTitle', description = '$postDescription', text = '$postContent', modified = '$date', categories = $categoryId, authorId = $uid, status = 'published', isPage = $isPage WHERE cid = '$cid';";
        $result = mysqli_query($db, $sql);
        header("Location: ../admin/posts.php?action=modified");
        exit();
    }
  }
} else {
  header("Location: ../admin/index.php");
  exit();
}
