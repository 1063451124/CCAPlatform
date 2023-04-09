<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date_timeslot = $_POST["date_timeslot"];
    $book_date = $_POST["book_date"];
    $timeslot = $_POST["timeslot"];
    $coach = $_POST["coach"];
    $booker = $_POST["booker"];

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

    // Insert new timeslot into the database
    $sql = "INSERT INTO timeslot (date_timeslot, book_date, timeslot, coach, booker)
            VALUES ('$date_timeslot', '$book_date', '$timeslot', '$coach', '$booker')";
    if (mysqli_query($conn, $sql)) {
        echo "New timeslot created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

