<?php
session_start();
include '../config.php'; // Include your database configuration

if (isset($_POST['faculty_id'])) {
    $faculty_id = $_POST['faculty_id'];
    
    // Query to fetch documents associated with the faculty
    $query = "SELECT * FROM faculty WHERE faculty_id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $faculty_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result->num_rows > 0) {
        echo "<ul class='list-group'>";
        while ($row = $result->fetch_assoc()) {
            // Assuming 'certificate' stores the file name and it's stored in 'upload/' directory
            $certificateFilePath = '../upload/' . $row['faculty_certificate']; // Adjust the path if necessary
            echo "<li class='list-group-item'>";
            echo "<span>" . htmlspecialchars($row['faculty_certificate']) . "</span> "; // Display the certificate name
            
            // Link to view the certificate
            
            
            // Link to download the certificate (ensure this button has the download attribute)
            echo "<a href='" . $certificateFilePath . "' download class='btn btn-success btn-sm ml-2'>Download</a>"; // Download button
            
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No certificates found.";
    }
} else {
    echo "Invalid request.";
}
?>
