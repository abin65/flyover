<?php
include 'header.php';
?>

<body>
    <!-- Hero Section -->
    <div class="hero-wrap" style="background-image: url('../assets/images/bg_1.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <h1 class="mb-4">Course Detail</h1>
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
                        <th>Course</th>
                        <th>Fees</th>
                        <th>Duration</th>
                        <th>University</th>
                        <th>Eligibility</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>View application</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP to fetch and display courses from the database -->
                    <?php
                    include '../config.php';
                    // Fetch courses with pending approvals
                    $course_id = intval($_GET['id']);
                    $query = "SELECT * FROM course WHERE course_id = $course_id";
                              
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['course_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['course_fees']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['course_duration']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['university']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['eligibility']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['course_start_date']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['course_end_date']) . "</td>";
                            // View Details button
                            echo "<td><button class='btn btn-info view-details' data-id='" . $row['course_id'] . "'>View Application</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No Courses Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for displaying course details -->
    <div class="modal fade" id="courseDetailsModal" tabindex="-1" role="dialog" aria-labelledby="courseDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="courseDetailsModalLabel">Course Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="courseDetailsContent">
                        <!-- Course details will be loaded here -->
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

    <script>
        // JavaScript for handling course details view
        $(document).ready(function () {
            $('.view-details').on('click', function () {
                const course_id = $(this).data('id');
                // Use AJAX to fetch course details based on institute_reg_id
                $.ajax({
                    url: 'fetch_course_application.php', // Your PHP file to fetch course details
                    type: 'POST',
                    data: { course_id: course_id },
                    success: function (response) {
                        $('#courseDetailsContent').html(response);
                        $('#courseDetailsModal').modal('show'); // Show the modal
                    },
                    error: function () {
                        alert('Error loading course details.');
                    }
                });
            });
        });
    </script>

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
