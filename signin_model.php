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
//  取得查询结果
//$userInfo = $DB->getRow($query);
$userInfo = 233;
if (!empty($userInfo)) {
    //  当验证通过后，启动 Session
    session_start();
    //  注册登陆成功的 admin 变量，并赋值 true
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