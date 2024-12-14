<?php
session_start();
include 'header.php';
include '../config.php'; // Database connection file

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Check if the job ID is set in the URL
if (isset($_GET['id'])) {
    $job_id = $_GET['id'];

    // Fetch job details from the database
    $query = "SELECT * FROM `job` WHERE `job_id` = '$job_id'";
    $result = mysqli_query($con, $query);
    
    // Check if job exists
    if (mysqli_num_rows($result) > 0) {
        $job = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Job not found.'); window.location = 'jobs.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('No job ID provided.'); window.location = 'jobs.php';</script>";
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
                    <!-- Update Job Form -->
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="glass-form">
                                <form action="update_job_action.php?id=<?php echo $job_id; ?>" method="POST" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
                                    <div class="row">
                                        <!-- Left Side of the Form -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="job_name">Job Name</label>
                                                <input type="text" class="form-control" placeholder="Job Name" name="job_name" value="<?php echo htmlspecialchars($job['job_title']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Company</label>
                                                <input type="text" class="form-control" placeholder="Company" name="company" value="<?php echo htmlspecialchars($job['company_name']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="salary">Salary</label>
                                                <input type="number" class="form-control" placeholder="Salary" name="salary" value="<?php echo htmlspecialchars($job['salary']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" placeholder="Write a brief description here..." name="description" required><?php echo htmlspecialchars($job['description']); ?></textarea>
                                            </div>
                                        </div>

                                        <!-- Right Side of the Form -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="requirement">Requirement</label>
                                                <textarea class="form-control" placeholder="Write Requirement here..." name="requirement" required><?php echo htmlspecialchars($job['requirement']); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="post_date">Post Date</label>
                                                <input type="date" class="form-control" name="post_date" value="<?php echo htmlspecialchars($job['post_date']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date">End Date</label>
                                                <input type="date" class="form-control" name="end_date" value="<?php echo htmlspecialchars($job['expiry_date']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" class="form-control" placeholder="Location" name="location" value="<?php echo htmlspecialchars($job['location']); ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary px-4">Update Job</button>
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
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #fff;
    opacity: 0;
    animation: fadeIn 1s forwards;
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
    font-size: 18px;
  }

  .glass-form .form-control {
    background-color: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.5);
    color: black;
    margin: 0 auto;
    border-radius: 8px;
    padding: 2px 5px;
    height: 30px;
    backdrop-filter: blur(5px);
  }

  .glass-form .form-control::placeholder {
    color: gray;
  }

  .glass-form .btn-primary {
    background-color: gray;
    border: 1px solid rgba(255, 255, 255, 0.5);
    color: #fff;
    width: 200px;
    padding: 10px 20px;
  }

  .glass-form .btn-primary:hover {
    background-color: rgba(255, 255, 255, 0.5);
    color: blue;
  }

  /* Media Queries for Responsive Design */
  @media (max-width: 768px) {
    .glass-form {
      padding: 15px;
    }

    .glass-form .form-control {
      font-size: 12px;
      height: 30px;
    }

    .btn-primary {
      padding: 10px 20px;
    }
  }

  @media (max-width: 576px) {
    .glass-form {
      padding: 10px;
    }

    .glass-form .form-control {
      font-size: 10px;
      height: 28px;
    }

    .btn-primary {
      padding: 8px 15px;
    }
  }
</style>

</body>
</html>
