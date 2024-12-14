<?php
include '../config.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $job_apply_id = $_POST['job_apply_id'];
    $scheduled_date = $_POST['scheduled_date'];

    // Update the scheduled date in the database
    $query = "UPDATE job_application SET scheduled_date = ? WHERE job_apply_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('si', $scheduled_date, $job_apply_id);

    if ($stmt->execute()) {
        echo "<script>alert('Scheduled date updated successfully!'); window.location = 'approved_job_report.php';</script>";
    } else {
        echo "<script>alert('Error updating the scheduled date.'); window.location = 'approved_job_report.php';</script>";
    }

    $stmt->close();
}

$con->close();
?>
