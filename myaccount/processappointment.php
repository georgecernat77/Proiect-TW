<?php
session_start();
require_once('../config/config.php');

$email = $_SESSION["user"];
$sql = "SELECT * FROM userappointments WHERE email = '$email'";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute();
// Check if select successful
if ($result) {
  // Create an array to store the appointment data
  // Set the response header to JSON
  header('Content-Type: application/json');

  // Fetch each row from the result set
  $appointments = $stmtselect->fetchAll(PDO::FETCH_ASSOC);

  // Return the appointments array as JSON
  echo json_encode($appointments);
} else {
  // Error occurred during the query
    echo json_encode('Error in accessing database!');
}


?>
