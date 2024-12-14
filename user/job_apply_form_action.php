<?php
session_start();
include '../config.php';

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

$userId = $_SESSION['login_id']; // Get the current user ID from the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data
    $user_id = $userId;
    $job_id = $_POST['job_id'];
    $language = $_POST['language'];
    $skill = $_POST['skill'];
    $experience = $_POST['experience'];
    
    // Set default apply status and interview status
    $apply_status = 'applied'; // Default apply status
    $interview_status = 'pending'; // Default interview status

    // Check if the user has already applied for this job
    $check_query = "SELECT * FROM job_application WHERE user_id = '$user_id' AND job_id = '$job_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If the user has already applied, show an error message
        echo "<script>alert('You have already applied for this job.'); window.location = 'index.php';</script>";
        exit;
    }

    // Set the upload directory
    $upload_dir = "../upload/";

    // Handle file uploads
    // +2 Certificate
    $plus_two_certificate = $_FILES['+2_certificate']['name'];
    $plus_two_certificate_tmp = $_FILES['+2_certificate']['tmp_name'];
    $plus_two_certificate_path = $upload_dir . basename($plus_two_certificate);
    move_uploaded_file($plus_two_certificate_tmp, $plus_two_certificate_path);

    // 10th Certificate
    $tenth_certificate = $_FILES['10th_certificate']['name'];
    $tenth_certificate_tmp = $_FILES['10th_certificate']['tmp_name'];
    $tenth_certificate_path = $upload_dir . basename($tenth_certificate);
    move_uploaded_file($tenth_certificate_tmp, $tenth_certificate_path);

    // Experience Certificate
    $experience_certificate = $_FILES['Experience_certificate']['name'];
    $experience_certificate_tmp = $_FILES['Experience_certificate']['tmp_name'];
    $experience_certificate_path = $upload_dir . basename($experience_certificate);
    move_uploaded_file($experience_certificate_tmp, $experience_certificate_path);

    // Fetch the institute_id from the job table using job_id
    $institute_query = "SELECT institute_id FROM job WHERE job_id = '$job_id'";
    $result = mysqli_query($con, $institute_query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        $institute_id = $row['institute_id'];
    } else {
        echo "Error: Unable to find institute for the job.";
        exit;
    }

    // Insert the data into job_application table
    $sql = "INSERT INTO `job_application` (`user_id`, `institute_id`, `job_id`, `+2_certificate`, `10th_certificate`, `experience_certificate`, `language`, `apply_status`, `interview_status`) 
            VALUES ('$user_id', '$institute_id', '$job_id', '$plus_two_certificate', '$tenth_certificate', '$experience_certificate', '$language', '$apply_status', '$interview_status')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Job application submitted successfully!'); window.location = 'index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
