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
    
    // Get form data and escape for SQL
    $internship_title = mysqli_real_escape_string($con, $_POST['intership_name']);
    $company_name = mysqli_real_escape_string($con, $_POST['company']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $stipend = mysqli_real_escape_string($con, $_POST['stipend']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $requirement = mysqli_real_escape_string($con, $_POST['requirement']);
    $post_date = mysqli_real_escape_string($con, $_POST['post_date']);
    $expiry_date = mysqli_real_escape_string($con, $_POST['expire_date']);
    $duration = mysqli_real_escape_string($con, $_POST['duration']);

    // Handle file upload for application
    $target_dir = "../upload/";
    $application_name = $_FILES['application']['name'];
    $application_tmp_name = $_FILES['application']['tmp_name'];
    $application_target_file = $target_dir . basename($application_name);
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($application_tmp_name, $application_target_file)) {
        // Insert into the database
        $query = "INSERT INTO `internship` (`internship_title`, `company_name`, `location`, `stipend`, `description`, `requirement`, `post_date`, `expiry_date`, `institute_id`, `application`, `duration`) 
                  VALUES ('$internship_title', '$company_name', '$location', '$stipend', '$description', '$requirement', '$post_date', '$expiry_date', '$institute_id', '$application_name', '$duration')";

        if (mysqli_query($con, $query)) {
            echo "<script>alert('Internship added successfully.'); window.location = 'index.php';</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "<script>alert('Sorry, there was an error uploading your application file.'); window.history.back();</script>";
    }
}
?>
