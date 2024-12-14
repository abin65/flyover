<?php
session_start();
include 'header.php';

// Include database connection
include '../config.php';

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

$userId = $_SESSION['login_id']; // Get the current user ID from the session
?>

<body>
    <!-- Hero Section -->
    <div class="hero-wrap" style="background-image: url('../assets/images/bg_1.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <h1 class="mb-4">Internship Application Report</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Internship Application List Section -->
    <div class="container my-5 gray-bg">
        <div class="row justify-content-center">
            <table class="table table-bordered table-hover table-striped glass-table">
                <thead class="thead-dark">
                    <tr>
                        <th>Internship Name</th>
                        <th>Experience</th>
                        <th>Languages</th>
                        <th>Skills</th>
                        <th>Apply Status</th>
                        <th>Application</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP to fetch and display internship applications from the database -->
                    <?php
                    // Fetch internship applications
                    $query = "SELECT ia.*, i.internship_title 
                                FROM internship_application ia
                                JOIN internship i ON ia.internship_id = i.internship_id
                                WHERE ia.user_id = '$userId' and ia.apply_status IN ('applied', 'approved') ";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['internship_title']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['experience']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['languages']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['skills']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['apply_status']) . "</td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['internship_application']) . "' target='_blank'>View</a></td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No Internship Applications Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'footer.php'; ?>

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

</body>
</html>
