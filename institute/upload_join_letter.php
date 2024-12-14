<?php
session_start();
include '../config.php'; // Include database connection

if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['join_letter'])) {
    $applicationId = $_POST['application_id'];
    $file = $_FILES['join_letter'];

    // Check for file upload errors
    if ($file['error'] === 0) {
        // Define the upload directory
        $uploadDir = '../upload/';
        $fileName = uniqid() . '-' . basename($file['name']);
        $uploadPath = $uploadDir . $fileName;

        // Move the file to the desired directory
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            // Update the database with the join letter path
            $query = "UPDATE course_application SET join_letter = '$fileName' WHERE course_apply_id = '$applicationId'";
            if (mysqli_query($con, $query)) {
                echo "<script>alert('Join letter uploaded successfully.'); window.location = 'course_report.php';</script>";
            } else {
                echo "<script>alert('Database update failed.'); window.location = 'course_report.php';</script>";
            }
        } else {
            echo "<script>alert('File upload failed.'); window.location = 'course_report.php';</script>";
        }
    } else {
        echo "<script>alert('Error uploading file.'); window.location = 'course_report.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location = 'course_report.php';</script>";
}
?>
