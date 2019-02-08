<?php
if($_POST['submitInfo'] == 1) {
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
        include 'config.php';
        $query = '';
        $sqlScript = file('import.sql');
        foreach ($sqlScript as $line)	{
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                continue;
            }
            $query = $query . $line;
            if ($endWith == ';') {
                mysqli_query($db,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
                $query= '';
            }
        }
        header("Location: ../installer.php?step=3");
        exit();
    }
}

if($_POST['letsgosubmit'] == 1) {
    include 'config.php';
    $siteName = $_POST['siteName'];
    $siteAddress = $_POST['siteAddress'];
    $username = $_POST['username'];
    $userPass = $_POST['userPass'];
    $conformPass = $_POST['conformPass'];
    if (empty($siteName)||empty($siteAddress)||empty($username)||empty($userPass)||empty($conformPass)) {
        header("Location: ../installer.php?step3&error=empty");
        exit();
    } elseif ($userPass != $conformPass) {
        header("Location: ../installer.php?step3&error=passnotsame");
        exit();
    } else {
        $sql = "REPLACE INTO blink_options (`name`, `user`, `value`)
        VALUES
          ('siteName', 0, '$siteName'),
          ('siteUrl', 0, '$siteAddress'),
          ('installed', 0, '1'),;";
        mysqli_query($sql, $db);
        $hashedPWD =  password_hash($userPass, PASSWORD_DEFAULT);
        $sql = "UPDATE blink_useres set password = '$hashedPWD', `name` = '$username', screenName = '$username', created = NOW() WHERE uid = 1";
        mysqli_query($sql, $db);
        header("Location: ../installer.php?step4");
        exit();
    }
}

?>
