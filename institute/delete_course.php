<?php
session_start();
include '../config.php'; // Database connection file

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Check if the course ID is set
if (isset($_GET['id'])) {
    $course_id = $_GET['id'];

    // Prepare the DELETE statement
    $query = "DELETE FROM `course` WHERE `course_id` = '$course_id'";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Course deleted successfully.'); window.location = 'view_course.php';</script>";
    } else {
        echo "<script>alert('Error deleting course.'); window.location = 'view_course.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location = 'view_course.php';</script>";
}
?>
