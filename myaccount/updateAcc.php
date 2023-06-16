<?php
session_start();
require_once('config.php');
// Retrieve the JSON data from the request body
$jsonData = file_get_contents('php://input');


    if ($jsonData){
        $data = json_decode($jsonData, true);
        //  Access the individual form values
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $phonenumber = $data['phone'];
        $email = $_SESSION["user"];
        if($phonenumber != $_SESSION['phonenumber'] || $firstname != $_SESSION['firstname'] || $lastname != $_SESSION['lastname'])
        {   
            if (!empty($firstname) && !empty($lastname) && !empty($phonenumber)) {
                $phoneSelectQuery = "SELECT * FROM users WHERE phonenumber = :phonenumber";
                $stmtPhoneSelect = $db->prepare($phoneSelectQuery);
                $stmtPhoneSelect->bindParam(':phonenumber', $phonenumber);
                $stmtPhoneSelect->execute();

                if ($stmtPhoneSelect->rowCount() > 0 && $phonenumber != $_SESSION['phonenumber']) {
                    $error = "A user with this phone number already exists!";
                } else {
                    $updateQuery = "UPDATE users SET firstname = :firstname, lastname = :lastname, phonenumber = :phonenumber WHERE email = :email";
                    $stmtUpdate = $db->prepare($updateQuery);
                    $stmtUpdate->bindParam(':firstname', $firstname);
                    $stmtUpdate->bindParam(':lastname', $lastname);
                    $stmtUpdate->bindParam(':phonenumber', $phonenumber);
                    $stmtUpdate->bindParam(':email', $email);

                    if ($stmtUpdate->execute()) {
                        $rowsAffected = $stmtUpdate->rowCount();
                        if ($rowsAffected > 0) {
                            $_SESSION['firstname'] = $firstname;
                            $_SESSION['lastname'] = $lastname;
                            $_SESSION['phonenumber'] = $phonenumber;
                            $response = array('status' => 'success', 'message' => 'Your details have been updated!');
                            echo json_encode($response);
                        } else {
                            $response = array('status' => 'error', 'message' => 'No rows were affected by the update query!');
                            echo json_encode($response);
                        }
                    } else {
                        $response = array('status' => 'error', 'message' => 'Error executing the update query!');
                        echo json_encode($response);
                    }
                }
            } 
        } else {
            $response = array('status' => 'error', 'message' => 'Please provide new details!');
            echo json_encode($response);
        }
    }
?>
