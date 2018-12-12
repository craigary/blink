<?php

include_once 'config.php';

if ($_POST['submit']=="update") {
    $bname = mysqli_real_escape_string($db, $_POST['blogname']);
    $ppp = mysqli_real_escape_string($db, $_POST['ppp']);
    if (empty($bname)) {
        header("Location: ../admin/settings.php?action=emptyblogname");
        exit();
    } else {
        if (empty($ppp)) {
            header("Location: ../admin/settings.php?action=emptyppp");
            exit();
        } else {
                $sql = "UPDATE blog_settings SET postsPerPage='$ppp', blogName='$bname' WHERE id=1";
                mysqli_query($db, $sql);
                header("Location: ../admin/index.php?action=settingsupdated");
                exit();
            }
        }
}
 