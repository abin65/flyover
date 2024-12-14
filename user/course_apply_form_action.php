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
    $user_id = $userId;
    $course_id = $_POST['course_id'];
    $language = $_POST['language'];

    // Check if the user has already applied for this course
    $check_query = "SELECT * FROM course_application WHERE user_id = '$user_id' AND course_id = '$course_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If the user has already applied, show an error message
        echo "<script>alert('You have already applied for this course.'); window.location = 'index.php';</script>";
        exit;
    }

    // Handle file uploads
    $upload_dir = "../upload/";

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

    // Adhar
    $adhar = $_FILES['adhar']['name'];
    $adhar_tmp = $_FILES['adhar']['tmp_name'];
    $adhar_path = $upload_dir . basename($adhar);
    move_uploaded_file($adhar_tmp, $adhar_path);

    // Pan Card
    $pan_card = $_FILES['pan_card']['name'];
    $pan_card_tmp = $_FILES['pan_card']['tmp_name'];
    $pan_card_path = $upload_dir . basename($pan_card);
    move_uploaded_file($pan_card_tmp, $pan_card_path);

    // Passport
    $passport = $_FILES['passport']['name'];
    $passport_tmp = $_FILES['passport']['tmp_name'];
    $passport_path = $upload_dir . basename($passport);
    move_uploaded_file($passport_tmp, $passport_path);

    // Application
    $application = $_FILES['application']['name'];
    $application_tmp = $_FILES['application']['tmp_name'];
    $application_path = $upload_dir . basename($application);
    move_uploaded_file($application_tmp, $application_path);

    // Set default apply status
    $apply_status = 'apply'; 

    // Fetch the institute_id from the course table using course_id
    $institute_id_query = "SELECT institute_id FROM course WHERE course_id = '$course_id'";
    $result = mysqli_query($con, $institute_id_query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        $institute_id = $row['institute_id'];
    } else {
        echo "Error: Unable to find institute for the course.";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO `course_application`( `user_id`, `course_id`, `+2_certificate`, `10th_certificate`, `adhar`, `pan_card`, `passport`, `application`, `apply_status`, `institute_id`, `language`, `join_letter`, `created_at`) 
            VALUES ('$user_id', '$course_id', '$plus_two_certificate', '$tenth_certificate', '$adhar', '$pan_card', '$passport', '$application', '$apply_status', '$institute_id', '$language', NULL, NOW())";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Application submitted successfully!'); window.location = 'index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close database connection
    mysqli_close($con);
}
?>
