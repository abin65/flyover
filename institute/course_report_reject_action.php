<?php
include '../config.php';
$course_id = $_GET['id'];
$sqli = "update course_application set apply_status='reject' where course_apply_id='$course_id'";
mysqli_query($con,$sqli);
echo"<script>alert('reject course application');window.location='course_report.php'</script>";
?>