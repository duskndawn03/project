
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempature Converter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI CDN -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


    <style type="text/css">
        .card {
            margin: 0 0.5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            border: none;
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

<?= view('header');?>
    <br>
    <div class="container-fluid"> <!-- Full-width container -->
        <div class="row"> <!-- Remove padding between columns -->
            <!-- First grid item (4 grid spaces) -->
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card mb-4">
                    <div class="img-wrapper">
                        <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-1.jpg" class="card-img-top" alt="...">
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
                        <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
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

    <?= view('footer');?>

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