<?php
include '../config.php';
$log_id = $_GET['id'];
$sqli = "update login set status='approve' where login_id='$log_id'";
mysqli_query($con,$sqli);
echo"<script>alert('approve institute sucessfully');window.location='view_new_institutes.php'</script>";
?>