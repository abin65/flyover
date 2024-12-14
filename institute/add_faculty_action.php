<?php
include '../config.php';

// Initialize variables and sanitize user input
$name = mysqli_real_escape_string($con, $_POST['name']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$country = mysqli_real_escape_string($con, $_POST['country']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$qualification = mysqli_real_escape_string($con, $_POST['qualification']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$position = mysqli_real_escape_string($con, $_POST['position']);

// Assuming the logged-in user's institute ID is stored in a session variable
session_start();
$login_id = $_SESSION['login_id']; // This should be set when the user logs in

// Validate input
if (empty($name) || empty($phone) || empty($email) || empty($country) || empty($address) || empty($qualification) || empty($login_id)) {
    echo "<script>alert('All fields are required.'); window.history.back();</script>";
    exit;
}

// Handling certificate upload
$certificate = $_FILES["certificate"];
if ($certificate['error'] === UPLOAD_ERR_OK) {
    $certificate_file_extension = pathinfo($certificate["name"], PATHINFO_EXTENSION);
    $file_name1 = round(microtime(true) * 1000) . '.' . $certificate_file_extension;
    move_uploaded_file($certificate["tmp_name"], '../upload/' . $file_name1);
} else {
    echo "<script>alert('Error uploading certificate.'); window.history.back();</script>";
    exit;
}

// Handling photo upload
$photo = $_FILES["photo"];
if ($photo['error'] === UPLOAD_ERR_OK) {
    $photo_file_extension = pathinfo($photo["name"], PATHINFO_EXTENSION);
    $file_name2 = round(microtime(true) * 1000) . '.' . $photo_file_extension;
    move_uploaded_file($photo["tmp_name"], '../upload/' . $file_name2);
} else {
    echo "<script>alert('Error uploading photo.'); window.history.back();</script>";
    exit;
}

$sql = "INSERT INTO `faculty`( `faculty_name`, `faculty_address`, `faculty_email`,
 `faculty_phone`, `faculty_country`, `faculty_photo`, `faculty_certificate`, `institute_id`, `qualification`, `subject`, `position`)

 VALUES ('$name','$address','$email','$phone','$country','$file_name2','$file_name1',
 '$login_id','$qualification','$subject','$position')";

mysqli_query($con, $sql);

// Alert the user and redirect
echo "<script> alert('add faculty Successfully'); window.location = 'index.php'</script>";
?>
