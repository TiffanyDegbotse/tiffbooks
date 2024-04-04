<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file fields are not empty
    if (!empty($_FILES['pdf']['name']) && !empty($_FILES['image']['name'])) {
        // File upload directory
        $targetDir = "../uploads/";

        // Allow only pdf and image file types
        $allowedPdfExtensions = array("pdf");
        $allowedImageExtensions = array("jpg", "jpeg", "png", "gif");

        // Get file extensions
        $pdfExtension = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
        $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        // Check if file extensions are allowed
        if (in_array($pdfExtension, $allowedPdfExtensions) && in_array($imageExtension, $allowedImageExtensions)) {
            // Generate unique file names
            $pdfFileName = uniqid("pdf_") . "." . $pdfExtension;
            $imageFileName = uniqid("image_") . "." . $imageExtension;

            // File paths
            $pdfFilePath = $targetDir . $pdfFileName;
            $imageFilePath = $targetDir . $imageFileName;

            // Upload files
            if (move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfFilePath) && move_uploaded_file($_FILES['image']['tmp_name'], $imageFilePath)) {
                // Redirect to borrowing_view.php with file paths as arrays
                header("Location: ../admin/borrowing_view.php?pdf[]=$pdfFilePath&image[]=$imageFilePath");
                exit();
            } else {
                echo "Sorry, there was an error uploading your files.";
            }
        } else {
            echo "Only PDF and image files are allowed.";
        }
    } else {
        echo "Please select both PDF and image files.";
    }
} else {
    // Redirect back to the lending_view page if accessed directly
    header("Location: lending_view.php");
    exit();
}
