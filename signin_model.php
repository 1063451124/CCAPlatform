<?php
///////////
//author sunyt
//function create session for all pages from login
/////

//  post
$posts = $_POST;
foreach ($posts as $key => $value) {
    $posts[$key] = trim($value);
}

$password = md5($posts["spwd"]);
$username = $posts["snumber"];
//$query = "SELECT `username` FROM `user` WHERE `password` = '$password' AND `username` = '$username'";
//  fetch result
//$userInfo = $DB->getRow($query);
$userInfo = 233;
if (!empty($userInfo)) {
    //  start Session when leagal
    session_start();
    //  teachers for admin
    $_SESSION["admin"] = false;
    $_SESSION["username"] = $username;
    $url = "/index.php";
    header("Location: $url");
    exit;  
} else {
    die("Wrong Password");
    $url = "/signin.php";
    header("Location: $url");
    exit; 
}
?>
