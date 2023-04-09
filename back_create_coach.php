
<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate the form data
  $name = trim($_POST["name"]);
  $industries = trim($_POST["industries"]);
  $detail = trim($_POST["detail"]);
  $img = $_FILES["img"];

  $errors = [];

  // Check that the name field is not empty
  if (empty($name)) {
    $errors[] = "Please enter a name for the coach.";
  }

  // Check that at least one industry is selected
  if (empty($industries)) {
    $errors[] = "Please select at least one industry.";
  }

  // Check that the detail field is not empty
  if (empty($detail)) {
    $errors[] = "Please enter some details about the coach.";
  }

  // Check that the image file is valid
  if (!empty($img["name"])) {
    $allowed_types = ["image/jpeg", "image/png", "image/gif"];
    if (!in_array($img["type"], $allowed_types)) {
      $errors[] = "Invalid image type. Please upload a JPEG, PNG or GIF file.";
    }
    if ($img["size"] > 5 * 1024 * 1024) { // 5 MB
      $errors[] = "File size exceeds maximum allowed. Please upload a smaller image.";
    }
  }

  // If there are no errors, insert the coach data into the database
  if (empty($errors)) {
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "cca";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO coaches (name, industries, detail, img) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $industries, $detail, $img_name);

    // Save the image file and get its name
    if (!empty($img["name"])) {
      $img_name = uniqid() . "." . pathinfo($img["name"], PATHINFO_EXTENSION);
      move_uploaded_file($img["tmp_name"], "uploads/" . $img_name);
    } else {
      $img_name = null;
    }

    // Execute the statement and check for errors
    if ($stmt->execute()) {
      // Redirect to the coaches list page
      header("Location: coaches.php");
      exit();
    } else {
      $errors[] = "Error inserting coach into database: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
  }
}

// If the form has not been submitted or there are errors, display the form again
?>

<h2>Add Coach</h2>

<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    <ul>
    <?php foreach ($errors as $error): ?>
      <li><?php echo $error ?></li>
    <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<form method="post" enctype="multipart/form-data">
  <label for="name">Name:</label>
