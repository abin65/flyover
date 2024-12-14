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

// Fetch jobs added by the institute
$query = "SELECT * FROM `job` WHERE `institute_id` = '$institute_id'";
$result = mysqli_query($con, $query);

?>

<body>
    <!-- Hero Section -->
    <div class="hero-wrap hero-wrap-2" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Jobs</span></p>
                    <h1 class="mb-3 bread">Jobs</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Jobs Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each job and display it
                    while ($row = mysqli_fetch_assoc($result)) {
                        $job_id = $row['job_id']; // Job ID
                        $job_title = $row['job_title'];
                        $company_name = $row['company_name'];
                        $salary = $row['salary'];
                        $description = $row['description'];
                        $requirement = $row['requirement']; // Fetch the requirement
                        $location = $row['location'];
                        $post_date = $row['post_date'];
                        $expiry_date = $row['expiry_date'];

                        // Check if the job is expired
                        $is_expired = (strtotime($expiry_date) < time());

                        // Set CSS class based on expiry
                        $css_class = $is_expired ? 'expired' : '';

                        echo '
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="course align-self-stretch ' . $css_class . '">
                                <div class="text p-4">
                                    <p><span class="price">Salary: Rs: ' . $salary . '</span></p>
                                    <h3 class="mb-3"><a href="#">' . $job_title . '</a></h3>
                                    <p><strong>Company: </strong>' . $company_name . '</p>
                                    <p>' . $description . '</p>
                                    <p><strong>Requirements: </strong>' . $requirement . '</p> <!-- Display the requirement -->
                                    <p><strong>Location: </strong>' . $location . '</p>
                                    <p><strong>Post Date: </strong>' . $post_date . '</p>
                                    <p><strong>Expiry Date: </strong>' . $expiry_date . '</p>';

                        // Add message for expired jobs
                        if ($is_expired) {
                            echo '<p style="color: red; font-weight: bold;">This job is expired.</p>';
                        }

                        echo '
                                    <div class="d-flex justify-content-between">
                                        <a href="update_job.php?id=' . $job_id . '" class="btn btn-warning">Update</a>
                                        <a href="delete_job.php?id=' . $job_id . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this job?\');">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>No jobs found for this institute.</p>";
                }
                ?>
            </div>
            
            <!-- Pagination (Optional, based on job count) -->
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
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
<style>
    .expired {
        background-color: #f8d7da; /* Light red background */
        border: 1px solid #f5c6cb; /* Light red border */
        color: #721c24; /* Dark red text */
        padding: 15px;
        border-radius: 5px;
    }
</style>
