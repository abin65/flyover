<?php
include '../config.php';
$internship_id = $_GET['id'];
$sqli = "update internship_application set apply_status='reject' where internship_apply_id='$internship_id'";
mysqli_query($con,$sqli);
echo"<script>alert('approve internship application');window.location='internship_report.php'</script>";
?>