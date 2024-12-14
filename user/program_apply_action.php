<?php
session_start();
include '../config.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

$userId = $_SESSION['login_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $program_id = $_POST['program_id'];

    // Check if the user has already applied for the same program
    $check_query = "SELECT * FROM program_application WHERE user_id = '$userId' AND program_id = '$program_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If the user has already applied, show an error message
        echo "<script>alert('You have already applied for this program.'); window.location = 'index.php';</script>";
        exit;
    }

    // Fetch institute_id based on program_id
    $query = "SELECT institute_id FROM program WHERE program_id = '$program_id'";
    $result = mysqli_query($con, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $institute_id = $row['institute_id'];

        // Set default apply status
        $apply_status = 'applied';

        // Insert the program application into the database
        $sql = "INSERT INTO `program_application` (`user_id`, `institute_id`, `program_id`, `apply_status`, `created_at`) 
                VALUES ('$userId', '$institute_id', '$program_id', '$apply_status', NOW())";
        
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('You have successfully applied for this program.'); window.location = 'index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Error: Program or institute not found.";
    }
}
?>
