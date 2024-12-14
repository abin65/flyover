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
    $course_name = mysqli_real_escape_string($con, $_POST['course_name']);
    $course_duration = mysqli_real_escape_string($con, $_POST['course_duration']);
    $fees = mysqli_real_escape_string($con, $_POST['fees']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $university = mysqli_real_escape_string($con, $_POST['university']);
    $eligibility = mysqli_real_escape_string($con, $_POST['eligibility']);
    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);

    // Handle file uploads (application and photo)
    $target_dir = "../upload/";
    
    // Handle application upload
    $application_name = $_FILES['application']['name'];
    $application_tmp_name = $_FILES['application']['tmp_name'];
    $application_target_file = $target_dir . basename($application_name);
    move_uploaded_file($application_tmp_name, $application_target_file); // Upload application file
    
    // Handle photo upload
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp_name = $_FILES['photo']['tmp_name'];
    $photo_target_file = $target_dir . basename($photo_name);
    move_uploaded_file($photo_tmp_name, $photo_target_file); // Upload photo file

    // Insert into the database
    $query = "INSERT INTO `course` (`course_name`, `course_duration`, `course_fees`, `course_description`, `university`, `course_application`, `course_profile`, `eligibility`, `course_start_date`, `course_end_date`, `institute_id`) 
              VALUES ('$course_name', '$course_duration', '$fees', '$description', '$university', '$application_name', '$photo_name', '$eligibility', '$start_date', '$end_date', '$institute_id')";


    if (mysqli_query($con, $query)) {
        echo "<script>alert('Course added successfully.'); window.location = 'index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
