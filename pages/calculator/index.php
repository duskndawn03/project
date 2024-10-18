<?php include '../../config/baseurl.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Calculators</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->

    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/style.css" type="text/css">

    <style type="text/css">
        @keyframes scroll-left {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .body-div {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .custom-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .custom-card {
            background-color: white;
            width: 20%;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 1.5rem;
            color: #333;
            text-decoration: underline;
        }

        .custom-ul {
            list-style: none;
            padding: 0;
        }

        .custom-li {
            font-size: 1rem;
            color: #666;
            margin: 10px 0;
        }

        .custom-card a {
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 1rem;
            color: #3498db;
            text-decoration: none;
        }

        .custom-card a:hover {
            text-decoration: none;
        }

        @media screen and (max-width: 768px) {
            .custom-card {
                width: 45%;
            }
        }

        @media screen and (max-width: 480px) {
            .custom-card {
                width: 90%;
            }
        }
    </style>

</head>



<body>

    <?php include '../../includes/header.php'; ?>

    <div class="body-div">
        <div class="custom-container">
            <div class="custom-card">
                <h2>Math</h2>
                <ul class="custom-ul">
                    <li class="custom-li">Percentage Calculator</li>
                    <li class="custom-li">Percentage Error Calculator</li>
                    <li class="custom-li">Percent Given Value Calculator</li>
                    <li class="custom-li">Value Given Percent Calculator</li>
                </ul>
                <a href="#">See more</a>
            </div>

            <div class="custom-card">
                <h2>Geometry</h2>
                <ul class="custom-ul">
                    <li class="custom-li">Area Calculator</li>
                    <li class="custom-li">Volume Calculator</li>
                    <li class="custom-li">Surface Calculator</li>
                    <li class="custom-li">Circle Calculator</li>
                </ul>
                <a href="#">See more</a>
            </div>

            <div class="custom-card">
                <h2>Personal Finance</h2>
                <ul class="custom-ul">
                    <li class="custom-li">Mortgage Calculator</li>
                    <li class="custom-li">Loan Calculator</li>
                    <li class="custom-li">Auto Loan Calculator</li>
                    <li class="custom-li">Interest Calculator</li>
                </ul>
                <a href="#">See more</a>
            </div>

            <div class="custom-card">
                <h2>Physics</h2>
                <ul class="custom-ul">
                    <li class="custom-li">Acceleration Calculator</li>
                    <li class="custom-li">Work Calculator</li>
                    <li class="custom-li">Kinetic Energy Calculator</li>
                    <li class="custom-li">Gravitational Force Calculator</li>
                </ul>
                <a href="#">See more</a>
            </div>

            <div class="custom-card">
                <h2>Converters</h2>
                <ul class="custom-ul">
                    <li class="custom-li"><a href="<?php echo $baseurl;?>/pages/calculator/lengthconverter.php">Length Converter</a></li>
                    <li class="custom-li"><a href="<?php echo $baseurl;?>/pages/calculator/areacalc.php">Area Converter</a></li>
                    <li class="custom-li"><a href="<?php echo $baseurl;?>/pages/calculator/weightandmass.php">Weight Converter</a></li>
                    <li class="custom-li">Temperature Converter</li>
                </ul>
                <a href="#">See more</a>
            </div>

            <div class="custom-card">
                <h2>Date Time</h2>
                <ul class="custom-ul">
                    <li class="custom-li"><a href="<?php echo $baseurl;?>/pages/calculator/datetime.php">Date & time calculator</a></li>
                    <li class="custom-li">Hours Calculator</li>
                    <li class="custom-li">24-Hours Clock Calculator</li>
                    <li class="custom-li">Date Calculator</li>
                </ul>
                <a href="#">See more</a>
            </div>

            <div class="custom-card">
                <h2>Cooking</h2>
                <ul class="custom-ul">
                    <li class="custom-li">Cooking Measurement Converter</li>
                    <li class="custom-li">Cooking Ingredient Converter</li>
                    <li class="custom-li">Cake Pan Converter</li>
                </ul>
                <a href="#">See more</a>
            </div>

            <div class="custom-card">
                <h2>Fitness</h2>
                <ul class="custom-ul">
                    <li class="custom-li">BMI Calculator</li>
                    <li class="custom-li">Calorie Calculator</li>
                    <li class="custom-li">BMR Calculator</li>
                    <li class="custom-li">Body Fat Calculator</li>
                </ul>
                <a href="#">See more</a>
            </div>
        </div>
    </div>


    <?php include '../../includes/footer.php'; ?>

    <!-- Js Plugins -->

    <script src="<?php echo $baseurl;?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/mixitup.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/jquery.slicknav.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/main.js"></script>
</body>
</html>