//Ekko
<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "cca";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a name or date_timeslot was provided in the URL
if (isset($_GET['name'])) {
    $name = $_GET['name'];

    // Delete the coach with the provided name
    $sql = "DELETE FROM coach WHERE name='$name'";
    if (mysqli_query($conn, $sql)) {
        echo "Coach deleted successfully.";
    } else {
        echo "Error deleting coach: " . mysqli_error($conn);
    }
} else if (isset($_GET['date_timeslot'])) {
    $date_timeslot = $_GET['date_timeslot'];

    // Delete the timeslot with the provided date_timeslot
    $sql = "DELETE FROM timeslots WHERE date_timeslot='$date_timeslot'";
    if (mysqli_query($conn, $sql)) {
        echo "Timeslot deleted successfully.";
    } else {
        echo "Error deleting timeslot: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
