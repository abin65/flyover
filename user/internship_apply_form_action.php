<?php

session_start();
// Include database connection
include '../config.php';

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

$userId = $_SESSION['login_id']; // Get the current user ID from the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data
    $user_id = $userId; // Get the user_id from the session
    $internship_id = $_POST['internship_id']; // Assuming internship_id is sent from the form
    
    // Additional fields from the form
    $experience = $_POST['experience'];
    $languages = $_POST['language'];
    $skills = $_POST['skill'];

    // Set default apply status
    $apply_status = 'applied'; // Default apply status

    // Check if the user has already applied for this internship
    $check_query = "SELECT * FROM internship_application WHERE user_id = '$user_id' AND internship_id = '$internship_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If the user has already applied, show an error message
        echo "<script>alert('You have already applied for this internship.'); window.location = 'index.php';</script>";
        exit;
    }

    // Handle file uploads
    $upload_dir = "../upload/"; // Directory to store uploads

    // Internship application (if there are any files uploaded as part of the application)
    $internship_application = $_FILES['internship_application']['name'];
    $internship_application_tmp = $_FILES['internship_application']['tmp_name'];
    $internship_application_path = $upload_dir . basename($internship_application);
    move_uploaded_file($internship_application_tmp, $internship_application_path);

    // Fetch the institute_id from the internship table using internship_id
    $institute_query = "SELECT institute_id FROM internship WHERE internship_id = '$internship_id'";
    $result = mysqli_query($con, $institute_query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        $institute_id = $row['institute_id'];
    } else {
        echo "Error: Unable to find institute for the internship.";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO `internship_application`( `user_id`, `institute_id`, `internship_application`, `apply_status`, `experience`, `languages`, `skills`, `internship_id`) 
            VALUES ('$user_id', '$institute_id', '$internship_application', '$apply_status', '$experience', '$languages', '$skills', '$internship_id')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Internship application submitted successfully!'); window.location = 'index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close database connection
    mysqli_close($con);
}
?>
