<?php
session_start();
include '../config.php'; 

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Please log in first.']);
    exit;
}

if (isset($_POST['faculty_id'])) {
    $faculty_id = mysqli_real_escape_string($con, $_POST['faculty_id']);
    
    // Delete the faculty member from the database
    $query = "DELETE FROM faculty WHERE faculty_id = '$faculty_id' AND institute_id = '{$_SESSION['login_id']}'";
    if (mysqli_query($con, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Faculty member deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error deleting faculty member.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid faculty ID.']);
}
?>
