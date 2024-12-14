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
                    <h1 class="mb-4">Course Application Report</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Application List Section -->
    <div class="container my-5 gray-bg">
        <div class="row justify-content-center">
            <table class="table table-bordered table-hover table-striped glass-table">
                <thead class="thead-dark">
                    <tr>
                        <th>Profile</th>
                        <th>Course Name</th>
                        <th>+2 Certificate</th>
                        <th>10th Certificate</th>
                        <th>Adhar</th>
                        <th>Pan Card</th>
                        <th>Passport</th>
                        <th>Language</th>
                        <th>Institute</th>
                        <th>Institute Details</th>
                        <th>Application</th>
                        <th>Apply Status</th>
                        <th>Join Letter</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP to fetch and display course applications from the database -->
                    <?php
                    include '../config.php';
                    // Fetch course applications with pending approvals
                    $query = "SELECT ca.*, c.course_name,c.course_profile, i.institute_name,i.login_id, i.institute_address, i.institute_country 
                              FROM course_application ca
                              JOIN course c ON ca.course_id = c.course_id
                              JOIN institute_reg i ON ca.institute_id = i.login_id
                              WHERE ca.apply_status IN ('apply', 'approved')  and ca.user_id=$userId";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            // User profile photo
                            echo "<td><img style='width:100px;height:100px' src='../upload/" . htmlspecialchars($row['course_profile']) . "' alt='Profile Photo'></td>";
                            echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['+2_certificate']) . "' target='_blank'>View</a></td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['10th_certificate']) . "' target='_blank'>View</a></td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['adhar']) . "' target='_blank'>View</a></td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['pan_card']) . "' target='_blank'>View</a></td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['passport']) . "' target='_blank'>View</a></td>";
                            echo "<td>" . htmlspecialchars($row['language']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['institute_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['institute_address']) . ", " . htmlspecialchars($row['institute_country']) . "</td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['application']) . "' target='_blank'>View</a></td>";
                            echo "<td>" . htmlspecialchars($row['apply_status']) . "</td>";
                            echo "<td><a href='../upload/" . htmlspecialchars($row['join_letter']) . "' target='_blank'>View</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13' class='text-center'>No Applications Found</td></tr>";
                    }
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

    <script>
        // JavaScript for handling document view
        $(document).ready(function () {
            $('.view-certificates').on('click', function () {
                const userId = $(this).data('id');
                // Use AJAX to fetch documents based on user ID
                $.ajax({
                    url: 'fetch_document.php', // Your PHP file to fetch documents
                    type: 'POST',
                    data: { institute_reg_id: userId },
                    success: function (response) {
                        $('#certificatesContent').html(response);
                        $('#certificatesModal').modal('show'); // Show the modal
                    },
                    error: function () {
                        alert('Error loading documents.');
                    }
                });
            });
        });
    </script>

</body>
</html>
