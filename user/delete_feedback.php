<?php
include '../config.php'; // Include database connection

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Check if feedback_id is provided
if (isset($_POST['feedback_id'])) {
    $feedback_id = $_POST['feedback_id'];
    
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM feedabck WHERE feedback_id = ?");
    $stmt->bind_param("i", $feedback_id);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Feedback deleted successfully.'); window.location = 'view_feedback.php';</script>";
    } else {
        echo "<script>alert('Error deleting feedback. Please try again.'); window.location = 'view_feedback.php';</script>";
    }

    $stmt->close(); // Close the statement
} else {
    echo "<script>alert('No feedback ID provided.'); window.location = 'view_feedback.php';</script>";
}

$con->close(); // Close the database connection
?>
