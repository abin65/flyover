<?php
include 'header.php';
$institute_id = intval($_GET['id']);
?>
<body>
    <!-- Hero Section -->
    <div class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <!-- Feedback Form -->
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="glass-form">
                                <form action="feedback_action.php" method="POST">
                                    <h2 class="text-center">Add Feedback</h2>

                                    <!-- Hidden input for institute_id -->
                                    <input type="hidden" name="institute_id" value="<?php echo $institute_id; ?>" />

                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Your Feedback" name="feedback" required></textarea>
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        <label for="rating">Rate Us:</label>
                                        <div class="star-rating" id="star-rating">
                                            <input type="radio" name="rating" id="star-5" value="5" required />
                                            <label for="star-5" class="star">&#9733;</label>
                                            <input type="radio" name="rating" id="star-4" value="4" />
                                            <label for="star-4" class="star">&#9733;</label>
                                            <input type="radio" name="rating" id="star-3" value="3" />
                                            <label for="star-3" class="star">&#9733;</label>
                                            <input type="radio" name="rating" id="star-2" value="2" />
                                            <label for="star-2" class="star">&#9733;</label>
                                            <input type="radio" name="rating" id="star-1" value="1" />
                                            <label for="star-1" class="star">&#9733;</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary px-5">Submit Feedback</button>
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

<!-- Custom CSS for Glass Effect -->
<style>
    /* Glass Effect Feedback Form */
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
        background-color: rgba(255, 255, 255, 0.3); /* Transparent placeholder */
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

    /* Star Rating Styles */
    .star-rating {
        direction: rtl; /* Reverse the order */
        display: inline-block;
        font-size: 2rem; /* Size of the stars */
    }
    
    .star-rating input {
        display: none; /* Hide radio inputs */
    }
    
    .star-rating label {
        color: #ddd; /* Inactive star color */
        cursor: pointer;
    }
    
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #FFD700; /* Active star color */
    }
</style>

</body>
</html>
