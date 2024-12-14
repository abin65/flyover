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
    
    // Get course ID from hidden input
    $course_id = mysqli_real_escape_string($con, $_POST['course_id']);

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

    // Initialize file names
    $application_name = $_FILES['application']['name'] ? $_FILES['application']['name'] : null;
    $photo_name = $_FILES['photo']['name'] ? $_FILES['photo']['name'] : null;

    // Check if a new application file was uploaded
    if ($application_name) {
        $application_tmp_name = $_FILES['application']['tmp_name'];
        $application_target_file = $target_dir . basename($application_name);
        move_uploaded_file($application_tmp_name, $application_target_file); // Upload application file
    } else {
        // If no new file uploaded, keep the existing file name
        $query = "SELECT course_application FROM `course` WHERE course_id = '$course_id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $application_name = $row['course_application'];
    }

    // Check if a new photo file was uploaded
    if ($photo_name) {
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_target_file = $target_dir . basename($photo_name);
        move_uploaded_file($photo_tmp_name, $photo_target_file); // Upload photo file
    } else {
        // If no new file uploaded, keep the existing file name
        $query = "SELECT course_profile FROM `course` WHERE course_id = '$course_id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $photo_name = $row['course_profile'];
    }

    // Update into the database
    $update_query = "UPDATE `course` SET 
                      `course_name` = '$course_name', 
                      `course_duration` = '$course_duration', 
                      `course_fees` = '$fees', 
                      `course_description` = '$description', 
                      `university` = '$university', 
                      `course_application` = '$application_name', 
                      `course_profile` = '$photo_name', 
                      `eligibility` = '$eligibility', 
                      `course_start_date` = '$start_date', 
                      `course_end_date` = '$end_date' 
                      WHERE `course_id` = '$course_id' AND `institute_id` = '$institute_id'";

    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Course updated successfully.'); window.location = 'index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
