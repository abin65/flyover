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
                    <h1 class="mb-4">Job Application Report</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Application List Section -->
    <div class="container my-5 gray-bg">
        <div class="row justify-content-center">
            <table class="table table-bordered table-hover table-striped glass-table">
                <thead class="thead-dark">
                    <tr>
                        
                        <th>Job Name</th>
                        <th>+2 Certificate</th>
                        <th>10th Certificate</th>
                        <th>Experience Certificate</th>
                        <th>Language</th>
                        <th>Link</th>
                        <th>Apply Status</th>
                        <th>Interview Status</th>
                        <th>Scheduled Date</th>
                        <th>Approve</th>
                        <th>Reject</th>


                    </tr>
                </thead>
                <tbody>
                    <!-- PHP to fetch and display job applications from the database -->
                    <?php
                    include '../config.php';
                    // Fetch job applications
                    $query = "SELECT ja.*, j.job_title, ja.interview_status, ja.apply_status
                                FROM job_application ja
                                JOIN job j ON ja.job_id = j.job_id
                                WHERE ja.apply_status IN ('applied')  AND ja.interview_status = 'pending' and ja.institute_id='$userId' ;
                                ";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            // User profile (Assuming profile is part of user or job application table)
                          
                            echo "<td>" . htmlspecialchars($row['job_title']) . "</td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['+2_certificate']) . "' target='_blank'>View</a></td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['10th_certificate']) . "' target='_blank'>View</a></td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['experience_certificate']) . "' target='_blank'>View</a></td>";
                            echo "<td>" . htmlspecialchars($row['language']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['interview_status']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['apply_status']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['interview_status']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['scheduled_date']) . "</td>";
                            echo "<td><a href='job_report_approve_action.php?id=" . $row['job_apply_id'] . "' class='btn btn-success'>Approve</a></td>";
                            // Reject button with href
                            echo "<td><a href='job_report_reject_action.php?id=" . $row['job_apply_id'] . "' class='btn btn-danger'>Reject</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12' class='text-center'>No Job Applications Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
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

</body>
</html>
