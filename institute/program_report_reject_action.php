<?php
include '../config.php';
$program_id = $_GET['id'];
$sqli = "update program_application set apply_status='reject' where program_id='$program_id'";
mysqli_query($con,$sqli);
echo"<script>alert('approve program application');window.location='program_report.php'</script>";
?>