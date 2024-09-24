<?php
    $url = "http://localhost:4021/api/teams";

    $urlWithParams = $url;

    // Initialize the session
    $session = curl_init();
    
    // Set the session options
    curl_setopt($session, CURLOPT_URL, $urlWithParams); // Endpoint
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true); // Correct boolean value
    
    // Execute the request
    $response = curl_exec($session);
    
    // Catch errors
    if ($response === false) {
        echo 'Curl error: ' . curl_error($session);
    } else {
        // Return JSON
        $responseData = json_decode($response, true);
        header('Content-Type: application/json');
        echo json_encode($responseData);
    }

    // Close session
    curl_close($session);
?>
