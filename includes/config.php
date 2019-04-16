<?php
ob_start();
session_start();
// header('charset=utf8mb4'); 
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
$dbname = "blink";
$dbport = "8889";

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);
//Valiadate connection

if ($db -> connect_error) {
   die("Connection Failed: ".$db->connect_error);
}
mysqli_set_charset($db,"utf8mb4");

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
$user = new User($db);

?>
