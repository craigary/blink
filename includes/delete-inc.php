<?php
include_once 'config.php';

if (isset($_GET['from']) && isset($_GET['cid'])) {
    $deleteId = $_GET['cid'];
    if ($_GET['from']=="categories") {
        $defaultCategoryId = $_GET['defaultCategoryId'];
        if($deleteId == $defaultCategoryId) {
            header("Location: ../admin/categories.php?action=unableDeleteDefaultCategory");
            exit();
        } else {
            $sql = "UPDATE blink_contents SET categories = ".$defaultCategoryId." WHERE categories =".$deleteId;
            $result = mysqli_query($db, $sql);
            $sql = "DELETE FROM blink_metas WHERE mid = ".$deleteId;
            $result = mysqli_query($db, $sql);
            header("Location: ../admin/category.php?action=deleted");
            exit();
        }
    }
    if ($_GET['from']=="posts") {
        $sql = "DELETE FROM blink_contents WHERE isPage = 0 AND cid = ".$deleteId;
        $result = mysqli_query($db, $sql);
        header("Location: ../admin/posts.php?action=deleted");
        exit();
    }
    if ($_GET['from']=="pages") {
        $sql = "DELETE FROM blink_contents WHERE isPage = 1 AND cid = ".$deleteId;
        $result = mysqli_query($db, $sql);
        header("Location: ../admin/pages.php?action=deleted");
        exit();
    }
} else {
    header("Location: ../admin/index.php");
    exit();
}
?>