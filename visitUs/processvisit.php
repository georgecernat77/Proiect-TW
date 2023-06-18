<?php
session_start();
require_once('../config/config.php');
// Retrieve the JSON data from the request body
$jsonData = file_get_contents('php://input');

// Check if the JSON data is valid
if ($jsonData) {
    // Decode the JSON data into a PHP associative array
    $data = json_decode($jsonData, true);

    // Access the individual form values
    $date = $data['date'];
    $time = $data['time'];
    $place = $data['place'];
    $email = $_SESSION["user"];
    // Perform your processing logic here...


    $select = "SELECT * FROM userappointments WHERE date = '$date' AND time = '$time' AND place = '$place'";
    $stmtselect = $db->prepare($select);
    $selectResult = $stmtselect->execute();
    if($selectResult){
        if($stmtselect->rowCount() > 0)
        {
            $response = array('status' => 'error', 'message' => 'An appointment with this date already exists!');
            echo json_encode($response);
        }
        else{
            $sql = "INSERT INTO userappointments (email, date, time, place) VALUES(?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$email, $date, $time, $place]);
            if ($result) {
                $response = array('status' => 'success', 'message' => 'Appointment created successfully!');
                echo json_encode($response);
            } else {
                $response = array('status' => 'error', 'message' => 'Error in accessing database!');
                echo json_encode($response);
            }
        }
    }
} else {
    // Send an error response if the JSON data is not valid
    $response = array('status' => 'error', 'message' => 'Invalid request');
    echo json_encode($response);
}
?>
