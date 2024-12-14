<?php
session_start();
include '../config.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

$userId = $_SESSION['login_id']; // Get the logged-in user's ID

// Get form data and sanitize inputs
$name = mysqli_real_escape_string($con, $_POST['name']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$country = mysqli_real_escape_string($con, $_POST['county']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

// Fetch current user data (to check existing files)
$query = "SELECT institute_photo, document FROM institute_reg WHERE login_id = '$userId'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Handle file uploads
$upload_dir = 'upload/';

// Process document upload
if (isset($_FILES['document']) && $_FILES['document']['error'] === 0) {
    $doc_extension = pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION);
    $doc_name = round(microtime(true) * 1000) . '.' . $doc_extension;
    move_uploaded_file($_FILES['document']['tmp_name'], $upload_dir . $doc_name);
} else {
    // Keep the existing document if no new file was uploaded
    $doc_name = $user['document'];
}

// Process photo upload
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
    $photo_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $photo_name = round(microtime(true) * 1000) . '.' . $photo_extension;
    move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $photo_name);
} else {
    // Keep the existing photo if no new file was uploaded
    $photo_name = $user['institute_photo'];
}

// If a new password is provided, hash it
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    // Update the login details (username and password)
    $login_update_query = "UPDATE login SET username = '$username', password = '$hashed_password' WHERE login_id = '$userId'";
    mysqli_query($con, $login_update_query);
} else {
    // Update only the username if no password is provided
    $login_update_query = "UPDATE login SET username = '$username' WHERE login_id = '$userId'";
    mysqli_query($con, $login_update_query);
}

// Update user registration data
$update_query = "
    UPDATE institute_reg SET
        institute_name = '$name',
        institute_address = '$address',
        institute_email = '$email',
        institute_phone = '$phone',
        institute_country = '$country',
        description = '$description',
        document = '$doc_name',
        institute_photo = '$photo_name'
    WHERE login_id = '$userId'";

// Execute the update query
if (mysqli_query($con, $update_query)) {
    echo "<script>alert('Profile updated successfully!'); window.location = 'index.php';</script>";
} else {
    echo "Error updating profile: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
