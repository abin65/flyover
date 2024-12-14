<?php
// Start session and include database connection
session_start();
include '../config.php'; // Assuming config.php connects to your database

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Get the institute ID from the session
$institute_id = $_SESSION['login_id'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get form data
    $job_title = mysqli_real_escape_string($con, $_POST['job_name']);
    $company_name = mysqli_real_escape_string($con, $_POST['company']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $requirement = mysqli_real_escape_string($con, $_POST['requirement']);
    $post_date = mysqli_real_escape_string($con, $_POST['post_date']);
    $expiry_date = mysqli_real_escape_string($con, $_POST['end_date']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    // Insert into the database
    $query = "INSERT INTO `job` (`job_title`, `company_name`, `salary`, `description`, `requirement`, `post_date`, `expiry_date`, `location`, `institute_id`) 
              VALUES ('$job_title', '$company_name', '$salary', '$description', '$requirement', '$post_date', '$expiry_date', '$location', '$institute_id')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Job added successfully.'); window.location = 'index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    // If the request method is not POST, redirect to the form
    header("Location: add_faculty.php");
    exit;
}
?>
