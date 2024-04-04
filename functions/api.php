<?php

// Simulating some data
$backendData = array(
    array('id' => 1, 'name' => 'Cabbages', 'price' => 10),
    array('id' => 2, 'name' => 'Apples', 'price' => 20),
    array('id' => 3, 'name' => 'Watermelons', 'price' => 30),
    array('id' => 4, 'name' => 'Lemons', 'price' => 15),
    array('id' => 5, 'name' => 'Lettuce', 'price' => 10),
    array('id' => 6, 'name' => 'Basil', 'price' => 45)
);

// Set the content type to JSON
header('Content-Type: application/json');

// Handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $itemId = $_GET['id'];
        $item = null;
        foreach ($backendData as $data) {
            if ($data['id'] == $itemId) {
                $item = $data;
                break;
            }
        }
        if ($item) {
            echo json_encode($item);
        } else {
            echo json_encode(array('error' => 'Item not found'));
        }
    } else {
        // Return all items
        echo json_encode($backendData);
    }
} else {
    // Handle unsupported request methods
    http_response_code(405);
    echo json_encode(array('error' => 'Method not allowed'));
}

