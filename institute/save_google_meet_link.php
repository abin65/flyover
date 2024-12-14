<?php
session_start();
include '../config.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

if (isset($_POST['job_apply_id']) && isset($_POST['google_meet_link'])) {
    $jobApplyId = $_POST['job_apply_id'];
    $googleMeetLink = $_POST['google_meet_link'];

    // Update the job application with the Google Meet link
    $query = "UPDATE job_application SET link = '$googleMeetLink' WHERE job_apply_id = '$jobApplyId'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Google Meet link saved successfully.'); window.location = 'approved_job_report.php';</script>";
    } else {
        echo "<script>alert('Error saving Google Meet link.'); window.location = 'approved_job_report.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location = 'approved_job_report.php';</script>";
}
?>
