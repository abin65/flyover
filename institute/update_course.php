<?php
include 'header.php';
include '../config.php'; // Include your database connection file

// Fetching course data
if (isset($_GET['id'])) {
    $course_id = $_GET['id'];
    $query = "SELECT * FROM course WHERE course_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();

    // Check if course exists
    if (!$course) {
        echo "<p>Course not found.</p>";
        exit;
    }
} else {
    echo "<p>No course ID provided.</p>";
    exit;
}
?>

<body>
    <!-- Hero Section -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container" style="max-width: 1200px;">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-10 ftco-animate text-center">
                    <!-- Two-Sided Registration Form -->
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="glass-form">
                                <form action="update_course_action.php" method="POST" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
                                    <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>"> <!-- Hidden field for course ID -->
                                    <div class="row">
                                        <!-- Left Side of the Form -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="course-name">Course Name</label>
                                                <input type="text" class="form-control" placeholder="Course Name" name="course_name" value="<?php echo htmlspecialchars($course['course_name']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="course-duration">Course Duration</label>
                                                <input type="text" class="form-control" placeholder="Course Duration" name="course_duration" value="<?php echo htmlspecialchars($course['course_duration']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Fees">Fees</label>
                                                <input type="number" class="form-control" placeholder="Fees" name="fees" value="<?php echo htmlspecialchars($course['course_fees']); ?>" required>
                                            </div>

                                           <div class="form-group">
                                                <label for="city">Description</label>
                                                <textarea class="form-control" placeholder="Write a brief description here..." name="description" required><?php echo htmlspecialchars($course['course_description']); ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="university">University</label>
                                                <input type="text" class="form-control" placeholder="University" name="university" value="<?php echo htmlspecialchars($course['university']); ?>" required>
                                            </div>
                                        </div>

                                        <!-- Right Side of the Form -->
                                        <div class="col-md-6">
                                           <div class="form-group">
                                                <label for="eligibility">Eligibility</label>
                                                <textarea class="form-control" placeholder="Write Eligibility here..." name="eligibility" required><?php echo htmlspecialchars($course['eligibility']); ?></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="start_date">Start Date</label>
                                                <input type="date" class="form-control" placeholder="Start Date" name="start_date" value="<?php echo $course['course_start_date']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="end_date">End Date</label>
                                                <input type="date" class="form-control" placeholder="End Date" name="end_date" value="<?php echo $course['course_end_date']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="application">Application</label>
                                                <input type="file" class="form-control" name="application" accept="image/*"> <!-- Optional file upload -->
                                            </div>
                                            <div class="form-group">
                                                <label for="photo">Profile Photo</label>
                                                <input type="file" class="form-control" name="photo" accept="image/*"> <!-- Optional file upload -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary px-4">Update Course</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include 'footer.php';
?>

<!-- Glass effect loader -->
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

<!-- Custom CSS for Glass Effect and Form Layout -->
<style>
  /* Glass Effect Registration Form */
  .glass-form {
    background: rgba(255, 255, 255, 0.2); /* Slight white with transparency */
    border-radius: 20px;
    padding: 20px; /* Reduced padding */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px); /* Frosted glass effect */
    border: 1px solid rgba(255, 255, 255, 0.3); /* Slight border to enhance glass look */
    color: #fff; /* Text color for contrast */
    opacity: 0; /* Initial opacity for animation */
    animation: fadeIn 1s forwards; /* Fade-in animation */
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  .glass-form h2 {
    color: #fff;
    font-size: 18px; /* Reduced font size */
  }

  .glass-form .form-control {
    background-color: rgba(255, 255, 255, 0.1); /* Slightly more transparent for glass effect */
    border: 1px solid rgba(255, 255, 255, 0.5); /* Slight border */
    color: black; /* Text color */
    margin: 0 auto; /* Center the inputs */
    border-radius: 8px; /* Rounded corners for the input fields */
    padding: 2px 5px; /* Reduced padding for smaller height */
    height: 30px; /* Adjusted input field height */
    backdrop-filter: blur(5px); /* Frosted glass effect for inputs */
  }

  .glass-form .form-control::placeholder {
    color: gray; /* Placeholder color */
  }

  .glass-form .btn-primary {
    background-color: gray;
    border: 1px solid rgba(255, 255, 255, 0.5);
    color: #fff;
    width: 200px;
    padding: 10px 20px; /* Increased padding for button */
  }

  .glass-form .btn-primary:hover {
    background-color: rgba(255, 255, 255, 0.5);
    color: blue;
  }

  /* Media Queries for Responsive Design */
  @media (max-width: 768px) {
    .glass-form {
      padding: 15px; /* Adjusted padding on smaller screens */
    }

    .glass-form .form-control {
      font-size: 12px; /* Reduce font size on smaller screens */
      height: 30px; /* Further reduce input field height */
    }

    .btn-primary {
      padding: 10px 20px; /* Adjust button size on smaller screens */
    }
  }

  @media (max-width: 576px) {
    .glass-form {
      padding: 10px; /* Further adjusted padding on very small screens */
    }

    .glass-form .form-control {
      font-size: 10px; /* Further reduce font size on very small screens */
      height: 28px; /* Further reduce input field height */
    }

    .btn-primary {
      padding: 8px 15px; /* Further adjust button size */
    }
  }
</style>

</body>
</html>
