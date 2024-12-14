<?php
include 'header.php';
?>
<body>
    <!-- Hero Section -->
    <div class="hero-wrap hero-wrap-2">
        <div class="overlay"></div>
        <div class="container" style="max-width: 1200px;">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-10 ftco-animate text-center">
                    <!-- Two-Sided Registration Form -->
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="glass-form">
                                <form action="add_job_action.php" method="POST" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
                                    <div class="row">
                                        <!-- Left Side of the Form -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Job -name">Job Name</label>
                                                <input type="text" class="form-control" placeholder="Job Name" name="job_name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Company</label>
                                                <input type="text" class="form-control" placeholder="Company" name="company" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="salary">Salary</label>
                                                <input type="number" class="form-control" placeholder="Salary" name="salary" required>
                                            </div>

                                           <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" class="form-control" placeholder="Write a brief description  here..." name="description" required></textarea>
                                            </div>

                                         
                                            
                                        </div>

                                        <!-- Right Side of the Form -->
                                        <div class="col-md-6">
                                           <div class="form-group">
                                                <label for="requirement">Requirement</label>
                                                <textarea type="text" class="form-control" placeholder="Write Requirement  here..." name="requirement" required></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="post date">post Date</label>
                                                <input type="date" class="form-control" placeholder="Post Date" name="post_date" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="end date">End Date</label>
                                                <input type="date" class="form-control" placeholder="End Date" name="end_date" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input type="text" class="form-control" placeholder="location" name="location" required>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary px-4">Add Job</button>
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
