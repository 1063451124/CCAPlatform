
<?php
// Ekko
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $book_date = $_POST["book_date"];
    $timeslot = $_POST["timeslot"];
    $coach = $_POST["coach"];
    $booker = $_POST["booker"];

    // Update timeslot information in the database
    $sql = "UPDATE timeslots SET book_date='$book_date', timeslot='$timeslot', coach='$coach', booker='$booker' WHERE date_timeslot='$date_timeslot'";
    if (mysqli_query($conn, $sql)) {
        echo "Timeslot updated successfully.";
    } else {
        echo "Error updating timeslot: " . mysqli_error($conn);
    }

    mysqli_close($conn);

} else {
    die("Invalid request.");
}
?>
