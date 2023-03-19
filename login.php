<?php
// Start the session
session_start();

// Set up the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the username and password from the form
  $username = $_POST["username"];
  $password = $_POST["password"];

 
  $result = $conn->query("SELECT * FROM user WHERE ('username','password')values(?,?)");
  $stmt->bind_param("ss", $username, $password);

  // Check if the query returned any results
  if ($result->num_rows > 0) {
    // User is authenticated, set the session variable and redirect to the dashboard
    $_SESSION["loggedin"] = true;
    header("location: dashboard.php");
  } else {
    // User is not authenticated, display an error message
    echo "Invalid username or password.";
  }
}







