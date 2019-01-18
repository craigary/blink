<?php
ob_start();
session_start();

//database credentials
// define('DBHOST','localhost');
// define('DBUSER','root');
// define('DBPASS','');
// define('DBNAME','blog');

// $db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "root";
$dbname = "blog";
$dbport = "8889";

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

//Valiadate connection

if ($db -> connect_error) {
   die("Connection Failed: ".$db->connect_error);
}

//set timezone
date_default_timezone_set('Europe/London');
//load classes as needed
class User {
    public function is_logged_in(){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            return true;
        }
    }
    public function logout(){
        session_destroy();
    }
}

$sql = "SELECT * FROM blink_options";
$settings = mysqli_fetch_assoc(mysqli_query($db, $sql));
// Posts per page
$postsPerPage = $settings['postsPerPage'];
$blogName = $settings['blogName'];
$blogCover = $settings['blogCover'];
// $codeInjection_head = $settings['codeInjection_head'];
// $codeInjection_foo = $settings['codeInjection_foo'];
$user = new User($db);



?>
