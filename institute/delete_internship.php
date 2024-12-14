<?php
// Start session and include database connection
session_start();
include '../config.php'; // Assuming config.php connects to your database

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Check if the internship ID is provided
if (isset($_GET['id'])) {
    $internship_id = mysqli_real_escape_string($con, $_GET['id']);
    
    // Delete the internship from the database
    $query = "DELETE FROM `internship` WHERE `internship_id` = '$internship_id'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Internship deleted successfully.'); window.location = 'index.php';</script>"; // Redirect to the internship list page
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "<script>alert('Invalid internship ID.'); window.location = 'internship_list.php';</script>";
}
?>
