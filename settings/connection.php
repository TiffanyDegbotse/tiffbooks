<?php

// Declare constant variables for database connection parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'booktiff');

// Connect to the database using mysqli
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Couldn't connect to database");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}