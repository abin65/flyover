<?php
include '../config.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

$userId = $_SESSION['login_id']; // Get the current user ID from the session

$feedback = $_POST['feedback']; 
$rating = $_POST['rating'];
$institute_id = $_POST['institute_id'];

// Prepare the SQL statement to fetch user_reg_id
$sqli = "SELECT user_reg_id FROM user_registration WHERE login_id = ?";
$stmt = $con->prepare($sqli);
$stmt->bind_param("i", $userId); // Assuming login_id is an integer
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists and fetch the user_reg_id
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_reg_id = $row['user_reg_id'];

    // Insert feedback data into the database
    $sql = "INSERT INTO `feedabck` (`user_id`, `feedback`, `rating`, `institute_id`) 
            VALUES (?, ?, ?, ?)";
    $insert_stmt = $con->prepare($sql);
    $insert_stmt->bind_param("issi", $user_reg_id, $feedback, $rating, $institute_id); // "issi" means integer, string, string, integer
    $insert_stmt->execute();

    // Check for successful insertion
    if ($insert_stmt->affected_rows > 0) {
        echo "<script>alert('Feedback Added Successfully'); window.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Error adding feedback.'); window.location = 'index.php';</script>";
    }
} else {
    echo "<script>alert('User not found.'); window.location = 'index.php';</script>";
}

// Close the statements and connection
$stmt->close();
$insert_stmt->close();
$con->close(); // Close the database connection
?>
