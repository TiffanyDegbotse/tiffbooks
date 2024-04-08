<?php
// Include the connection file
include_once '../settings/connection.php';

// Function to calculate approval rate
function calculateApprovalRate() {
    global $conn;

// Query to count total reviews submitted
$sql_total_reviews = "SELECT COUNT(*) AS total_reviews FROM reviewstatus";

// Query to count approved reviews
$sql_approved_reviews = "SELECT COUNT(*) AS approved_reviews FROM reviewstatus WHERE reviewstatus = 1";

// Execute queries
$result_total_reviews = $conn->query($sql_total_reviews);
$result_approved_reviews = $conn->query($sql_approved_reviews);

// Get counts from results
$total_reviews = $result_total_reviews->fetch_assoc()['total_reviews'];
$approved_reviews = $result_approved_reviews->fetch_assoc()['approved_reviews'];

// Calculate approval rate
if ($total_reviews > 0) {
    $approval_rate = ($approved_reviews / $total_reviews) * 100;
} else {
    $approval_rate = 0; // Default to 0 if no reviews submitted
}
return number_format($approval_rate, 2);
}


