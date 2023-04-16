<?php
      //////////////////////////////////////
      //author: sunyt
      //function: get mysql connection and return
      //////////////////////////////////////

function get_conn() {
$servername = "localhost";
$username = "root";
$password = "root";
$db = "cca";
    // build 
    $conn = new mysqli($servername, $username, $password,$db);
 
// test
if ($conn->connect_error) {
    die("DB ERROR!" . $conn->connect_error);
} 

#echo "Successful!";
return $conn;
}


?>