<?php
include '../config.php';
$job_id = $_GET['id'];
$sqli = "update job_application set interview_status='reject' where job_apply_id='$job_id'";
mysqli_query($con,$sqli);
echo"<script>alert('reject interview application');window.location='approved_job_report.php'</script>";
?>