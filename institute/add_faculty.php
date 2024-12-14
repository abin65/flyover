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
                                <form action="add_faculty_action.php" method="POST" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
                                    <div class="row">
                                        <!-- Left Side of the Form -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first-name">Name</label>
                                                <input type="text" class="form-control" placeholder="Name" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" placeholder="Address" name="address" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="position">Position</label>
                                                <input type="text" class="form-control" placeholder="Faculty Position" name="position" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                                            </div>
                                            
                                        </div>

                                        <!-- Right Side of the Form -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="tel" class="form-control" placeholder="Phone Number" name="phone" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select class="form-control" name="country" required>
                                                    <option value="" disabled selected>Select your country</option>
                                                    <option value="USA">United States</option>
                                                    <option value="CAN">Canada</option>
                                                    <option value="GBR">United Kingdom</option>
                                                    <option value="AUS">Australia</option>
                                                    <option value="IND">India</option>
                                                    <option value="DEU">Germany</option>
                                                    <option value="FRA">France</option>
                                                    <option value="ITA">Italy</option>
                                                    <option value="ESP">Spain</option>
                                                    <option value="MEX">Mexico</option>
                                                    <option value="BRA">Brazil</option>
                                                    <!-- Add more countries as needed -->
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="city">Qualification</label>
                                                <input type="text" class="form-control" placeholder="Qualification" name="qualification" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="photo">Certificate</label>
                                                <input type="file" class="form-control" name="certificate" accept="image/*" required> <!-- Photo upload field -->
                                            </div>
                                            <div class="form-group">
                                                <label for="photo">Profile Photo</label>
                                                <input type="file" class="form-control" name="photo" accept="image/*" required> <!-- Photo upload field -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary px-4">Register</button>
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
