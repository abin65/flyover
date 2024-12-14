<?php
include '../config.php';
$job_id = $_GET['id'];
$sqli = "update job_application set apply_status='reject' where job_apply_id='$job_id'";
mysqli_query($con,$sqli);
echo"<script>alert('reject job application');window.location='job_report.php'</script>";
?>