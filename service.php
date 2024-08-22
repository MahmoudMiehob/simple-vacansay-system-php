<?php
ob_start();
include 'database/dbconnect.php';
session_start();

//check if the user is already login
if (!isset($_SESSION['user_id'])) {
    header("Location: account/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>fourth year project</title>

    <!-- bootstrap 5 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .alert-container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}

.alert {
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
    </style>
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
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="m-0 text-uppercase text-primary"><i class="far fa-smile text-primary me-2"></i>Syrian Job
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 me-n3">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link active">Service</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <a href="account/logout.php" class="nav-item nav-link">logout</a>
                    <?php } else { ?>
                        <a href="account/register.php" class="nav-item nav-link">Register</a>
                    <?php } ?>

                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Page Header Start -->
        <div class="container-fluid bg-dark p-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4 text-white">Services</h1>
                    <a href="index.php">Home</a>
                    <i class="far fa-square text-primary px-2"></i>
                    <a href="service.php">Services</a>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Services Start -->
        <div class="container-fluid pt-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 mb-0">What We Offer</h1>
                <hr class="w-25 mx-auto bg-primary">
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                function getfourwords($text){
                    $words = explode(' ', $text);
                    $firstFourWords = array_slice($words, 0, 12);
                    $firstFourWordsString = implode(' ', $firstFourWords);
                    echo $firstFourWordsString . ' .....';
                }

                $sql = "SELECT * FROM services";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) { // check if there are results or not
                    $servieces = $result->fetch_all(MYSQLI_ASSOC);
                    foreach ($servieces as $serviece) { ?>
                        <a href="servicedetails.php?id=<?= $serviece['id'] ?>" style="text-decoration-style:none;color:black">
                            <div class="col">
                                <div class="card">
                                    <img src="img/servieces/<?= $serviece['image'] ?>" style="max-height:150px"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $serviece['name'] ?></h5>
                                        <p class="card-text"><?= getfourwords($serviece['description']) ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php }
                } ?>
            </div>

        </div>
        <!-- Services End -->

        <!-- Footer Start -->
        <?php include 'subscribe.php' ; ?>
        



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
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>syrian jobs@gmail.com</p>
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
            <p class="m-0">&copy; <a class="text-secondary border-bottom" href="#">Syrian job</a>. The site. Designed by
                <a class="text-secondary border-bottom" href="https://htmlcodex.com">Students of the fourth year</a>
            </p>
        </div>
        <!-- Footer End -->



</body>

</html>

<?php ob_end_flush(); ?>