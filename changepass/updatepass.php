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
    $oldPassword = $data['opass'];
    $newPassword = $data['npass'];
    $confirmPassword = $data['cpass'];
    $email = $_SESSION["user"];
    // Perform your processing logic here...
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $stmtselect = $db->prepare($sql);
    $result = $stmtselect->execute();
    if ($result) {
      $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
      if($stmtselect->rowCount() > 0){
        if(password_verify($oldPassword, $user["password"]))
        {
            if(!password_verify($newPassword, $user["password"])){
                $updateQuery = "UPDATE users SET password = :password WHERE email = :email";
                $stmtUpdate = $db->prepare($updateQuery);
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmtUpdate->bindParam(':password', $hashedPassword);
                $stmtUpdate->bindParam(':email', $email);

                if ($stmtUpdate->execute()) {
                    $rowsAffected = $stmtUpdate->rowCount();
                    if ($rowsAffected > 0) {
                        $response = array('status' => 'success', 'message' => 'Your password has been updated!');
                        echo json_encode($response);
                    } else {
                        $response = array('status' => 'error', 'message' => 'Error in updating the password!');
                        echo json_encode($response);
                    }
                } else {
                    $response = array('status' => 'error', 'message' => 'Error executing the update query!');
                    echo json_encode($response);
                }
            }
        }
        else
        {
            $response = array('status' => 'error', 'message' => 'Old password is incorrect!');
            echo json_encode($response);
        }
    }else{
            $response = array('status' => 'error', 'message' => 'User with that email does not exist!');
            echo json_encode($response);
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Error in accessing database!');
        echo json_encode($response);
    }
} else {
    // Send an error response if the JSON data is not valid
    $response = array('status' => 'error', 'message' => 'Invalid request');
    echo json_encode($response);
}
?>
