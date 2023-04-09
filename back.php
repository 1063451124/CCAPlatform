<!DOCTYPE html>
<html>
<head>
    <title>Coach Booking System Backstage</title>
</head>
<body>
    <h1>Coach Booking System</h1>

    <h2>Coaches</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Industries</th>
                <th>Detail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
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

            // Retrieve coaches from the database
            $sql = "SELECT * FROM coach";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["industries"] . "</td>";
                    echo "<td>" . $row["detail"] . "</td>";
                    echo "<td><a href='back_edit.php?name=" . $row["name"] . "'>Edit</a> | <a href='back_delete.php?name=" . $row["name"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No coaches found.</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <br>

    <h2>Timeslots</h2>
    <table>
        <thead>
            <tr>
                <th>Date/Timeslot</th>
                <th>Book Date</th>
                <th>Timeslot</th>
                <th>Coach</th>
                <th>Booker</th>
                <th>Last Modify Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
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

            // Retrieve timeslots from the database
            $sql = "SELECT * FROM timeslots";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["date_timeslot"] . "</td>";
                    echo "<td>" . $row["book_date"] . "</td>";
                    echo "<td>" . $row
                    ["timeslot"] . "</td>";
                    echo "<td>" . $row["coach"] . "</td>";
                    echo "<td>" . $row["booker"] . "</td>";
                    echo "<td>" . $row["last_modify_time"] . "</td>";
                    echo "<td><a href='edit.php?date_timeslot=" . $row["date_timeslot"] . "'>Edit</a> | <a href='delete.php?date_timeslot=" . $row["date_timeslot"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No timeslots found.</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <br>

    <h2>Add Coach</h2>
    <form method="post" action="back_create_coach.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="industries">Industries:</label>
        <input type="text" id="industries" name="industries"><br>

        <label for="detail">Detail:</label>
        <textarea id="detail" name="detail"></textarea><br>

        <label for="img">Image:</label>
        <input type="file" id="img" name="img"><br>

        <input type="submit" value="Add">
    </form>

    <br>

    <h2>Add Timeslot</h2>
    <form method="post" action="back_create_timeslot.php">
        <label for="date_timeslot">Date/Timeslot:</label>
        <input type="text" id="date_timeslot" name="date_timeslot" required><br>

        <label for="book_date">Book Date:</label>
        <input type="text" id="book_date" name="book_date"><br>

        <label for="timeslot">Timeslot:</label>
        <input type="text" id="timeslot" name="timeslot"><br>

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
                    echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                }
            } else {
                echo "<option value=''>No coaches found.</option>";
            }

            mysqli_close($conn);
            ?>
        </select><br>

        <label for="booker">Booker:</label>
        <input type="text" id="booker" name="booker"><br>

        <input type="submit" value="Add">
    </form>
</body>
</html>
