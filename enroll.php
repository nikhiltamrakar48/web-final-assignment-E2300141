<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'e-learning';

$conn = new mysqli($host, $user, $password, $database);
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $date_of_birth = $_POST['dob'];
    $address = $_POST['address'];
    $qualification = $_POST['qualification'];

    // Use a prepared statement to safely insert data
    $stmt = $conn->prepare("INSERT INTO Enrollment (first_name, last_name, email, mobile, date_of_birth, address, qualification) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $first_name, $last_name, $email, $mobile, $date_of_birth, $address, $qualification);

    // Execute the statement
    if ($stmt->execute()) {

        echo "<script>alert('Enrolled successfully')</script>";
        echo '<script>window.location.href="index.php"</script>';
    } else {
        echo "Error: " . $stmt->error;
    }
    

    // Close the statement
    $stmt->close();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c">
    </meta>

    <title>Teach Mate : Online Courses</title>
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
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="enroll.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <p class="m-0 fw-bold" style="font-size: 25px;"><img src="img/icon.png" alt="" height="50px">Teach<span
                    style="color: #fb873f;">Mate</span></p>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="courses.php" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>

                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <?php 
                if(isset($_SESSION['username'])) {
                ?>   
                <a href="profile.php" class="text-decoration-none text-warning">Profile</a>
                <a href="logout.php" class="text-decoration-none text-warning ms-3">Logout</a>

                <?php } else { ?>
                <a href="login.php" class="text-decoration-none text-warning">Login</a>
                <a href="signup.php" class="text-decoration-none text-warning ms-3">Sign Up</a>
                <?php } ?>
                    
                <a href="#" class="nav-item nav-link">

                <div id="google_translate_element">
                </div>


                </a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<section class="row">
            <form method="post" class="col-md-4 offset-md-4 mt-5">
                
                <h3 class="text-center mb-3">Enroll now</h3>

                <div class="form-group mb-3">
                    <label for="">First-Name</label>
                    <input type="text" class="form-control" 
                    name="first_name" required >
                
                </div>

                <div class="form-group mb-3">
                    <label for="">Last-Name</label>
                    <input type="text" class="form-control" 
                    name="last_name" required >
                
                </div>

                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" 
                    name="email" required 
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="">Mobile</label>
                    <input type="text" class="form-control" 
                    name="mobile" required >
                </div>

                <div class="form-group mb-3">
                    <label for="">Date of birth</label>
                    <input type="date" class="form-control" 
                    name="dob" required  
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="">Address</label>
                    <input type="text" class="form-control" 
                    name="address" required  
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="">Qualification</label>
                    <input type="text" class="form-control" 
                    name="qualification" required >
                </div>

                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" 
                    name="enroll" value="Enroll">
                </div>

                

            </form>
        </section>
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
</body>
</html>
