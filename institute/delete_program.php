<?php
session_start();
include '../config.php'; // Database connection file

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Check if program ID is set
if (isset($_GET['id'])) {
    $program_id = mysqli_real_escape_string($con, $_GET['id']);

    // Delete the program from the database
    $query = "DELETE FROM `program` WHERE `program_id` = '$program_id'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Program deleted successfully.'); window.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Error deleting program.'); window.location = 'program_list.php';</script>";
    }
} else {
    echo "<script>alert('Invalid program ID.'); window.location = 'program_list.php';</script>";
}
?>
