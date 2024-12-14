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
                    <h1 class="mb-4">Approved Users List</h1>
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
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Country</th>
                        <th>Qualification</th>
                        <th>Certificates</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP to fetch and display users from the database -->
                    <?php
                    include '../config.php';
                    // Fetch users with pending approvals
                    $query = "SELECT * FROM user_registration r JOIN login l ON r.login_id = l.login_id WHERE l.status ='approve'";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img style='width:100px;height:100px' src='../upload/" . htmlspecialchars($row['photo']) . "' alt='User Photo'></td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nation']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['qualification']) . "</td>";
                            echo "<td><button class='btn btn-info view-certificates' data-id='" . $row['user_reg_id'] . "'>View Certificates</button></td>";
                            // Approve button with href
                          
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>No Users Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for displaying certificates -->
    <div class="modal fade" id="certificatesModal" tabindex="-1" role="dialog" aria-labelledby="certificatesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="certificatesModalLabel">Certificates</h5>
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
        // JavaScript for handling certificate view
        $(document).ready(function () {
            $('.view-certificates').on('click', function () {
                const userId = $(this).data('id');
                // Use AJAX to fetch certificates based on user ID
                $.ajax({
                    url: 'fetch_certificates.php', // Your PHP file to fetch certificates
                    type: 'POST',
                    data: { user_reg_id: userId },
                    success: function (response) {
                        $('#certificatesContent').html(response);
                        $('#certificatesModal').modal('show'); // Show the modal
                    },
                    error: function () {
                        alert('Error loading certificates.');
                    }
                });
            });
        });
    </script>

</body>
</html>
