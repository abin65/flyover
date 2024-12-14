<?php
session_start();
include 'header.php';
include '../config.php'; 

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

$institute_id = $_SESSION['login_id']; // Get the logged-in user's ID
?>

<body>
    <!-- Hero Section for Faculty -->
    <div class="hero-wrap hero-wrap-2" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <h1 class="mb-4">View Faculty</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Faculty List Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <!-- PHP code to fetch faculties from the database for the specific institute -->
                <?php
                $query = "SELECT * FROM faculty WHERE institute_id = '$institute_id'";
                $result = mysqli_query($con, $query);

                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="course align-self-stretch">
                                <a href="#" class="img faculty-photo" style="background-image: url(../upload/' . htmlspecialchars($row['faculty_photo']) . ');"></a>
                                <div class="text p-4">
                                    <p class="category"><span>' . htmlspecialchars($row['subject']) . '</span></p>
                                    <h3 class="mb-3"><a href="#">' . htmlspecialchars($row['faculty_name']) . '</a></h3>
                                    <p class="position"><strong>Position:</strong> ' . htmlspecialchars($row['position']) . '</p>
                                    <p class="email"><strong>Email:</strong> ' . htmlspecialchars($row['faculty_email']) . '</p>
                                    <p class="phone"><strong>Phone:</strong> ' . htmlspecialchars($row['faculty_phone']) . '</p>
                                    <button class="btn btn-info view-certificates" data-id="' . htmlspecialchars($row['faculty_id']) . '">View Documents</button>
                                    <button class="btn btn-danger delete-faculty" data-id="' . htmlspecialchars($row['faculty_id']) . '">Delete</button> <!-- Delete button -->
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>No Faculties Found for this Institute</p>";
                }
                ?>
            </div>

            <!-- Pagination (if needed) -->
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2>Subscribe to our Newsletter</h2>
                        <p>Stay updated with the latest faculties and courses.</p>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- JavaScript for handling the button click and AJAX requests -->
    <script>
    $(document).ready(function() {
        $('.view-certificates').on('click', function() {
            const facultyId = $(this).data('id');
            $.ajax({
                url: 'fetch_document.php', // PHP file that will handle the document fetch
                type: 'POST',
                data: { faculty_id: facultyId },
                success: function(response) {
                    $('#certificate-container').html(response);
                    $('#certificate-modal').modal('show'); // Show the modal
                },
                error: function(xhr) {
                    console.error(xhr.responseText); // Log error for debugging
                    alert('An error occurred while fetching documents.');
                }
            });
        });

        // Handle delete faculty button click
        $('.delete-faculty').on('click', function() {
            const facultyId = $(this).data('id');
            if (confirm('Are you sure you want to delete this faculty member?')) {
                $.ajax({
                    url: 'delete_faculty.php', // PHP file that will handle the deletion
                    type: 'POST',
                    data: { faculty_id: facultyId },
                    success: function(response) {
                        const result = JSON.parse(response);
                        alert(result.message);
                        if (result.status === 'success') {
                            location.reload(); // Reload the page to reflect changes
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText); // Log error for debugging
                        alert('An error occurred while deleting the faculty member.');
                    }
                });
            }
        });
    });
    </script>

    <!-- Document Modal -->
    <div class="modal fade" id="certificate-modal" tabindex="-1" role="dialog" aria-labelledby="certificateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="certificateModalLabel">Documents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="certificate-container">
                    <!-- Document content will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        .course .text p {
            margin-top: 20px; /* Adjust this value to control spacing */
        }

        .course .text h3 {
            margin-top: 10px; /* Adjust if you want more space above the headings */
        }

        /* Increase width of the faculty photo */
        .faculty-photo {
            height: 300px; /* Adjust height */
            width: 100%; /* Full width */
            background-size: cover;
            background-position: center center;
        }

        /* Additional styling for position, email, and phone */
        .position, .email, .phone {
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</body>

</html>
