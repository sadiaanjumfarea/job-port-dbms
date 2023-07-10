<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$recruiter_id = $_POST["recruiter-id"];

$sql = "SELECT * FROM recuiter WHERE r_id = $recruiter_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Recruiter has been informed.";
  header("Location: appli_procedure.php?recruiter_id=$recruiter_id");
} else {
  echo "Recruiter ID not found!";
}

$conn->close();
?>
