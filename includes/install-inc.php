<?php
    $dbhost = $_POST['dbhost'];
    $dbuser = $_POST['dbuser'];
    $dbpass = $_POST['dbpass'];
    $dbname = $_POST['dbname'];
    $dbport = $_POST['dbport'];
    if (empty($dbhost) || empty($dbhost) || empty($dbhost) || empty($dbhost) || empty($dbhost)){
        header("Location: ../installer.php?error=notcomplete");
        exit();
    } else {
        $content=file_get_contents('config.php');
        $content = preg_replace('/\$dbhost = \"(.*?)\";/', '$dbhost = "'.$dbhost.'";', $content);
        $content = preg_replace('/\$dbuser = \"(.*?)\";/', '$dbuser = "'.$dbuser.'";', $content);
        $content = preg_replace('/\$dbpass = \"(.*?)\";/', '$dbpass = "'.$dbpass.'";', $content);
        $content = preg_replace('/\$dbname = \"(.*?)\";/', '$dbname = "'.$dbname.'";', $content);
        $content = preg_replace('/\$dbport = \"(.*?)\";/', '$dbport = "'.$dbport.'";', $content);
        echo $content;
        file_put_contents('config.php', $content);
        header("Location: ../installer.php?step=3");
        exit();
    }
?>
