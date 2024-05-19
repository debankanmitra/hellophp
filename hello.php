<?php

// Simulate a GET request if the script is run from the command line
if (php_sapi_name() == 'cli') {
    parse_str(implode('&', array_slice($argv, 1)), $_GET);
    $_SERVER['REQUEST_METHOD'] = $_GET['method'] ?? 'GET';
}

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Set the response content type to JSON
    header('Content-Type: application/json');
    
    // Return a JSON response with the message "hello PHP"
    echo json_encode(array('message' => 'hello PHP'));
} else {
    // Return a 405 Method Not Allowed response if the request method is not GET
    http_response_code(405);
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
