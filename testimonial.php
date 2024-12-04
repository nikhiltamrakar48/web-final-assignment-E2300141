<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'e-learning';

$conn = new mysqli($host, $user, $password, $database);
session_start();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email address from the form
    $email = $_POST['email'];
    
    // Validate the email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Use prepared statement to avoid SQL injection
        $stmt = $conn->prepare("INSERT INTO Newsletter (email) VALUES (?)");
        $stmt->bind_param("s", $email);

        // Execute the query
        if ($stmt->execute()) {
        echo "<script>alert('Thank you for subscribing to our newsletter!')</script>";
        echo '<script>window.location.href="index.php"</script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Invalid email address.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Teach Mate : Testimonial</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <p class="m-0 fw-bold" style="font-size: 25px;"><img src="img/icon.png" alt="" height="50px">Teach<span
                    style="color: #fb873f;">Mate</span></p>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            style="border: none;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php " class="nav-item nav-link active">Home</a>
                <a href="about.php " class="nav-item nav-link">About</a>
                <a href="courses.php " class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.php " class="dropdown-item">Our Team</a>
                        <a href="testimonial.php " class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <a href="contact.php " class="nav-item nav-link">Contact</a>
                <a href="login.php " class="nav-item nav-link"><i class="fa fa-user"></i></a>
                <a href="#" class="nav-item nav-link">
                    <div id="google_translate_element"></div>
                </a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->



    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Student Reviews</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Reviews</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h1 class=" bg-white text-center px-3" style="color: #fb873f;">Success stories</h1>
                <p class="mb-5">Can Teach Mate courses help your career? Our learners tell us how.</p>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Sarah K.</h5>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">I stumbled upon Teach Mate while searching for free courses. The quality
                            surpassed my expectations! The content was rich, and the instructors were knowledgeable.
                            I've already recommended it to my friends.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John M.</h5>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">As a working professional, finding free courses that match my schedule was a
                            game-changer. The courses are engaging, and the community aspect adds immense value. Highly
                            recommended!</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">David P.</h5>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">I've taken multiple courses here, and each one has been fantastic. The
                            platform's design makes learning enjoyable, and the knowledge gained is invaluable. It's
                            hard to believe these courses are free!</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Lisa S.</h5>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">I'm amazed at the quality of the free courses available. The instructors are
                            experts in their fields, and the interactive lessons make learning a breeze. Thank you for
                            this opportunity!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


   <!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-3">Quick Link</h4>
                <p><a class="text-light" href="about.html">About Us</a></p>
                <p><a class="text-light" href="contact.html">Contact Us</a></p>
                <p><a class="text-light" href="">Privacy Policy</a></p>
                <p><a class="text-light" href="">Terms & Condition</a></p>
                <p><a class="text-light" href="">FAQs & Help</a></p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Navadut, New Baneshwor, Kathmandu</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+977-9812354076</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>teachmate123@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="https://x.com/i/flow/signup"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
    <h4 class="text-white mb-3">Subscribe to our Newsletter</h4>
    <p>Subscribe now and join our growing community of learners committed to lifelong education!</p>
    <div class="position-relative mx-auto" style="max-width: 400px;">
        <form action="" method="POST">
            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="email"
                placeholder="Your email" name="email" required>
            <button type="submit"
                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
        </form>
    </div>
</div>

        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="index.php">Teach Mate</a>, All Right Reserved.

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>