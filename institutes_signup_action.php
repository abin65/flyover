<?php
include 'config.php';

$institute_name = $_POST['institute_name'];
$institute_phone = $_POST['institute_phone'];
$institute_email = $_POST['institute_email'];
$institute_country = $_POST['institute_country'];
$institute_address = $_POST['institute_address'];
$username = $_POST['username'];
$password = $_POST['password'];
$institute_description = $_POST['institute_description'];

// Handling documents upload
$documents = $_FILES["documents"];
$document_file_extension = pathinfo($documents["name"], PATHINFO_EXTENSION); // Get the file extension
$file_name1 = round(microtime(true) * 1000) . '.' . $document_file_extension; // Use the original extension
move_uploaded_file($documents["tmp_name"], 'upload/' . $file_name1);

// Handling institute photo upload
$institute_photo = $_FILES["institute_photo"];
$photo_file_extension = pathinfo($institute_photo["name"], PATHINFO_EXTENSION); // Get the file extension
$file_name2 = round(microtime(true) * 1000) . '.' . $photo_file_extension; // Use the original extension
move_uploaded_file($institute_photo["tmp_name"], 'upload/' . $file_name2);

// Insert login data
$sqli = "INSERT INTO `login`(`username`, `password`, `status`, `type`)
         VALUES ('$username','$password','0','institute')";
mysqli_query($con, $sqli);
$login_id = mysqli_insert_id($con);

// Insert institute registration data
$sql = "INSERT INTO `institute_reg`(`institute_name`, `institute_address`, `institute_email`, `institute_phone`, 
        `institute_photo`, `institute_country`, `description`, `document`, `login_id`) 
        VALUES ('$institute_name','$institute_address','$institute_email','$institute_phone','$file_name2',
        '$institute_country','$institute_description','$file_name1' ,'$login_id')";
mysqli_query($con, $sql);

// Alert the user and redirect
echo "<script> alert('Institute Registration Successfully'); window.location = 'index.php'</script>";
?>
