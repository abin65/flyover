<?php
session_start();
include '../config.php'; // Database connection file

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $program_name = mysqli_real_escape_string($con, $_POST['program_name']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $venue = mysqli_real_escape_string($con, $_POST['venue']);
    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
    $start_time = mysqli_real_escape_string($con, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($con, $_POST['end_time']);
    $institute_id = $_SESSION['login_id']; // Assuming the session contains the institute ID

    // Insert the program into the database
    $query = "INSERT INTO `program` (`program_name`, `department`, `start_date`, `end_date`, `description`, `venue`, `starting_time`, `institute_id`, `end_time`) 
              VALUES ('$program_name', '$department', '$start_date', '$end_date', '$description', '$venue', '$start_time', '$institute_id', '$end_time')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Program added successfully.'); window.location = 'index.php';</script>"; // Redirect to the program list page
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "<script>alert('Invalid request.'); window.location = 'add_program.php';</script>";
}
?>
