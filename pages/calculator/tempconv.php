<?php include '../../config/baseurl.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tempature Converter</title>

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
            padding: 10px 0;
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


        /* custom slider code */
        .carousel-inner {
            padding: 1em;
        }

        .card {
            margin: 0 0.5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            border: none;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: #e1e1e1;
            width: 6vh;
            height: 6vh;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        @media (min-width: 768px) {
            .carousel-item {
                margin-right: 0;
                flex: 0 0 33.333333%;
                display: block;
            }

            .carousel-inner {
                display: flex;
            }
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

    <?php include '../../includes/header.php'; ?>
    <br>
    <div class="container-fluid"> <!-- Full-width container -->
        <div class="row"> <!-- Remove padding between columns -->
            <!-- First grid item (4 grid spaces) -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card mb-4">
                    <div class="img-wrapper">
                        <img src="<?php echo $baseurl; ?>/assets/img/instagram/insta-1.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Advertisement Portion</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!-- Main Slide (4 grid spaces) -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <!-- <section class="Temp-converter-section"> -->
                <!-- <h2 class="text-center mt-5">Weigh and Mass Unit Converter</h2> -->
                <!-- <br> -->
                <!-- <div class="container"> -->
                <!-- <div class="row justify-content-center"> -->
                <!-- <div class="col-md-6"> -->
                <div class="converter-form">
                    <form>
                        <div class="form-group">
                            <label for="ucfrom">Enter Temperature:</label>
                            <input type="number" class="form-control" id="ucfrom" oninput="ucUpdateResult(); ucUpdateResult2();">
                        </div>

                        <div class="form-group">
                            <label for="ucfromunit">From:</label>
                            <select class="form-control" id="ucfromunit" onchange="ucUpdateResult(); ucUpdateResult2();">
                                <option value="1">Kelvin [K]</option>
                                <option value="274.15">Celsius [°C]</option>
                                <option value="255.9277777778">Fahrenheit [°F]</option>
                                <option value="0.5555555556">Rankine [°R]</option>
                                <option value="274.4">Reaumur [°r]</option>
                                <option value="273.16">Triple point of water</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="uctounit">To (Result 1):</label>
                            <select class="form-control" id="uctounit" onchange="ucUpdateResult()">
                            <option value="1">Kelvin [K]</option>
                                <option value="274.15">Celsius [°C]</option>
                                <option value="255.9277777778">Fahrenheit [°F]</option>
                                <option value="0.5555555556">Rankine [°R]</option>
                                <option value="274.4">Reaumur [°r]</option>
                                <option value="273.16">Triple point of water</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ucto">Converted Temperature Result 1:</label>
                            <input type="text" class="form-control" id="ucto" readonly>
                        </div>

                        <div class="form-group">
                            <label for="uctounit2">To (Result 2):</label>
                            <select class="form-control" id="uctounit2" onchange="ucUpdateResult2()">
                            <option value="1">Kelvin [K]</option>
                                <option value="274.15">Celsius [°C]</option>
                                <option value="255.9277777778">Fahrenheit [°F]</option>
                                <option value="0.5555555556">Rankine [°R]</option>
                                <option value="274.4">Reaumur [°r]</option>
                                <option value="273.16">Triple point of water</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ucto2">Converted Temperature Result 2:</label>
                            <input type="text" class="form-control" id="ucto2" readonly>
                        </div>

                    </form>
                </div>
                <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- </section> -->
            </div>

            <!-- Second grid item (4 grid spaces) -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card mb-4">
                    <div class="img-wrapper">
                        <img src="<?php echo $baseurl; ?>/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Information Portion</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
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
    <!-- JavaScript for Unit Conversion -->
    <script>
        function ucUpdateResult() {
            var fromUnit = parseFloat(document.getElementById("ucfromunit").value);
            var toUnit = parseFloat(document.getElementById("uctounit").value);
            var fromValue = parseFloat(document.getElementById("ucfrom").value);

            if (!isNaN(fromValue)) {
                var result = fromValue * (fromUnit / toUnit);
                document.getElementById("ucto").value = result;
            } else {
                document.getElementById("ucto").value = "";
            }
        }

        function ucUpdateResult2() {
            var fromUnit = parseFloat(document.getElementById("ucfromunit").value);
            var toUnit2 = parseFloat(document.getElementById("uctounit2").value);
            var fromValue = parseFloat(document.getElementById("ucfrom").value);

            if (!isNaN(fromValue)) {
                var result = fromValue * (fromUnit / toUnit2);
                document.getElementById("ucto2").value = result;
            } else {
                document.getElementById("ucto2").value = "";
            }
        }
    </script>
</body>

</html>