<?php

// Include the connection file
include_once '../settings/connection.php';

// Function to retrieve the user's first name based on their email
function display_name($email) {
        global $conn;
        // Query to fetch the first name based on the email
        $sql = "SELECT firstname FROM people WHERE email = '$email'";
        $result = $conn->query($sql);
        // Check if the query was successful
        if ($result) {
            // Fetch the first name
            $row = $result->fetch_assoc();
            return $row['firstname'];
        } else {
            // Error handling if user not found
            return "Error fetching user information";
        }
    }

