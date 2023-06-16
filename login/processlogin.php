<?php
session_start();
require_once('config.php');
// Retrieve the JSON data from the request body
$jsonData = file_get_contents('php://input');

// Check if the JSON data is valid
if ($jsonData) {
    // Decode the JSON data into a PHP associative array
    $data = json_decode($jsonData, true);

    // Access the individual form values
    $email = $data['email'];
    $password = $data['pass'];
    
    // Perform your processing logic here...
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $stmtselect = $db->prepare($sql);
    $result = $stmtselect->execute();
    if ($result) {
      $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
      if($stmtselect->rowCount() > 0){
        if(password_verify($password, $user["password"])){
            $_SESSION["user"] = $email;
            $_SESSION["firstname"] = $user['firstname'];
            $_SESSION["lastname"] = $user['lastname'];
            $_SESSION["accounttype"] = $user['accounttype'];
            $_SESSION["phonenumber"] = $user['phonenumber'];
            $response = array('status' => 'success', 'message' => 'Access granted!');
            echo json_encode($response);
        }
        else{
            $response = array('status' => 'error', 'message' => 'Incorrect password!');
            echo json_encode($response);
        }
      }else{
            $response = array('status' => 'error', 'message' => 'User with that email does not exist!');
            echo json_encode($response);
      }
    }
    else {
        $response = array('status' => 'error', 'message' => 'Error in accessing database!');
        echo json_encode($response);
    }
} else {
    // Send an error response if the JSON data is not valid
    $response = array('status' => 'error', 'message' => 'Invalid request');
    echo json_encode($response);
}
?>
