<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FLYOVER - abroad going institution hub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">

    <link rel="stylesheet" href="../assets/css/aos.css">

    <link rel="stylesheet" href="../assets/css/ionicons.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../assets/css/jquery.timepicker.css">

    <link rel="stylesheet" href="../assets/css/flaticon.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/icomoon.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    
    <!-- Custom Styles to manage nav link color change -->
    <style>
      /* Default styling for the navbar */
      #ftco-navbar .nav-link {
        color: #fff; /* default black */
        transition: color 0.3s ease; /* smooth transition */
      }

      /* Change color of nav link on click */
      .nav-link.active {
        color: blue !important; /* color when clicked */
      }

      /* Optionally: styling for hovered links */
      #ftco-navbar .nav-link:hover {
        color: blue; /* hover color */
      }

      /* Add a gap between Sign In and Sign Up */
      .nav-item.cta + .nav-item.cta {
        margin-left: 15px; /* adjust this value for desired gap */
      }

      /* Dropdown menu styling */
      .dropdown-menu {
        background-color: #f8f9fa; /* Change background color */
      }

      .dropdown-item:hover {
        background-color: #e9ecef; /* Add hover effect */
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

            <li class="nav-item"><a href="profile.php" class="nav-link" id="home-link">Profile</a></li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="courses-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Institutes</a>
              <div class="dropdown-menu" aria-labelledby="courses-link">
                <a class="dropdown-item" href="view_institute_list.php">Institutes</a>
                <a class="dropdown-item" href="view_faculty.php">Faculty</a>
              </div>
            </li>

            
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="courses-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</a>
              <div class="dropdown-menu" aria-labelledby="courses-link">
                <a class="dropdown-item" href="view_course_list.php">Course list </a>
                <a class="dropdown-item" href="course_report.php">Courses report</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="courses-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Job</a>
              <div class="dropdown-menu" aria-labelledby="courses-link">
                <a class="dropdown-item" href="view_jobs.php">Job list </a>
                <a class="dropdown-item" href="job_report.php">Job report</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="courses-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Internship</a>
              <div class="dropdown-menu" aria-labelledby="courses-link">
                <a class="dropdown-item" href="view_internship.php">Internship list </a>
                <a class="dropdown-item" href="internship_report.php">Internship report</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="courses-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Program</a>
              <div class="dropdown-menu" aria-labelledby="courses-link">
                <a class="dropdown-item" href="view_program.php">Program list </a>
                <a class="dropdown-item" href="program_report.php">Program report</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="courses-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Feedback</a>
              <div class="dropdown-menu" aria-labelledby="courses-link">
                <a class="dropdown-item" href="add_feedback_view_institute.php">Add Feedback</a>
                <a class="dropdown-item" href="view_feedback.php">View Feedback</a>
              </div>
            </li>
            
           
            <li class="nav-item cta"><a href="logout.php" class="nav-link"><span>Log Out</span></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Include necessary Bootstrap JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    
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
