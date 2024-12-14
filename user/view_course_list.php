<?php
include 'header.php';
include '../config.php'; // Database connection file

// Initialize search term
$search_term = '';

// Check if the search form has been submitted
if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($con, $_POST['search_term']);
    // Fetch courses based on the search term (institute name) by joining the course and institute tables
    $query = "SELECT course.* FROM course 
              JOIN institute_reg ON course.institute_id = institute_reg.login_id 
              WHERE institute_reg.institute_name LIKE '%$search_term%'";
} else {
    // Fetch all courses if no search term is provided
    $query = "SELECT course.* FROM course 
              JOIN institute_reg ON course.institute_id = institute_reg.login_id";
}

$result = mysqli_query($con, $query);

// Debugging: Check for query errors
if (!$result) {
    die("Database query failed: " . mysqli_error($con));
}

?>

<body>
    <!-- Hero Section -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg'); background-attachment:fixed;">
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

    <!-- Search Bar -->
    <div class="container mt-4">
        <form method="POST" action="">
            <div class="input-group">
                <input type="text" name="search_term" class="form-control" placeholder="Search by institute name" value="<?php echo htmlspecialchars($search_term); ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="search">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Courses Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each course and display it
                    while ($row = mysqli_fetch_assoc($result)) {
                        $course_id = $row['course_id']; // Assuming the course has an id field
                        $course_name = $row['course_name'];
                        $course_description = $row['course_description'];
                        $course_fees = $row['course_fees'];
                        $course_image = $row['course_profile']; // Assuming this is the course image field

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
                                        <a href="course_apply_form.php?id=' . $course_id . '" class="btn btn-success">Enroll Now</a>
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
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg>
</div>

</body>
