<!DOCTYPE html>
<html>
<head>
    <title>Edit Timeslot</title>
</head>
<body>
    <h1>Edit Timeslot</h1>

    <?php
    // Check if the date_timeslot parameter was passed in the URL
    if (isset($_GET["date_timeslot"])) {
        $date_timeslot = $_GET["date_timeslot"];

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

        // Retrieve timeslot information from the database
        $sql = "SELECT * FROM timeslots WHERE date_timeslot='" . $date_timeslot . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $book_date = $row["book_date"];
            $timeslot = $row["timeslot"];
            $coach = $row["coach"];
            $booker = $row["booker"];
        } else {
            die("Timeslot not found.");
        }

        mysqli_close($conn);
    } else {
        die("No timeslot specified.");
    }
    ?>

    <form method="post" action="update_timeslot.php">
        <input type="hidden" id="date_timeslot" name="date_timeslot" value="<?php echo $date_timeslot; ?>">

        <label for="book_date">Book Date:</label>
        <input type="text" id="book_date" name="book_date" value="<?php echo $book_date; ?>"><br>

        <label for="timeslot">Timeslot:</label>
        <input type="text" id="timeslot" name="timeslot" value="<?php echo $timeslot; ?>"><br>

        <label for="coach">Coach:</label>
        <select id="coach" name="coach">
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

            // Retrieve coaches from the database
            $sql = "SELECT name FROM coach";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    if ($row["name"] == $coach) {
                        echo "<option value='" . $row["name"] . "' selected>" . $row["name"] . "</option>";
                    } else {
                        echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                    }
                }
            } else {
                echo "<option value=''>No coaches found.</option>";
            }

            mysqli_close($conn);
            ?>
        </select><br>

        <label for="booker">Booker:</label>
        <input type="text" id="booker" name="booker" value="<?php echo $booker; ?>"><br>
        
        <input type="submit" value="Save">
    </form>
</body>
</html>
