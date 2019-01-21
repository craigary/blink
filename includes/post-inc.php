<?php
include_once 'config.php';
if ($_POST['submit']=="Submit") {
    $postTitle = mysqli_real_escape_string($db, $_POST['postTitle']);
    $postDescription = mysqli_real_escape_string($db, $_POST['hiddenDescriptionTextarea']);
    $postContent = mysqli_real_escape_string($db, $_POST['hiddenTextarea']);
    $categoryId = mysqli_real_escape_string($db, $_POST['categoryId']);
    $timeStamp = mysqli_real_escape_string($db, $_POST['date'])." ".mysqli_real_escape_string($db, $_POST['clock']);
    $uid = mysqli_real_escape_string($db, $_POST['uid']);
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
                $sql = "INSERT INTO blink_contents (description, created, categories, title, text, authorid, status) VALUES ('$postDescription', '$timeStamp', $categoryId,'$postTitle','$postContent',$uid,'publish');";
                $result = mysqli_query($db, $sql);
                header("Location: ../admin/posts.php?action=posted");
                exit();
            }
        }
    }
} elseif ($_POST['submit']=="update"){
    $postid = mysqli_real_escape_string($db, $_POST['postID']);
    $posttitle = mysqli_real_escape_string($db, $_POST['postTitle']);
    $postdesc = mysqli_real_escape_string($db, $_POST['postDesc']);
    $postcont = mysqli_real_escape_string($db, $_POST['postCont']);
    if (empty($posttitle)) {
        header("Location: ../admin/edit-post.php?id=".$postid."&action=emptytitle");
        exit();
    } else {
        if (empty($postcont)) {
            header("Location: ../admin/edit-post.php?id=".$postid."&action=emptycontent");
            exit();
        } else {
            if (empty($postdesc)) {
                $postdesc = $postcont;
                $postdesc = substr($postdesc, 0, 450);
                $sql = "UPDATE blink_contents SET postTitle = '$posttitle', postDesc = '$postdesc', postCont = '$postcont' WHERE postID = '$postid';";
                $result = mysqli_query($db, $sql);
                header("Location: ../admin/index.php?action=modified");
                exit();
            } else {
                $sql = "UPDATE blink_contents SET postTitle = '$posttitle', postDesc = '$postdesc', postCont = '$postcont' WHERE postID = '$postid';";
                $result = mysqli_query($db, $sql);
                header("Location: ../admin/index.php?action=modified");
                exit();
            }
        }
    }
} else {
        header("Location: ../admin/index.php");
        exit();
}
?>
