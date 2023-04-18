
<?php
// Ekko & Sunyt
// imitate Ekko's timeslot update
// Check if form was submitted
//PRINT_R($_FILES);
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

    if ($_FILES["img"]["error"] > 0)
    {
        $_POST['img'] = "";
        $_POST['file_type'] = "";
    }
    else
    {
        $_POST['file_type'] = $_FILES["img"]["type"];
        $_POST['img'] = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
    }
    //$FILES["CV"]['type'],$POST['CV']
    // Update timeslot information in the database
    $sql = "update cca.coach SET detail='{$_POST['detail']}',
    career='{$_POST['career']}',img='{$_POST['img']}',file_type='{$_POST['file_type']}',industries='{$_POST['industries']}' 
    WHERE name='{$_POST['name']}'";
    //echo $sql;
    if (mysqli_query($conn, $sql)) {
        //echo "Timeslot updated successfully.";
        echo "<script>alert('Coach updated successfully.');location.href='/back_coach.php';</script>";
    } else {
        $err = str_replace("'","`",mysqli_error($conn));
        $msg = 'Error updating coach: '.$err.'!';
        //echo  $msg;
        echo "<script>alert('".$msg."');location.href='/back_coach.php';</script>";
        //echo Error updating timeslot: {$msg};
    }

    mysqli_close($conn);

} else {
    die("Invalid request.");
}
?>
