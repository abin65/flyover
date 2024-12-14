<?php
include '../config.php';
$job_id = $_GET['id'];
$sqli = "update job_application set interview_status='pass' where job_apply_id='$job_id'";
mysqli_query($con,$sqli);
echo"<script>alert('approve interview application');window.location='approved_job_report.php'</script>";
?>