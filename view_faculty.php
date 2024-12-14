<?php

include 'header.php';
include 'config.php'; 


// Initialize search variables
$search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
$search_by = isset($_GET['search_by']) ? mysqli_real_escape_string($con, $_GET['search_by']) : 'faculty_name'; // Default to faculty name

// Build the query based on search input
$query = "SELECT f.*, ir.institute_name FROM faculty f LEFT JOIN institute_reg ir ON f.institute_id = ir.login_id";
$conditions = [];

// Add search conditions based on the selected search option
if (!empty($search)) {
    switch ($search_by) {
        case 'subject':
            $conditions[] = "f.subject LIKE '%$search%'";
            break;
        case 'position':
            $conditions[] = "f.position LIKE '%$search%'";
            break;
        case 'institute_name':
            $conditions[] = "ir.institute_name LIKE '%$search%'";
            break;
        default: // faculty_name
            $conditions[] = "f.faculty_name LIKE '%$search%'";
            break;
    }
}

// Append conditions to the query if any
if (count($conditions) > 0) {
    $query .= " WHERE " . implode(' OR ', $conditions);
}

// Execute the query
$result = mysqli_query($con, $query);
?>

<body>
    <!-- Hero Section for Faculty -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <h1 class="mb-4">View Faculty</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Form -->
    <div class="search-form mb-4">
        <form action="" method="GET">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="search" placeholder="Enter search term" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                </div>
                <div class="col">
                    <select class="form-control" name="search_by">
                        <option value="faculty_name" <?php echo $search_by === 'faculty_name' ? 'selected' : ''; ?>>Faculty Name</option>
                        <option value="subject" <?php echo $search_by === 'subject' ? 'selected' : ''; ?>>Subject</option>
                        <option value="position" <?php echo $search_by === 'position' ? 'selected' : ''; ?>>Position</option>
                        <option value="institute_name" <?php echo $search_by === 'institute_name' ? 'selected' : ''; ?>>Institute Name</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Faculty List Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="course align-self-stretch">
                                <a href="#" class="img faculty-photo" style="background-image: url(upload/' . htmlspecialchars($row['faculty_photo']) . ') ;width: 350px; height: 250px; background-size: cover; background-position: center;"></a>
                                <div class="text p-4">
                                    <p class="category"><span>' . htmlspecialchars($row['subject']) . '</span></p>
                                    <h3 class="mb-3"><a href="#">' . htmlspecialchars($row['faculty_name']) . '</a></h3>
                                    <p class="position"><strong>Position:</strong> ' . htmlspecialchars($row['position']) . '</p>
                                    <p class="email"><strong>Email:</strong> ' . htmlspecialchars($row['faculty_email']) . '</p>
                                    <p class="phone"><strong>Phone:</strong> ' . htmlspecialchars($row['faculty_phone']) . '</p>
                                    
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>No faculties found matching your search criteria.</p>";
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

    <!-- Additional Sections Here... -->

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

    <!-- JavaScript for handling the button click and AJAX request -->
    <script>
    $(document).ready(function() {
        $('.view-certificates').on('click', function() {
            const facultyId = $(this).data('id');
            $.ajax({
                url: 'fetch_faculty_document.php', // PHP file that will handle the document fetch
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
