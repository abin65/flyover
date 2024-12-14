<?php
include 'config.php';
session_start();

$Username = $_POST['username'];
$Password = $_POST['password'];

// Protect against SQL injection by using prepared statements
$str = "SELECT * FROM login WHERE username=? AND password=?";
$stmt = mysqli_prepare($con, $str);
mysqli_stmt_bind_param($stmt, "ss", $Username, $Password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($data = mysqli_fetch_array($result)) {
    $_SESSION['login_id'] = $data['login_id'];
    $_SESSION['username'] = $data['username'];

    if ($data['username'] == $Username && $data['password'] == $Password) {
        if ($data['type'] == "admin") { 
            // header("location: admin/index.php");
            echo "<script>alert('Successfuly Logid In.');window.location.href='admin/index.php';</script>";
            exit();
        } elseif ($data['type'] == "user" && $data['status'] == "approve") {
            // header("location: user/index.php");
            echo "<script>alert('Successfuly Logid In.');window.location.href='user/index.php';</script>";
            exit();
        } elseif ($data['type'] == "institute" && $data['status'] == "approve") {
            // header("location: institute/index.php");
            echo "<script>alert('Successfuly Logid In.');window.location.href='institute/index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Your account is not approved yet.');window.location.href='login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Invalid username or password.');window.location.href='login.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid username or password.');window.location.href='login.php';</script>";
    exit();
}
?> 
