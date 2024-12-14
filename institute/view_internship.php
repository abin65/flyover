<?php
session_start();
include 'header.php';
include '../config.php'; // Database connection file

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Get the institute ID from the session
$institute_id = $_SESSION['login_id'];

// Fetch internships added by the institute
$query = "SELECT * FROM `internship` WHERE `institute_id` = '$institute_id'";
$result = mysqli_query($con, $query);
?>

<body>
    <!-- Hero Section -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Internships</span></p>
                    <h1 class="mb-3 bread">Internships</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Internships Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each internship and display it
                    while ($row = mysqli_fetch_assoc($result)) {
                        $internship_id = $row['internship_id']; // Assuming the internship has an id field
                        $internship_title = $row['internship_title'];
                        $company_name = $row['company_name'];
                        $location = $row['location'];
                        $stipend = $row['stipend'];
                        $description = $row['description'];
                        $requirement = $row['requirement']; // Application requirements
                        $post_date = $row['post_date']; // Posting date
                        $expiry_date = $row['expiry_date']; // Expiry date
                        $duration = $row['duration']; // Duration of the internship
                        $application = $row['application']; // Assuming this is the application file field

                        // Check if the internship has expired
                        $is_expired = (strtotime($expiry_date) < time()); // Compare expiry date with current time

                        echo '
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="course align-self-stretch">
                                <div class="text p-4">';
                                
                        // Display expired message in red if applicable
                        if ($is_expired) {
                            echo '<p style="color: red; font-weight: bold;">This internship has expired.</p>';
                        }

                        echo '
                                    <p><span class="price">Stipend: Rs: ' . $stipend . '</span></p>
                                    <h3 class="mb-3"><a href="#">' . $internship_title . '</a></h3>
                                    <p><strong>Company:</strong> ' . $company_name . '</p>
                                    <p><strong>Location:</strong> ' . $location . '</p>
                                    <p><strong>Description:</strong> ' . $description . '</p>
                                    <p><strong>Requirements:</strong> ' . $requirement . '</p>
                                    <p><strong>Posted On:</strong> ' . date("F j, Y", strtotime($post_date)) . '</p>
                                    <p><strong>Expiry Date:</strong> ' . date("F j, Y", strtotime($expiry_date)) . '</p>
                                    <p><strong>Duration:</strong> ' . $duration . '</p>
                                    <div class="d-flex justify-content-between">
                                        <a href="../upload/' . $application . '" class="btn btn-secondary" target="_blank">View Application</a>
                                        <a href="delete_internship.php?id=' . $internship_id . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this internship?\');">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>No internships found for this institute.</p>";
                }
                ?>
            </div>

            <!-- Pagination (Optional, based on internship count) -->
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

<?php
include 'footer.php';
?>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
    </svg>
</div>

<!-- Include necessary JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
