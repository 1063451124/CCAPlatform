
<?php
//Ekko
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
print_r($_GET);
// Check if a name or date_timeslot was provided in the URL
if (isset($_GET['name'])) {
    $name = $_GET['name'];

    // Delete the coach with the provided name
    $sql = "DELETE FROM coach WHERE name='$name'";
    if (mysqli_query($conn, $sql)) {
        //echo "Coach deleted successfully.";
        echo "<script>alert('Coach deleted successfully.');location.href='/back_timeslot.php';</script>";
        
    } else {
        //echo "Error deleting coach: " . mysqli_error($conn);
        $err = str_replace("'","`",mysqli_error($conn));
        $msg = "Error deleting coach: " . mysqli_error($conn);
        echo "<script>alert('".$msg."');location.href='/back_coach.php';</script>";
    }
} else if (isset($_GET['date_timeslot'])) {
    $date_timeslot = $_GET['date_timeslot'];

    // Delete the timeslot with the provided date_timeslot
    $sql = "DELETE FROM timeslots WHERE date_timeslot='$date_timeslot'";
    if (mysqli_query($conn, $sql)) {
        //echo "Timeslot deleted successfully.";
        echo "<script>alert('Timeslot deleted successfully.');location.href='/back_timeslot.php';</script>";
    } else {
        $err = str_replace("'","`",mysqli_error($conn));
        $msg = "Error deleting timeslot: " . mysqli_error($conn);
        echo "<script>alert('".$msg."');location.href='/back_timeslot.php';</script>";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
