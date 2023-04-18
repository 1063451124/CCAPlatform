<?php
// Ekko
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data

    $book_date = $_POST["book_date"];
    $timeslot = $_POST["timeslots"];
    $coach = $_POST["coach"];
    $params = array();
    $sql = "INSERT INTO timeslots (date_timeslot, book_date, timeslot, coach)
    VALUES ";
    foreach ($timeslot as $value) {
        $index = $book_date . $value;
        $sql = $sql."('{$index}', '{$book_date}', '{$value}', '{$coach}'),";
    }
    
    $fsql = substr($sql,0,strlen($str)-1); 
    //print_r($fsql);

    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "cca";
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, "set names utf8");

    //AUTHOR SUNYT
    //MULTIPLE INSERSION
    mysqli_select_db($conn, 'cca');
    mysqli_query($conn, "SET AUTOCOMMIT=0"); // 设置为不自动提交，因为MYSQL默认立即执行
    mysqli_begin_transaction($conn);            // 开始事务定义

    if (!mysqli_query($conn, $fsql)) {
        $err = str_replace("'","`",mysqli_error($conn));
        mysqli_query($conn, "ROLLBACK");     // 判断当执行失败时回滚
        $msg = 'Error updating timeslot '.$err.'!';
        echo "<script>alert('".$msg."');location.href='/back_timeslot.php';</script>";
    }
    else{
        //echo 'success';
        echo "<script>alert('Timeslot updated successfully.');location.href='/back_timeslot.php';</script>";
    }
    mysqli_commit($conn);            //执行事务
    mysqli_close($conn);

}
