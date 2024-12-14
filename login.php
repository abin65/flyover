<?php
include 'header.php';
?>
  <body>
    <!-- Hero Section -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <!-- Login Form -->
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="glass-form">
                  <form action="login_action.php" method="POST">
                    <h2 class="text-center">Login</h2>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary px-5">Sign In</button>
                    </div>
                    
                    <!-- Hidden signup options -->
                  
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

<!-- JavaScript to toggle signup options -->
<script>
  // alert("hello")
  // window.location.href='admin/index.php';
  document.getElementById('not-registered-btn').addEventListener('click', function() {
    const signupOptions = document.getElementById('signup-options');
    if (signupOptions.style.display === 'none') {
      signupOptions.style.display = 'block'; // Show the signup options
    } else {
      signupOptions.style.display = 'none'; // Hide the signup options
    }
  });
</script>

<!-- Custom CSS for Glass Effect and Navbar -->
<style>
  /* Glass Effect Login Form */
  .glass-form {
    background: rgba(255, 255, 255, 0.2); /* Slight white with transparency */
    border-radius: 20px;
    padding: 30px;
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
  }

  .glass-form .form-control {
    background-color: rgba(255, 255, 255, 0.1); /* Slightly more transparent for glass effect */
    border: 1px solid rgba(255, 255, 255, 0.5); /* Slight border */
    color: black; /* Text color */
    width: 90%; /* Reduce the width of the input fields */
    margin: 0 auto; /* Center the inputs */
    border-radius: 10px; /* Rounded corners for the input fields */
    padding: 10px; /* Padding for better touch targets */
    backdrop-filter: blur(5px); /* Frosted glass effect for inputs */
  }

  .glass-form .form-control::placeholder {
    background-color: rgba(255, 255, 255, 0.3); /* Transparent button */
  }

  .glass-form .btn-primary {
    background-color: rgba(255, 255, 255, 0.3); /* Transparent button */
    border: 1px solid rgba(255, 255, 255, 0.5);
    color: #fff;
  }

  .glass-form .btn-primary:hover {
    background-color: rgba(255, 255, 255, 0.5);
    color: #000;
  }

  /* Style for Not Registered button */
  .btn-secondary {
    background-color: rgba(255, 255, 255, 0.3); /* Same background as primary for consistency */
    border: 1px solid rgba(255, 255, 255, 0.5);
    color: #fff;
    transition: background-color 0.3s, color 0.3s; /* Smooth transition */
  }

  .btn-secondary:hover {
    background-color: rgba(255, 255, 255, 0.5);
    color: #000;
  }

  /* Style for Signup Option Buttons */
  .btn-info, .btn-warning {
    width: 45%; /* Adjust the width */
    margin: 10px 5px; /* Adjust margin to create space between buttons */
    display: inline-block; /* Make buttons appear side by side */
  }

</style>

</body>
</html>
