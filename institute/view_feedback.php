<?php
session_start(); // Start the session to access session variables
include 'header.php';

// Assuming the logged-in user's institute ID is stored in a session variable
$current_institute_id = $_SESSION['login_id'] ?? null; // Use null coalescing operator for safety

// Ensure that the user is logged in
if (!$current_institute_id) {
    echo "<div class='alert alert-danger'>Please log in to view feedback.</div>";
    exit; // Stop script execution if not logged in
}
?>

<body>
    <!-- Hero Section -->
    <div class="hero-wrap" style="background-image: url('../assets/images/bg_1.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <h1 class="mb-4">View Feedback</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- User List Section -->
    <div class="container my-5 gray-bg">
        <div class="row justify-content-center">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Institute Photo</th>
                        <th>Institute Name</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Phone</th>
                        <th>User Address</th>
                        <th>User Country</th>
                        <th>Feedback</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP to fetch and display users from the database -->
                    <?php
                    include '../config.php';

                    // Use a prepared statement for better security
                    $stmt = $con->prepare("
                        SELECT r.institute_photo, r.institute_name, 
                               u.name, u.email, u.phone, 
                               u.address, u.nation, 
                               f.feedback, f.rating 
                        FROM institute_reg r 
                        INNER JOIN feedback f ON r.institute_reg_id = f.institute_id 
                        INNER JOIN user_registration u ON u.user_reg_id = f.user_id 
                        WHERE r.login_id = ?
                    ");
                    $stmt->bind_param("i", $current_institute_id); // Assuming login_id is an integer
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            // Institute Photo
                            echo "<td><img style='width:100px;height:100px' src='../upload/" . htmlspecialchars($row['institute_photo']) . "' alt='Institute Photo'></td>";
                            echo "<td>" . htmlspecialchars($row['institute_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nation']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['feedback']) . "</td>";
                            
                            // Display star rating
                            $rating = (int) $row['rating'];
                            echo "<td>";
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo "&#9733;"; // Full star
                                } else {
                                    echo "&#9734;"; // Empty star
                                }
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>No Feedback Found</td></tr>";
                    }

                    $stmt->close(); // Close the statement
                    $con->close(); // Close the database connection
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for displaying the full description -->
    <div class="modal fade" id="certificatesModal" tabindex="-1" role="dialog" aria-labelledby="certificatesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="certificatesModalLabel">Documents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="certificatesContent">
                        <!-- Certificates will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'footer.php';
    ?>

    <!-- Loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <!-- Include necessary JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <!-- Custom styles for the glass effect -->
    <style>
        /* Glass effect container */
        .glass-table {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Table styling */
        .table {
            background-color: rgba(200, 200, 200, 0.2);
            color: #000; /* Text color */
        }

        /* Table header background */
        .thead-dark th {
            background-color: #343a40;
            color: #fff;
        }
    </style>

</body>
</html>
