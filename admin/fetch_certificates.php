<?php
include '../config.php';

if (isset($_POST['user_reg_id'])) {
    $userId = $_POST['user_reg_id'];
    
    // Query to fetch certificates for the user
    $query = "SELECT * FROM user_registration WHERE user_reg_id = '$userId'";
    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {
        echo "<ul class='list-group'>";
        while ($row = $result->fetch_assoc()) {
            // Assuming 'certificate' stores the file name and it's stored in 'upload/' directory
            $certificateFilePath = '../upload/' . $row['certificate']; // Adjust the path if necessary
            echo "<li class='list-group-item'>";
            echo "<span>" . htmlspecialchars($row['certificate']) . "</span> "; // Display the certificate name
            
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
