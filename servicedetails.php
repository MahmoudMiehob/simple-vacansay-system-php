<?php 
ob_start();
include 'database/dbconnect.php';
session_start();

//check if the user is already login
if (!isset($_SESSION['user_id'])) {
    header("Location: account/login.php");
    exit();
}

if(isset($_GET['id'])){
    $id = $_GET['id'] ;
}else{
    header("Location: index.php");
}

$sql = "SELECT * FROM services WHERE id = $id ";
$result = $conn->query($sql);

if ($result) {
    $service_details = $result->fetch_assoc();
}

if(!$service_details){
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>service details</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css">

        <!-- bootstrap 5 cdn -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">


    </head>
    <body>
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
                    <a href="service.php" class="nav-item nav-link">Service</a>
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
                    <h1 class="display-4 text-white">Service Details</h1>
                    <a href="index.php">Home</a>
                    <i class="far fa-square text-primary px-2"></i>
                    <a href="service.php">Services</a>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-4 "><img class="card-img-top mb-5 mb-md-0" src="img/servieces/<?= $service_details['image'] ?>" alt="..." /></div>
                    <div class="col-md-8">
                        <h1 class="display-5 fw-bolder"><?= $service_details['name'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span>salary : <?= $service_details['salary'] ?></span>
                        </div>
                        <p class="lead">Description : <?= $service_details['description'] ?></p>
                        <div class="d-flex">
                            <a href="mailto:ahmadfourthyear@gmail.com">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                Apply now by email
                            </button>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <?php include 'subscribe.php' ; ?>


        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Syrian job &copy; The site. Designed by
            <a class="text-secondary border-bottom" href="https://htmlcodex.com">Students of the fourth year</a></p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>