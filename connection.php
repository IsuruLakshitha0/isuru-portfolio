<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php
  // Connect to MySQL database
  $servername = "localhost";
  $username = "id20172692_isuru";
  $password = "Lakshitha@0820";
  $dbname = "id20172692_portfolio";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["message"];

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO contact (name, email, phone, message) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $phone, $message);

  // Insert data into MySQL table
  if ($stmt->execute() === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $stmt->error;
  }
  $stmt->close();
  $conn->close();
?>
