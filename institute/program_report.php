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

$institute_id = $_SESSION['login_id']; // Get the current user ID from the session
?>

<body>
    <!-- Hero Section -->
    <div class="hero-wrap" style="background-image: url('../assets/images/bg_1.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <h1 class="mb-4">Program Application Report</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Program Application List Section -->
    <div class="container my-5 gray-bg">
        <div class="row justify-content-center">
            <table class="table table-bordered table-hover table-striped glass-table">
                <thead class="thead-dark">
                    <tr>
                        <th>Program Name</th>
                        <th>Institute Name</th>
                        <th>Apply Status</th>
                        <th>Created At</th>
                        <th>Approve</th>
                        <th>Reject</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP to fetch and display program applications from the database -->
                    <?php
                    // Fetch program applications
                    $query = "SELECT pa.*, p.program_name, i.institute_name
                                FROM program_application pa
                                JOIN program p ON pa.program_id = p.program_id
                                JOIN institute_reg i ON pa.institute_id = i.login_id
                                WHERE pa.institute_id = '$institute_id' AND pa.apply_status IN ('applied')";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['program_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['institute_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['apply_status']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo "<td><a href='program_report_approve_action.php?id=" . $row['program_id'] . "' class='btn btn-success'>Approve</a></td>";
                            // Reject button with href
                            echo "<td><a href='program_report_reject_action.php?id=" . $row['program_id'] . "' class='btn btn-danger'>Reject</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No Program Applications Found</td></tr>";
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
