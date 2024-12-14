<?php
session_start();
include '../config.php'; // Database connection file

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Check if the job ID is provided in the URL
if (isset($_GET['id'])) {
    $job_id = $_GET['id'];

    // Retrieve and sanitize input values from the form
    $job_name = mysqli_real_escape_string($con, $_POST['job_name']);
    $company = mysqli_real_escape_string($con, $_POST['company']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $requirement = mysqli_real_escape_string($con, $_POST['requirement']);
    $post_date = mysqli_real_escape_string($con, $_POST['post_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    // Update the job record in the database
    $query = "UPDATE `job` SET 
        `job_title` = '$job_name',
        `company_name` = '$company',
        `salary` = '$salary',
        `description` = '$description',
        `requirement` = '$requirement',
        `post_date` = '$post_date',
        `expiry_date` = '$end_date',
        `location` = '$location'
        WHERE `job_id` = '$job_id'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Job updated successfully!'); window.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Error updating job: " . mysqli_error($con) . "'); window.location = 'index.php';</script>";
    }
} else {
    echo "<script>alert('No job ID provided.'); window.location = 'index.php';</script>";
    exit;
}
?>
