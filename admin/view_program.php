<?php
session_start();
include 'header.php';
include '../config.php'; // Database connection file

// Check if the user is logged in
if (!isset($_SESSION['login_id'])) {
    echo "<script>alert('Please log in first.'); window.location = 'login.php';</script>";
    exit;
}

// Initialize search term
$search_term = '';

// Check if the search form has been submitted
if (isset($_POST['search'])) {
    $search_term = mysqli_real_escape_string($con, $_POST['search_term']);
    // Fetch programs based on the search term
    $query = "SELECT program.* FROM program 
    JOIN institute_reg ON program.institute_id = institute_reg.login_id 
    WHERE institute_reg.institute_name LIKE '%$search_term%'";
   
} else {
    // Fetch all programs if no search term is provided
    $query = "SELECT * FROM `program`";
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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Programs</span></p>
                    <h1 class="mb-3 bread">Programs</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="container mt-4">
        <form method="POST" action="">
            <div class="input-group">
                <input type="text" name="search_term" class="form-control" placeholder="Search by program name" value="<?php echo htmlspecialchars($search_term); ?>">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="search">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Programs Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each program and display it
                    while ($row = mysqli_fetch_assoc($result)) {
                        $program_id = $row['program_id']; // Program ID
                        $program_name = $row['program_name'];
                        $department = $row['department'];
                        $start_date = $row['start_date'];
                        $end_date = $row['end_date'];
                        $description = $row['description'];
                        $venue = $row['venue'];

                        // Check if the program has expired
                        $is_expired = (strtotime($end_date) < time()); // Compare end date with current time

                        echo '
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="course align-self-stretch">
                                <div class="text p-4">';

                        // Display expired message in red if applicable
                        if ($is_expired) {
                            echo '<p style="color: red; font-weight: bold;">This program has expired.</p>';
                        }

                        echo '
                                    <h3 class="mb-3"><a href="program_details.php?id=' . $program_id . '">' . $program_name . '</a></h3>
                                    <p><strong>Department:</strong> ' . $department . '</p>
                                    <p><strong>Start Date:</strong> ' . date("F j, Y", strtotime($start_date)) . '</p>
                                    <p><strong>End Date:</strong> ' . date("F j, Y", strtotime($end_date)) . '</p>
                                    <p><strong>Description:</strong> ' . $description . '</p>
                                    <p><strong>Venue:</strong> ' . $venue . '</p>
                                    <div class="d-flex justify-content-between">
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>No programs found for this institute.</p>";
                }
                ?>
            </div>
        </div>
    </section>

<?php
include 'footer.php';
?>

<!-- Include necessary JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
