<?php
session_start();
include '../config.php';

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

$userId = $_SESSION['login_id']; // Get the current user ID from the session

// Fetch the current user data (including photo and certificate)
$query = "SELECT photo, certificate FROM user_registration WHERE login_id = '$userId'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Get form data
$name = mysqli_real_escape_string($con, $_POST['name']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$country = mysqli_real_escape_string($con, $_POST['nation']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$qualification = mysqli_real_escape_string($con, $_POST['qualification']);

// Handle certificate upload
$certificate = $_FILES["certificate"];
if ($certificate['error'] == 0) {
    $certificate_file_extension = pathinfo($certificate["name"], PATHINFO_EXTENSION); // Get the file extension
    $file_name1 = round(microtime(true) * 1000) . '.' . $certificate_file_extension; // Use the original extension
    move_uploaded_file($certificate["tmp_name"], 'upload/' . $file_name1);
} else {
    // No new file uploaded, keep the existing certificate
    $file_name1 = $user['certificate'];
}

// Handle photo upload
$photo = $_FILES["photo"];
if ($photo['error'] == 0) {
    $photo_file_extension = pathinfo($photo["name"], PATHINFO_EXTENSION); // Get the file extension
    $file_name2 = round(microtime(true) * 1000) . '.' . $photo_file_extension; // Use the original extension
    move_uploaded_file($photo["tmp_name"], 'upload/' . $file_name2);
} else {
    // No new file uploaded, keep the existing photo
    $file_name2 = $user['photo'];
}

// If a password is provided, hash it for security
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $password_sql = "UPDATE login SET password='$hashed_password' and username ='$username' WHERE login_id = '$userId'";
    mysqli_query($con, $password_sql);
}

// Update user registration data
$update_query = "UPDATE `user_registration` SET 
    `name` = '$name',
    `address` = '$address',
    `email` = '$email',
    `phone` = '$phone',
    `nation` = '$country',
    `qualification` = '$qualification',
    `certificate` = '$file_name1',
    `photo` = '$file_name2'
    WHERE `login_id` = '$userId'";

// Execute the update query
if (mysqli_query($con, $update_query)) {
    echo "<script>alert('Profile updated successfully!'); window.location = 'index.php';</script>";
} else {
    echo "Error updating profile: " . mysqli_error($con);
}

mysqli_close($con);
?>
