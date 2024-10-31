<?php
include '../../config/baseurl.php';
include '../../config/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/style.css" type="text/css">

    <style type="text/css">
        .notice-bar {
            width: 100%;
            background-color: #ffcc00;
            color: #333;
            padding: 5px 0;
            overflow: hidden;
            position: relative;
            text-align: center;
        }

        .notice-text p {
            display: inline-block;
            white-space: nowrap;
            animation: scroll-left 15s linear infinite;
            font-weight: bold;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .card {
            margin: 0 0.5em;
            /* box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18); */
            border: solid 1px rgba(50, 50, 50, 0.18);
        }

        .card .img-wrapper {
            max-width: 100%;
            height: 13em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card img {
            max-height: 100%;
        }

        @media (max-width: 767px) {
            .card .img-wrapper {
                height: 17em;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section Begins -->
    <?php include '../../includes/header.php'; ?>
    <!-- Header Section End -->

    <br>
    <div class="container-fluid">
        <div class="row no-gutters">
            <!-- First Grid: Top Category List -->
            <div class="col-md-2">
                <div class="card">
                    <h5>Top Categories</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Category 1</li>
                        <li class="list-group-item">Category 2</li>
                        <li class="list-group-item">Category 3</li>
                        <li class="list-group-item">Category 4</li>
                    </ul>
                </div>
                
            </div>

            <!-- Second Grid: Automatic Picture Slide -->
            <div class="col-md-7">
                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://img.tradeindia.com/new_website1/getdistributor/mailer/2017/Corporate-Metal-Launch-756X438-PX.jpg" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://tiimg.tistatic.com/new_website1/design2024/images/gd-desktop.jpeg" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://tiimg.tistatic.com/new_website1/design2024/images/almonaro-laptop.webp" class="d-block w-100" alt="Image 3">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- Third Grid: Divided into Two Rows, Each with Two Cards -->
            <div class="col-md-3">
                <!-- First Row with Two Cards -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card position-relative">
                            <img src="https://www.tradeindia.com/images/default/post-card.png" class="card-img-top" alt="Card 1">
                            <!-- Button positioned on top of the image -->
                            <button class="btn btn-primary position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                Click Me
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Second Row with Two Cards -->
                <div class="row">
                    <div class="col-12">
                        <div class="card position-relative">
                            <img src="https://www.tradeindia.com/images/default/sell-card.png" class="card-img-top" alt="Card 3">
                            <button class="btn btn-primary position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                Click Me
                            </button>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
    </div>



    <?php include '../../includes/footer.php'; ?>

    <!-- Js Plugins -->
    <script src="<?php echo $baseurl; ?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/mixitup.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.slicknav.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/main.js"></script>

</body>

</html>