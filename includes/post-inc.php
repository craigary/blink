<?php
include_once 'config.php';
if ($_POST['submit']=="create") {
    $posttitle = mysqli_real_escape_string($db, $_POST['postTitle']);
    $postdesc = mysqli_real_escape_string($db, $_POST['postDesc']);
    $postcont = mysqli_real_escape_string($db, $_POST['postCont']);
    if (empty($posttitle)) {
        header("Location: ../admin/add-post.php?action=emptytitle");
        exit();
    } else {
        if (empty($postcont)) {
            header("Location: ../admin/add-post.php?action=emptycontent");
            exit();
        } else {
            if (empty($postdesc)) {
                if (count($postcont) < 450) {
                    $postdesc = $postcont;
                } else {
                    $postdesc = substr($postcont, 450);
                }
            } else {
                $sql = "INSERT INTO iceland_contents (postTitle,postDesc,postCont) VALUES ('$posttitle', '$postdesc', '$postcont')";
                $result = mysqli_query($db, $sql);
                header("Location: ../admin/index.php?action=posted");
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
                $sql = "UPDATE iceland_contents SET postTitle = '$posttitle', postDesc = '$postdesc', postCont = '$postcont' WHERE postID = '$postid';";
                $result = mysqli_query($db, $sql);
                header("Location: ../admin/index.php?action=modified");
                exit();
            } else {
                $sql = "UPDATE iceland_contents SET postTitle = '$posttitle', postDesc = '$postdesc', postCont = '$postcont' WHERE postID = '$postid';";
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
