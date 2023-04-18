
<?php
// Ekko
// Check if form was submitted
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

    $date_timeslot = $_POST["date_timeslot"];
    $coach = $_POST["coach"];
    if (!ctype_space($_POST["booker"]) && !empty($_POST["booker"])){
        $booker = "'".$_POST["booker"]."'";
    }
    else{
        $booker = 'null';
    }

    // Update timeslot information in the database
    $sql = "UPDATE cca.timeslots SET coach='{$coach}', booker={$booker} WHERE date_timeslot='$date_timeslot'";
    //echo $sql;
    if (mysqli_query($conn, $sql)) {
        //echo "Timeslot updated successfully.";
        echo "<script>alert('Timeslot updated successfully.');location.href='/back_timeslot.php';</script>";
    } else {
        $err = str_replace("'","`",mysqli_error($conn));
        $msg = 'Error updating timeslot: '.$err.'!';
        //echo  $msg;
        echo "<script>alert('".$msg."');location.href='/back_timeslot.php';</script>";
        //echo Error updating timeslot: {$msg};
    }

    mysqli_close($conn);

} else {
    die("Invalid request.");
}
?>
