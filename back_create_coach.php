
<?php
// Ekko & Sunyt
// imitate Ekko's timeslot update
// Check if form was submitted
PRINT_R($_FILES);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //print_r( $_POST);
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

    // Retrieve values from the form
    //print_r($_POST);
    //echo(base64_encode(file_get_contents('/assets/resources/default.jpg')));
    if ($_FILES["img"]["error"] > 0)
    {
        $sql = "insert INTO `cca`.`coach` (`name`, `industries`, `detail`, `career`) 
        VALUES ('{$_POST['name']}', '{$_POST['industries']}', '{$_POST['detail']}', '{$_POST['career']}');";
    }
    else
    {
        $_POST['file_type'] = $_FILES["img"]["type"];
        $_POST['img'] = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
        $sql = "insert INTO `cca`.`coach` (`name`, `industries`, `detail`, `img`,`career`, `file_type`) 
        VALUES ('{$_POST['name']}', '{$_POST['industries']}', '{$_POST['detail']}','{$_POST['img']}', '{$_POST['career']}', '{$_POST['file_type']}');";
    }
    //$FILES["CV"]['type'],$POST['CV']
    // Update timeslot information in the database

    echo $sql;
    if (mysqli_query($conn, $sql)) {
        //echo "Timeslot updated successfully.";
        echo "<script>alert('Coach created successfully.');location.href='/back_coach.php';</script>";
    } else {
        $err = str_replace("'","`",mysqli_error($conn));
        $msg = 'Error creating coach: '.$err.'!';
        //echo  $msg;
        echo "<script>alert('".$msg."');location.href='/back_coach.php';</script>";
        //echo Error updating timeslot: {$msg};
    }

    mysqli_close($conn);

} else {
    die("Invalid request.");
}
?>
