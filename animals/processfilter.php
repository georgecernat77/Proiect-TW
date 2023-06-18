<?php
session_start();
require_once('../config/config.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the JSON data from the request body
    $jsonData = file_get_contents('php://input');

    // Check if the JSON data is valid
    if ($jsonData) {
        // Decode the JSON data into a PHP associative array
        $data = json_decode($jsonData, true);

        // Access the individual form values
        $region = $data['region'];
        $habitat = $data['habitat'];
        $diet = $data['diet'];
        $type = $data['type'];

        // Create an array to store the matching filenames
        $matchingFiles = array();

        // Loop through the JSON files in the "../scrapper/" directory
        $directory = '../scraper/';
        $files = glob($directory . '*.json');
        $matchFound = false;
        foreach ($files as $file) {
            // Read the JSON content from the file
            $fileContent = file_get_contents($file);

            // Decode the JSON content into a PHP associative array
            $jsonArray = json_decode($fileContent, true);

            $match1 = false;
            $match2 = false;
            $match3 = false;
            $match4 = false;
            foreach ($jsonArray as $key => $valueArray) {
                if (in_array($key, ['type', 'location', 'eatingHabit', 'habitat']) && $jsonArray['visible'][0] === 1) {
                    if ($key === 'type') {
                        foreach ($valueArray as $value) {
                            if (!empty($type) && stripos($value, $type) !== false) {
                                $match1 = true;
                            }
                            
                        }
                    }
                    if ($key === 'location') {
                        foreach ($valueArray as $value) {
                            if (!empty($region) && stripos($value, $region) !== false) {
                                $match2 = true;
                            }
                        }
                    }
                    if ($key === 'eatingHabit') {
                        if (!empty($diet) && stripos($valueArray[0], $diet) !== false) {
                            $match3 = true;
                        }
                    }
                    if ($key === 'habitat') {
                        foreach ($valueArray as $value) {
                            if (!empty($habitat) && stripos($value, $habitat) !== false) {
                                $match4 = true;
                                
                            }
                        }
                    }
                    
                }
            }
            if($match1 === true && $match2 === true && $match3 === true && $match4 === true ){
                $matchFound = true;
                $matchingFiles[] = basename($file, '.json');
            }
        }

       
       if ($matchFound === true) {
        $response = array('status' => 'success', 'message' => $matchingFiles);
        
    } else {
        $response = array('status' => 'error', 'message' => 'No matches found');
        
    }
    
    
    // Send the response as JSON
    echo json_encode($response);
    } else {
        // Send an error response if the JSON data is not valid
        $response = array('status' => 'error', 'message' => 'Invalid request');
        echo json_encode($response);
    }
} else {
    // Send an error response if the request method is not POST
    $response = array('status' => 'error', 'message' => 'Invalid request method');
    echo json_encode($response);
}
?>
