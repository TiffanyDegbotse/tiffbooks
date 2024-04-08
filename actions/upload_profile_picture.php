<?php
// Include the connection file
include_once '../settings/connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is selected
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) {
        // Specify the directory where the file will be stored
        $targetDir = "../profile_pictures/";

        // Get the file name and extension
        $fileName = basename($_FILES["profile_picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");

        // Check if the file type is allowed
        if (in_array($fileType, $allowedExtensions)) {
            // Upload the file to the specified directory
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
                // Get the user's ID from the session
                session_start();
                $user_id = $_SESSION['userid'];
                 // Check if the user already has a profile picture
                 $sql = "SELECT * FROM profile WHERE pid = $user_id";
                 $result = $conn->query($sql);
 
                 if ($result->num_rows > 0) {
                     // Update the user's profile picture path in the database
                     $sql = "UPDATE profile SET imagepath = '$targetFilePath' WHERE pid = $user_id";
                 } else {
                     // Insert the user's profile picture path into the database
                     $sql = "INSERT INTO profile (pid, imagepath) VALUES ($user_id, '$targetFilePath')";
                 }
 
                 if ($conn->query($sql) === TRUE) {
                     // Set the $profile_picture variable to the uploaded file path
                     $profile_picture = $targetFilePath;
 
                     // Redirect back to the user profile page
                     header("Location:../admin/user_profile_view.php");
                     exit();
                 } else {
                     echo "Error updating profile picture: " . $conn->error;
                 }
             } else {
                 echo "Sorry, there was an error uploading your file.";
             }
         } else {
             echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
         }
     } else {
         echo "No file selected or an error occurred while uploading the file.";
     }
 } else {
     echo "Invalid request method.";
 }
