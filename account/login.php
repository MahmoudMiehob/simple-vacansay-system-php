<?php
ob_start();
include '../database/dbconnect.php';
session_start();


if(isset($_SESSION['user_id'])){
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>fourth year project</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <div>
        <!-- Top bar Start -->
        <div class="container-fluid bg-secondary ps-5 pe-0 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body py-2 pe-3 border-end" href=""><small>Help center</small></a>
                        <a class="text-body py-2 px-3 border-end" href=""><small>Join our team</small></a>
                        <a class="text-body py-2 px-3 border-end" href=""><small>legal information</small></a>
                        <a class="text-body py-2 px-3 border-end" href=""><small>Companies</small></a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div
                        class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                        <div class="me-3 pe-3 border-end py-2">
                        </div>
                        <div class="py-2">
                            <p class="m-0"><i class="fa fa-phone-alt me-2"></i>0983614598</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
            <a href="../index.php" class="navbar-brand p-0">
                <h1 class="m-0 text-uppercase text-primary"><i class="far fa-smile text-primary me-2"></i>Syrian Jop
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 me-n3">
                    <a href="../index.php" class="nav-item nav-link">Home</a>
                    <a href="../about.php" class="nav-item nav-link ">About</a>
                    <a href="../service.php" class="nav-item nav-link">Service</a>
                    <a href="../contact.php" class="nav-item nav-link">Contact</a>
                    <a href="register.php" class="nav-item nav-link active">Register</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Page Header Start -->
        <div class="container-fluid bg-dark p-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 text-white">Login</h1>
                    <a href="../index.php">Home</a>
                    <i class="far fa-square text-primary px-2"></i>
                    <a href="login.php">Login</a>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        <input type="email" id="form3Example3cg" name="email"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        <input type="password" id="form3Example4cg" name="password"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="login" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-lg gradient-custom-4 text-body"
                                            style="color:white !important ; background-color : #F3525A !important">Login</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">create account <a href="register.php"
                                            class="fw-bold text-body"><u>Register here</u></a></p>

                                </form>

                                <?php
                                if (isset($_POST["login"])) {

                                    $email = $_POST["email"];
                                    $password = $_POST["password"];

                                    $sql = "SELECT id,email, password,isAdmin FROM users WHERE email = ?";

                                    // Use prepared statement to prevent SQL injection
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("s", $email);

                                    $stmt->execute();

                                    $stmt->bind_result($id, $db_email, $db_password,$isadmin);

                                    $stmt->fetch();


                                    //verify username and password         
                                    if ($db_email && password_verify($password, $db_password)) {
                                        //session variable (user_id , role)
                                        $_SESSION['user_id'] = $id;
                                        if($isadmin == 0){
                                            header("Location: ../service.php");
                                        }else{
                                            header("Location: dashboard.php");
                                        }

                                    } else {
                                        echo "<p style='color:red ; text-align:center'>اسم المستخدم او كلمة المرور غير صحيحين</p>";
                                    }

                                    $stmt->close();
                                }

                                $conn->close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-secondary p-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About
                            Us</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our
                            Services</a>
                        <a class="text-secondary mb-2" href="#"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Team</a>
                        <a class="text-secondary" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact
                            Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Popular Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Help
                            Center</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Join
                            our team</a>
                        <a class="text-secondary mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>legal
                            information</a>
                        <a class="text-secondary mb-2" href="#"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                        <a class="text-secondary" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Other</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Team information</h3>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Al Bath University, Homs</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>syrian jops@gmail.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>0983614598</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Follow Us</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i
                                class="fab fa-twitter fw-normal"><img src="img/twitt.png" alt=""></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i
                                class="fab fa-facebook-f fw-normal"></i> <img src="img/fb-icon.png" alt=""></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i
                                class="fab fa-linkedin-in fw-normal"></i> <img src="img/linkedin-icon.png" alt=""></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i
                                class="fab fa-instagram fw-normal"></i><img src="img/instagram-icon.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-dark text-secondary text-center border-top py-4 px-5"
            style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="m-0">&copy; <a class="text-secondary border-bottom" href="#">Syrian jop</a>. The site. Designed by
                <a class="text-secondary border-bottom" href="https://htmlcodex.com">Students of the fourth year</a>
            </p>
        </div>

        <!-- Footer End -->
</body>

</html>

<?php ob_end_flush(); ?>