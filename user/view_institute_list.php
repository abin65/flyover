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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Institutes</span></p>
                    <h1 class="mb-3 bread">Institutes</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Institute List Section -->
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <!-- PHP code to fetch institutes from the database -->
                <?php
                include '../config.php';

                $query = "
                    SELECT institute_reg.*, login.status AS login_status 
                    FROM institute_reg
                    INNER JOIN login ON institute_reg.login_id = login.login_id
                    WHERE login.status = 'approve'
                ";
                $result = mysqli_query($con, $query);

                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="course align-self-stretch">
                                <a href="#" class="img" style="background-image: url(../upload/' . htmlspecialchars($row['institute_photo']) . ');"></a>
                                <div class="text p-4">
                                    <p class="category"><span>' . htmlspecialchars($row['institute_name']) . '</span></p>
                                    <h3 class="mb-3"><a href="#">' . htmlspecialchars($row['institute_name']) . '</a></h3>
                                    <p class="mt-3 description">' . nl2br(htmlspecialchars($row['description'])) . '</p> <!-- Short description with line breaks -->
                                   <p class="mt-3"><a href="view_institute_details.php?id=' . htmlspecialchars($row['institute_reg_id']) . '" class="btn btn-primary">View Details</a></p>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "<p>No Institutes Found</p>";
                }
                ?>
            </div>

            <!-- Pagination (if needed) -->
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2>Subscribe to our Newsletter</h2>
                        <p>Stay updated with the latest institutes and courses.</p>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include 'footer.php';
    ?>

    <!-- Loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <!-- Include necessary JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <style>
        .course .text p {
            margin-top: 20px; /* Adjust this value to control spacing */
        }

        .course .text h3 {
            margin-top: 10px; /* Adjust if you want more space above the headings */
        }

        /* Custom style for description line breaks */
        .description {
            white-space: pre-wrap; /* Preserve whitespace and line breaks */
            margin-top: 10px; /* Adjust spacing */
            line-height: 1.5; /* Adjust line height for better readability */
            word-wrap: break-word; /* Break long words to avoid overflow */
            max-height: 120px; /* Limit the height of the description */
            overflow: hidden; /* Hide overflowing text */
            text-overflow: ellipsis; /* Add ellipsis for overflowing text */
        }
    </style>
</body>

</html>
