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
            <!-- Glass Effect Sign Up Buttons -->
            <div class="row justify-content-center mt-4">
              <div class="col-md-4 mb-3"> <!-- Add margin-bottom for gap -->
                <button class="glass-btn" onclick="window.location.href='user_signup.php'">User Sign Up</button>
              </div>
              <div class="col-md-4 mb-3">
                <button class="glass-btn" onclick="window.location.href='institutes_signup.php'">Institute Sign Up</button>
              </div>
            </div>

            <h1 class="mb-3 bread">Registration</h1>
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

<!-- Custom CSS for Glass Effect Buttons -->
<style>
  /* Glass Effect Buttons */
  .glass-btn {
    background: rgba(255, 255, 255, 0.2); /* Slight white with transparency */
    border-radius: 20px;
    padding: 15px 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px); /* Frosted glass effect */
    border: 1px solid rgba(255, 255, 255, 0.3); /* Slight border to enhance glass look */
    color: #fff; /* Text color */
    font-size: 18px;
    text-transform: uppercase;
    transition: background-color 0.3s ease, color 0.3s ease;
    cursor: pointer;
    display: inline-block;
    width: 100%;
    text-align: center;
  }

  .glass-btn:hover {
    background-color: rgba(255, 255, 255, 0.5); /* Lighter on hover */
    color: #000; /* Darker text on hover */
  }

  /* Responsive design adjustments */
  @media (max-width: 768px) {
    .glass-btn {
      font-size: 16px;
      padding: 12px 20px;
    }
  }

  /* Adding gap between buttons */
  .mb-3 {
    margin-bottom: 20px; /* 20px gap between buttons */
  }

</style>

</body>
</html>
