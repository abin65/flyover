<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FLYOVER - abroad going institutions hub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>"> 
    
    <!-- Custom Styles to manage nav link color change -->
    <style>
      /* Default styling for the navbar */
      
      /* 
      styling of hexadecimal values

      color - hexadecimal values - #000000 1 attr - value - (0 - 9 [10 - 15: a b c d e f])
            - rgb values 
            - rgba values 
      
      
      
      
      
      */

      /* Change color of nav link on click */
      .nav-link.active {
        color: blue !important; /* color when clicked */
      }

      /* Optionally: styling for hovered links */
      #ftco-navbar .nav-link:hover {
        color: blue; /* hover color */
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html"><i class="flaticon-university"></i>FLYOVER<br><small></small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link" id="home-link">Home</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link" id="about-link">About</a></li>
            <li class="nav-item"><a href="view_course_list.php" class="nav-link" id="courses-link">Courses</a></li>
            <li class="nav-item"><a href="view_faculty.php" class="nav-link" id="teacher-link">Teacher</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link" id="contact-link">Contact</a></li>
            <li class="nav-item cta"><a href="login.php" class="nav-link"><span>Sign In</span></a></li> 
            <li class="nav-item cta"><a href="sign_up.php" class="nav-link"><span>Sign Up</span></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Include necessary Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    
    <!-- JavaScript to toggle active class and persist it -->
    <script>
      // Select all nav links
      const navLinks = document.querySelectorAll('#ftco-navbar .nav-link');

      // Add event listener to each nav link
      navLinks.forEach(link => {
        link.addEventListener('click', function() {
          // Remove 'active' class from all links
          navLinks.forEach(link => link.classList.remove('active'));

          // Add 'active' class to the clicked link
          this.classList.add('active');

          // Store the id of the clicked link in local storage
          localStorage.setItem('activeLink', this.getAttribute('id'));
        });
      });

      // On page load, check if there's an active link stored in local storage
      window.onload = function() {
        const activeLinkId = localStorage.getItem('activeLink');
        if (activeLinkId) {
          // Find the corresponding link and add the 'active' class
          const activeLink = document.getElementById(activeLinkId);
          if (activeLink) {
            activeLink.classList.add('active');
          }
        }
      };
    </script>
  </body>
</html>
