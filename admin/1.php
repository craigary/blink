<?php
$hashedPWD =  password_hash(782012369, PASSWORD_DEFAULT);
echo $hashedPWD;
echo $_SESSION['uid'];
?>

$grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower( trim( $userResult['email']))) . "?d=" . urlencode( $default ) . "&s=300";
