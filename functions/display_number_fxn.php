<?php

// Include the connection file
include_once '../settings/connection.php';

// Function to retrieve and display the user's email based on their email
function display_number($email) {
    global $conn;
    // Query to fetch the email based on the provided email
    $sql = "SELECT contact FROM people WHERE email = '$email'";
    $result = $conn->query($sql);
    // Check if the query was successful
    if ($result) {
        // Fetch the email
        $row = $result->fetch_assoc();
        return $row['contact'];
    } else {
        // Error handling if user not found
        return "Error fetching user email";
    }
}
