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

// Fetch courses added by the institute
$query = "SELECT * FROM `course` WHERE `institute_id` = '$institute_id'";
$result = mysqli_query($con, $query);

?>

<body>
    <!-- Hero Section -->
    <div class="hero-wrap hero-wrap-2" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Courses</span></p>
                    <h1 class="mb-3 bread">Courses</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each course and display it
                    // Loop through each course and display it
                    while ($row = mysqli_fetch_assoc($result)) {
                        $course_id = $row['course_id']; // Assuming the course has an id field
                        $course_name = $row['course_name'];
                        $course_description = $row['course_description'];
                        $course_fees = $row['course_fees'];
                        $course_image = $row['course_profile']; // Assuming this is the course image field
                        $course_category = "Category"; // Replace with actual category if available

                        echo '
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="course align-self-stretch">
                                <a href="#" class="img" style="background-image: url(../upload/' . $course_image . '); width: 350px; height: 250px; background-size: cover; background-position: center;"></a>
                                <div class="text p-4">
                                    <p><span class="price">Rs: ' . $course_fees . '</span></p>
                                    <h3 class="mb-3"><a href="#">' . $course_name . '</a></h3>
                                    <p>' . $course_description . '</p>
                                    <div class="d-flex justify-content-between">
                                        <a href="view_course_details.php?id=' . $course_id . '" class="btn btn-secondary">View Details</a>
                                        <a href="update_course.php?id=' . $course_id . '" class="btn btn-warning">Update</a>
                                        <a href="delete_course.php?id=' . $course_id . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this course?\');">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }

                } else {
                    echo "<p>No courses found for this institute.</p>";
                }
                ?>
            </div>
            
            <!-- Pagination (Optional, based on course count) -->
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
