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
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $password = $data['pass'];
    $email = $data['email'];
    $phonenumber = $data['phone'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $select = "SELECT * FROM users WHERE email = '$email'";
    $stmtselect = $db->prepare($select);
    $selectResult = $stmtselect->execute();
    $phoneselect = "SELECT * FROM users WHERE phonenumber = '$phonenumber'";
    $stmtphoneselect = $db->prepare($phoneselect);
    $phoneResult = $stmtphoneselect->execute();

    if($selectResult && $phoneResult){
      if($stmtselect->rowCount() > 0){
        $response = array('status' => 'error', 'message' => 'An user with this email exists already!');
        echo json_encode($response);
      }  
      else if($stmtphoneselect->rowCount() > 0){
        $response = array('status' => 'error', 'message' => 'An user with this phone number exists already!');
        echo json_encode($response);
      } 
     else
      {
          $sql = "INSERT INTO users (firstname, lastname, password, email, phonenumber,accounttype) VALUES(?,?,?,?,?, 'user')";
          $stmtinsert = $db->prepare($sql);
          $result = $stmtinsert->execute([$firstname, $lastname, $hashedPassword, $email, $phonenumber]);
          if ($result) {
            $response = array('status' => 'success', 'message' => 'Account created!');
            echo json_encode($response);
          } else {
            $response = array('status' => 'error', 'message' => 'Error in saving!');
            echo json_encode($response);
          }
      }
    }else{
        $response = array('status' => 'error', 'message' => 'Could not access database!');
        echo json_encode($response);
      }
} else {
    $response = array('status' => 'error', 'message' => 'Invalid request');
    echo json_encode($response);
}
?>
