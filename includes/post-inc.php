<?php
include_once 'config.php';
if ($_POST['submit']=="Submit") {
    $postTitle = mysqli_real_escape_string($db, $_POST['postTitle']);
    $postDescription = mysqli_real_escape_string($db, $_POST['hiddenDescriptionTextarea']);
    $postContent = mysqli_real_escape_string($db, $_POST['hiddenTextarea']);
    $categoryId = mysqli_real_escape_string($db, $_POST['categoryId']);
    $timeStamp = mysqli_real_escape_string($db, $_POST['date']);
    $uid = mysqli_real_escape_string($db, $_POST['uid']);
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
                if (count($postDescription) < 450) {
                    $postDescription = $postContent;
                } else {
                    $postDescription = substr($postContent, 450);
                }
            } else {
                $sql = "INSERT INTO blink_contents (description, created, modified, categories, title, text, authorid, status) VALUES ('$postDescription', NOW(), NOW(), $categoryId,'$postTitle','$postContent',$uid,'publish');";
                echo $sql;
                $result = mysqli_query($db, $sql);
                header("Location: ../admin/posts.php?action=posted");
                exit();
            }
        }
    }
} elseif ($_POST['submit']=="update"){
    $postid = mysqli_real_escape_string($db, $_POST['postID']);
    $postTitle = mysqli_real_escape_string($db, $_POST['postTitle']);
    $postDescription = mysqli_real_escape_string($db, $_POST['hiddenDescriptionTextarea']);
    $postContent = mysqli_real_escape_string($db, $_POST['hiddenTextarea']);
    $categoryId = mysqli_real_escape_string($db, $_POST['categoryId']);
    $uid = mysqli_real_escape_string($db, $_POST['uid']);
    $cid = mysqli_real_escape_string($db, $_POST['cid']);
    $date = $_POST['date']." ".$_POST['time'];
    $date = mysqli_real_escape_string($db, $date);
    if (empty($posttitle)) {
        header("Location: ../admin/edit-post.php?id=".$postid."&action=emptytitle");
        exit();
    } else {
        if (empty($postcont)) {
            header("Location: ../admin/edit-post.php?id=".$postid."&action=emptycontent");
            exit();
        } else {
            if (empty($postDescription)) {
                $postDescription = substr($postContent, 0, 450);
                $sql = "UPDATE blink_contents SET title = '$postTitle', description = '$postDescription', text = '$postcont' modified = '$date' categories = $categoryId  author = $uid status = 'published'  WHERE cid = '$cid';";
                $result = mysqli_query($db, $sql);
                header("Location: ../admin/index.php?action=modified");
                exit();
            } else {
                $sql = "UPDATE blink_contents SET postTitle = '$postTitle', postDesc = '$postDescription', text = '$postcont' modified = '$date' categories = $categoryId WHERE cid = '$cid';";
                $result = mysqli_query($db, $sql);
                header("Location: ../admin/index.php?action=modified");
                exit();
            }
        }
    }
}
else {
        header("Location: ../admin/index.php");
        exit();
}
?>
