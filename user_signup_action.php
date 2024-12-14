<?php
include 'config.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$country = $_POST['country'];
$address = $_POST['address'];
$username = $_POST['username'];
$password = $_POST['password'];
$qualification = $_POST['qualification'];

// Handling certificate upload
$certificate = $_FILES["certificate"];
$certificate_file_extension = pathinfo($certificate["name"], PATHINFO_EXTENSION); // Get the file extension
$file_name1 = round(microtime(true) * 1000) . '.' . $certificate_file_extension; // Use the original extension
move_uploaded_file($certificate["tmp_name"], 'upload/' . $file_name1);

// Handling photo upload
$photo = $_FILES["photo"];
$photo_file_extension = pathinfo($photo["name"], PATHINFO_EXTENSION); // Get the file extension
$file_name2 = round(microtime(true) * 1000) . '.' . $photo_file_extension; // Use the original extension
move_uploaded_file($photo["tmp_name"], 'upload/' . $file_name2);

// Insert login data
$sqli = "INSERT INTO `login`(`username`, `password`, `status`, `type`)
         VALUES ('$username','$password','0','user')";
mysqli_query($con, $sqli);
$login_id = mysqli_insert_id($con);

// Insert user registration data
$sql = "INSERT INTO `user_registration`(`name`, `address`, `email`, `photo`, `certificate`, `qualification`, `nation`, `phone`, `login_id`) 
        VALUES ('$name','$address','$email','$file_name2','$file_name1','$qualification','$country','$phone','$login_id')";
mysqli_query($con, $sql);

// Alert the user and redirect
echo "<script> alert('User Registration Successfully'); window.location = 'index.php'</script>";
?>
