<?php include '../../config/baseurl.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Area Calculator</title>

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
                <!-- <section class="area-converter-section"> -->
                    <!-- <h2 class="text-center mt-5">Area Unit Converter</h2> -->
                    <!-- <br> -->
                    <!-- <div class="container"> -->
                        <!-- <div class="row justify-content-center"> -->
                            <!-- <div class="col-md-6"> -->
                                <div class="converter-form">
                                    <form>
                                        <div class="form-group">
                                            <label for="ucfrom">Enter Area:</label>
                                            <input type="number" class="form-control" id="ucfrom" oninput="ucUpdateResult(); ucUpdateResult2();">
                                        </div>

                                        <div class="form-group">
                                            <label for="ucfromunit">From:</label>
                                            <select class="form-control" id="ucfromunit" onchange="ucUpdateResult(); ucUpdateResult2();">
                                                <option value="1">Square Meter [m^2]</option>
                                                <option value="1000000">Square Kilometer [km^2]</option>
                                                <option value="0.0001">Square Centimeter [cm^2]</option>
                                                <option value="1.0E-6">Square Millimeter [mm^2]</option>
                                                <option value="1.0E-12">Square Micrometer [µm^2]</option>
                                                <option value="10000">Hectare [ha]</option>
                                                <option value="4046.8564224">Acre [ac]</option>
                                                <option value="2589988.110336">Square Mile [mi^2]</option>
                                                <option value="0.83612736">Square Yard [yd^2]</option>
                                                <option value="0.09290304">Square Foot [ft^2]</option>
                                                <option value="0.00064516">Square Inch [in^2]</option>
                                                <option value="10000">Square Hectometer [hm^2]</option>
                                                <option value="100">Square Dekameter [dam^2]</option>
                                                <option value="0.01">Square Decimeter [dm^2]</option>
                                                <option value="1.0E-18">Square Nanometer [nm^2]</option>
                                                <option value="100">Are [a]</option>
                                                <option value="1.0E-28">Barn [b]</option>
                                                <option value="2589998.4703195">Square Mile (US Survey)</option>
                                                <option value="0.0929034116">Square Foot (US Survey)</option>
                                                <option value="0.0005067075">Circular Inch</option>
                                                <option value="93239571.972096">Township</option>
                                                <option value="2589988.110336">Section</option>
                                                <option value="4046.8726098743">Acre (US Survey) [ac]</option>
                                                <option value="1011.7141056">Rood</option>
                                                <option value="404.68564224">Square Chain [ch^2]</option>
                                                <option value="25.29285264">Square Rod</option>
                                                <option value="25.2929538117">Square Rod (US Survey)</option>
                                                <option value="25.29285264">Square Perch</option>
                                                <option value="25.29285264">Square Pole</option>
                                                <option value="6.4516E-10">Square Mil [mil^2]</option>
                                                <option value="5.067074790975E-10">Circular Mil</option>
                                                <option value="647497.027584">Homestead</option>
                                                <option value="0.09290304">Sabin</option>
                                                <option value="3418.8929236669">Arpent</option>
                                                <option value="3930.395625">Cuerda</option>
                                                <option value="6400">Plaza</option>
                                                <option value="0.698737">Varas Castellanas Cuad</option>
                                                <option value="6.288633">Varas Conuqueras Cuad</option>
                                                <option value="6.6524615999999E-29">Electron Cross Section</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="uctounit">To (Result 1):</label>
                                            <select class="form-control" id="uctounit" onchange="ucUpdateResult()">
                                                <option value="1">Square Meter [m^2]</option>
                                                <option value="1000000">Square Kilometer [km^2]</option>
                                                <option value="0.0001">Square Centimeter [cm^2]</option>
                                                <option value="1.0E-6">Square Millimeter [mm^2]</option>
                                                <option value="1.0E-12">Square Micrometer [µm^2]</option>
                                                <option value="10000">Hectare [ha]</option>
                                                <option value="4046.8564224">Acre [ac]</option>
                                                <option value="2589988.110336">Square Mile [mi^2]</option>
                                                <option value="0.83612736">Square Yard [yd^2]</option>
                                                <option value="0.09290304">Square Foot [ft^2]</option>
                                                <option value="0.00064516">Square Inch [in^2]</option>
                                                <option value="10000">Square Hectometer [hm^2]</option>
                                                <option value="100">Square Dekameter [dam^2]</option>
                                                <option value="0.01">Square Decimeter [dm^2]</option>
                                                <option value="1.0E-18">Square Nanometer [nm^2]</option>
                                                <option value="100">Are [a]</option>
                                                <option value="1.0E-28">Barn [b]</option>
                                                <option value="2589998.4703195">Square Mile (US Survey)</option>
                                                <option value="0.0929034116">Square Foot (US Survey)</option>
                                                <option value="0.0005067075">Circular Inch</option>
                                                <option value="93239571.972096">Township</option>
                                                <option value="2589988.110336">Section</option>
                                                <option value="4046.8726098743">Acre (US Survey) [ac]</option>
                                                <option value="1011.7141056">Rood</option>
                                                <option value="404.68564224">Square Chain [ch^2]</option>
                                                <option value="25.29285264">Square Rod</option>
                                                <option value="25.2929538117">Square Rod (US Survey)</option>
                                                <option value="25.29285264">Square Perch</option>
                                                <option value="25.29285264">Square Pole</option>
                                                <option value="6.4516E-10">Square Mil [mil^2]</option>
                                                <option value="5.067074790975E-10">Circular Mil</option>
                                                <option value="647497.027584">Homestead</option>
                                                <option value="0.09290304">Sabin</option>
                                                <option value="3418.8929236669">Arpent</option>
                                                <option value="3930.395625">Cuerda</option>
                                                <option value="6400">Plaza</option>
                                                <option value="0.698737">Varas Castellanas Cuad</option>
                                                <option value="6.288633">Varas Conuqueras Cuad</option>
                                                <option value="6.6524615999999E-29">Electron Cross Section</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="ucto">Converted Area Result 1:</label>
                                            <input type="text" class="form-control" id="ucto" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="uctounit2">To (Result 2):</label>
                                            <select class="form-control" id="uctounit2" onchange="ucUpdateResult2()">
                                                <option value="1">Square Meter [m^2]</option>
                                                <option value="1000000">Square Kilometer [km^2]</option>
                                                <option value="0.0001">Square Centimeter [cm^2]</option>
                                                <option value="1.0E-6">Square Millimeter [mm^2]</option>
                                                <option value="1.0E-12">Square Micrometer [µm^2]</option>
                                                <option value="10000">Hectare [ha]</option>
                                                <option value="4046.8564224">Acre [ac]</option>
                                                <option value="2589988.110336">Square Mile [mi^2]</option>
                                                <option value="0.83612736">Square Yard [yd^2]</option>
                                                <option value="0.09290304">Square Foot [ft^2]</option>
                                                <option value="0.00064516">Square Inch [in^2]</option>
                                                <option value="10000">Square Hectometer [hm^2]</option>
                                                <option value="100">Square Dekameter [dam^2]</option>
                                                <option value="0.01">Square Decimeter [dm^2]</option>
                                                <option value="1.0E-18">Square Nanometer [nm^2]</option>
                                                <option value="100">Are [a]</option>
                                                <option value="1.0E-28">Barn [b]</option>
                                                <option value="2589998.4703195">Square Mile (US Survey)</option>
                                                <option value="0.0929034116">Square Foot (US Survey)</option>
                                                <option value="0.0005067075">Circular Inch</option>
                                                <option value="93239571.972096">Township</option>
                                                <option value="2589988.110336">Section</option>
                                                <option value="4046.8726098743">Acre (US Survey) [ac]</option>
                                                <option value="1011.7141056">Rood</option>
                                                <option value="404.68564224">Square Chain [ch^2]</option>
                                                <option value="25.29285264">Square Rod</option>
                                                <option value="25.2929538117">Square Rod (US Survey)</option>
                                                <option value="25.29285264">Square Perch</option>
                                                <option value="25.29285264">Square Pole</option>
                                                <option value="6.4516E-10">Square Mil [mil^2]</option>
                                                <option value="5.067074790975E-10">Circular Mil</option>
                                                <option value="647497.027584">Homestead</option>
                                                <option value="0.09290304">Sabin</option>
                                                <option value="3418.8929236669">Arpent</option>
                                                <option value="3930.395625">Cuerda</option>
                                                <option value="6400">Plaza</option>
                                                <option value="0.698737">Varas Castellanas Cuad</option>
                                                <option value="6.288633">Varas Conuqueras Cuad</option>
                                                <option value="6.6524615999999E-29">Electron Cross Section</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="ucto2">Converted Area Result 2:</label>
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