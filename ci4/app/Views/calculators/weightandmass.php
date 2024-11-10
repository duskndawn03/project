
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight and Mass Calculator</title>

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
                <!-- <section class="weightandmass-converter-section"> -->
                <!-- <h2 class="text-center mt-5">Weigh and Mass Unit Converter</h2> -->
                <!-- <br> -->
                <!-- <div class="container"> -->
                <!-- <div class="row justify-content-center"> -->
                <!-- <div class="col-md-6"> -->
                <div class="converter-form">
                    <form>
                        <div class="form-group">
                            <label for="ucfrom">Enter Weight:</label>
                            <input type="number" class="form-control" id="ucfrom" oninput="ucUpdateResult(); ucUpdateResult2();">
                        </div>

                        <div class="form-group">
                            <label for="ucfromunit">From:</label>
                            <select class="form-control" id="ucfromunit" onchange="ucUpdateResult(); ucUpdateResult2();">
                                <option value="1">Kilogram [kg]</option>
                                <option value="0.001">Gram [g]</option>
                                <option value="1.0E-6">Milligram [mg]</option>
                                <option value="1000">Ton (metric) [t]</option>
                                <option value="0.45359237">Pound [lbs]</option>
                                <option value="0.0283495231">Ounce [oz]</option>
                                <option value="0.0002">Carat [car, ct]</option>
                                <option value="907.18474">Ton (short) [ton (US)]</option>
                                <option value="1016.0469088">Ton (long) [ton (UK)]</option>
                                <option value="1.6605402E-27">Atomic mass unit [u]</option>
                                <option value="1.0E+15">Exagram [Eg]</option>
                                <option value="1000000000000">Petagram [Pg]</option>
                                <option value="1000000000">Teragram [Tg]</option>
                                <option value="1000000">Gigagram [Gg]</option>
                                <option value="1000">Megagram [Mg]</option>
                                <option value="0.1">Hectogram [hg]</option>
                                <option value="0.01">Dekagram [dag]</option>
                                <option value="0.0001">Decigram [dg]</option>
                                <option value="1.0E-5">Centigram [cg]</option>
                                <option value="1.0E-9">Microgram [µg]</option>
                                <option value="1.0E-12">Nanogram [ng]</option>
                                <option value="1.0E-15">Picogram [pg]</option>
                                <option value="1.0E-18">Femtogram [fg]</option>
                                <option value="1.0E-21">Attogram [ag]</option>
                                <option value="1.6605300000013E-27">Dalton</option>
                                <option value="9.80665">Kilogram-force square second/meter</option>
                                <option value="453.59237">Kilopound [kip]</option>
                                <option value="453.59237">Kip</option>
                                <option value="14.5939029372">Slug</option>
                                <option value="14.5939029372">Pound-force square second/foot</option>
                                <option value="0.3732417216">Pound (troy or apothecary)</option>
                                <option value="0.0140867196">Poundal [pdl]</option>
                                <option value="0.02916667">Ton (assay) (US) [AT (US)]</option>
                                <option value="0.0326666667">Ton (assay) (UK) [AT (UK)]</option>
                                <option value="1000000">Kiloton (metric) [kt]</option>
                                <option value="100">Quintal (metric) [cwt]</option>
                                <option value="45.359237">Hundredweight (US)</option>
                                <option value="50.80234544">Hundredweight (UK)</option>
                                <option value="11.33980925">Quarter (US) [qr (US)]</option>
                                <option value="12.70058636">Quarter (UK) [qr (UK)]</option>
                                <option value="5.669904625">Stone (US)</option>
                                <option value="6.35029318">Stone (UK)</option>
                                <option value="1000">Tonne [t]</option>
                                <option value="0.0015551738">Pennyweight [pwt]</option>
                                <option value="0.0012959782">Scruple (apothecary) [s.ap]</option>
                                <option value="6.47989E-5">Grain [gr]</option>
                                <option value="1.0E-9">Gamma</option>
                                <option value="34.2">Talent (Biblical Hebrew)</option>
                                <option value="0.57">Mina (Biblical Hebrew)</option>
                                <option value="0.0114">Shekel (Biblical Hebrew)</option>
                                <option value="0.0057">Bekan (Biblical Hebrew)</option>
                                <option value="0.00057">Gerah (Biblical Hebrew)</option>
                                <option value="20.4">Talent (Biblical Greek)</option>
                                <option value="0.34">Mina (Biblical Greek)</option>
                                <option value="0.0136">Tetradrachma (Biblical Greek)</option>
                                <option value="0.0068">Didrachma (Biblical Greek)</option>
                                <option value="0.0034">Drachma (Biblical Greek)</option>
                                <option value="0.00385">Denarius (Biblical Roman)</option>
                                <option value="0.000240625">Assarion (Biblical Roman)</option>
                                <option value="6.01563E-5">Quadrans (Biblical Roman)</option>
                                <option value="3.00781E-5">Lepton (Biblical Roman)</option>
                                <option value="2.17671E-8">Planck mass</option>
                                <option value="9.1093897E-31">Electron mass (rest)</option>
                                <option value="1.8835327E-28">Muon mass</option>
                                <option value="1.6726231E-27">Proton mass</option>
                                <option value="1.6749286E-27">Neutron mass</option>
                                <option value="3.343586E-27">Deuteron mass</option>
                                <option value="5.9760000000002E+24">Earth's mass</option>
                                <option value="2.0E+30">Sun's mass</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="uctounit">To (Result 1):</label>
                            <select class="form-control" id="uctounit" onchange="ucUpdateResult()">
                                <option value="1">Kilogram [kg]</option>
                                <option value="0.001">Gram [g]</option>
                                <option value="1.0E-6">Milligram [mg]</option>
                                <option value="1000">Ton (metric) [t]</option>
                                <option value="0.45359237">Pound [lbs]</option>
                                <option value="0.0283495231">Ounce [oz]</option>
                                <option value="0.0002">Carat [car, ct]</option>
                                <option value="907.18474">Ton (short) [ton (US)]</option>
                                <option value="1016.0469088">Ton (long) [ton (UK)]</option>
                                <option value="1.6605402E-27">Atomic mass unit [u]</option>
                                <option value="1.0E+15">Exagram [Eg]</option>
                                <option value="1000000000000">Petagram [Pg]</option>
                                <option value="1000000000">Teragram [Tg]</option>
                                <option value="1000000">Gigagram [Gg]</option>
                                <option value="1000">Megagram [Mg]</option>
                                <option value="0.1">Hectogram [hg]</option>
                                <option value="0.01">Dekagram [dag]</option>
                                <option value="0.0001">Decigram [dg]</option>
                                <option value="1.0E-5">Centigram [cg]</option>
                                <option value="1.0E-9">Microgram [µg]</option>
                                <option value="1.0E-12">Nanogram [ng]</option>
                                <option value="1.0E-15">Picogram [pg]</option>
                                <option value="1.0E-18">Femtogram [fg]</option>
                                <option value="1.0E-21">Attogram [ag]</option>
                                <option value="1.6605300000013E-27">Dalton</option>
                                <option value="9.80665">Kilogram-force square second/meter</option>
                                <option value="453.59237">Kilopound [kip]</option>
                                <option value="453.59237">Kip</option>
                                <option value="14.5939029372">Slug</option>
                                <option value="14.5939029372">Pound-force square second/foot</option>
                                <option value="0.3732417216">Pound (troy or apothecary)</option>
                                <option value="0.0140867196">Poundal [pdl]</option>
                                <option value="0.02916667">Ton (assay) (US) [AT (US)]</option>
                                <option value="0.0326666667">Ton (assay) (UK) [AT (UK)]</option>
                                <option value="1000000">Kiloton (metric) [kt]</option>
                                <option value="100">Quintal (metric) [cwt]</option>
                                <option value="45.359237">Hundredweight (US)</option>
                                <option value="50.80234544">Hundredweight (UK)</option>
                                <option value="11.33980925">Quarter (US) [qr (US)]</option>
                                <option value="12.70058636">Quarter (UK) [qr (UK)]</option>
                                <option value="5.669904625">Stone (US)</option>
                                <option value="6.35029318">Stone (UK)</option>
                                <option value="1000">Tonne [t]</option>
                                <option value="0.0015551738">Pennyweight [pwt]</option>
                                <option value="0.0012959782">Scruple (apothecary) [s.ap]</option>
                                <option value="6.47989E-5">Grain [gr]</option>
                                <option value="1.0E-9">Gamma</option>
                                <option value="34.2">Talent (Biblical Hebrew)</option>
                                <option value="0.57">Mina (Biblical Hebrew)</option>
                                <option value="0.0114">Shekel (Biblical Hebrew)</option>
                                <option value="0.0057">Bekan (Biblical Hebrew)</option>
                                <option value="0.00057">Gerah (Biblical Hebrew)</option>
                                <option value="20.4">Talent (Biblical Greek)</option>
                                <option value="0.34">Mina (Biblical Greek)</option>
                                <option value="0.0136">Tetradrachma (Biblical Greek)</option>
                                <option value="0.0068">Didrachma (Biblical Greek)</option>
                                <option value="0.0034">Drachma (Biblical Greek)</option>
                                <option value="0.00385">Denarius (Biblical Roman)</option>
                                <option value="0.000240625">Assarion (Biblical Roman)</option>
                                <option value="6.01563E-5">Quadrans (Biblical Roman)</option>
                                <option value="3.00781E-5">Lepton (Biblical Roman)</option>
                                <option value="2.17671E-8">Planck mass</option>
                                <option value="9.1093897E-31">Electron mass (rest)</option>
                                <option value="1.8835327E-28">Muon mass</option>
                                <option value="1.6726231E-27">Proton mass</option>
                                <option value="1.6749286E-27">Neutron mass</option>
                                <option value="3.343586E-27">Deuteron mass</option>
                                <option value="5.9760000000002E+24">Earth's mass</option>
                                <option value="2.0E+30">Sun's mass</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ucto">Converted Weight Result 1:</label>
                            <input type="text" class="form-control" id="ucto" readonly>
                        </div>

                        <div class="form-group">
                            <label for="uctounit2">To (Result 2):</label>
                            <select class="form-control" id="uctounit2" onchange="ucUpdateResult2()">
                                <option value="1">Kilogram [kg]</option>
                                <option value="0.001">Gram [g]</option>
                                <option value="1.0E-6">Milligram [mg]</option>
                                <option value="1000">Ton (metric) [t]</option>
                                <option value="0.45359237">Pound [lbs]</option>
                                <option value="0.0283495231">Ounce [oz]</option>
                                <option value="0.0002">Carat [car, ct]</option>
                                <option value="907.18474">Ton (short) [ton (US)]</option>
                                <option value="1016.0469088">Ton (long) [ton (UK)]</option>
                                <option value="1.6605402E-27">Atomic mass unit [u]</option>
                                <option value="1.0E+15">Exagram [Eg]</option>
                                <option value="1000000000000">Petagram [Pg]</option>
                                <option value="1000000000">Teragram [Tg]</option>
                                <option value="1000000">Gigagram [Gg]</option>
                                <option value="1000">Megagram [Mg]</option>
                                <option value="0.1">Hectogram [hg]</option>
                                <option value="0.01">Dekagram [dag]</option>
                                <option value="0.0001">Decigram [dg]</option>
                                <option value="1.0E-5">Centigram [cg]</option>
                                <option value="1.0E-9">Microgram [µg]</option>
                                <option value="1.0E-12">Nanogram [ng]</option>
                                <option value="1.0E-15">Picogram [pg]</option>
                                <option value="1.0E-18">Femtogram [fg]</option>
                                <option value="1.0E-21">Attogram [ag]</option>
                                <option value="1.6605300000013E-27">Dalton</option>
                                <option value="9.80665">Kilogram-force square second/meter</option>
                                <option value="453.59237">Kilopound [kip]</option>
                                <option value="453.59237">Kip</option>
                                <option value="14.5939029372">Slug</option>
                                <option value="14.5939029372">Pound-force square second/foot</option>
                                <option value="0.3732417216">Pound (troy or apothecary)</option>
                                <option value="0.0140867196">Poundal [pdl]</option>
                                <option value="0.02916667">Ton (assay) (US) [AT (US)]</option>
                                <option value="0.0326666667">Ton (assay) (UK) [AT (UK)]</option>
                                <option value="1000000">Kiloton (metric) [kt]</option>
                                <option value="100">Quintal (metric) [cwt]</option>
                                <option value="45.359237">Hundredweight (US)</option>
                                <option value="50.80234544">Hundredweight (UK)</option>
                                <option value="11.33980925">Quarter (US) [qr (US)]</option>
                                <option value="12.70058636">Quarter (UK) [qr (UK)]</option>
                                <option value="5.669904625">Stone (US)</option>
                                <option value="6.35029318">Stone (UK)</option>
                                <option value="1000">Tonne [t]</option>
                                <option value="0.0015551738">Pennyweight [pwt]</option>
                                <option value="0.0012959782">Scruple (apothecary) [s.ap]</option>
                                <option value="6.47989E-5">Grain [gr]</option>
                                <option value="1.0E-9">Gamma</option>
                                <option value="34.2">Talent (Biblical Hebrew)</option>
                                <option value="0.57">Mina (Biblical Hebrew)</option>
                                <option value="0.0114">Shekel (Biblical Hebrew)</option>
                                <option value="0.0057">Bekan (Biblical Hebrew)</option>
                                <option value="0.00057">Gerah (Biblical Hebrew)</option>
                                <option value="20.4">Talent (Biblical Greek)</option>
                                <option value="0.34">Mina (Biblical Greek)</option>
                                <option value="0.0136">Tetradrachma (Biblical Greek)</option>
                                <option value="0.0068">Didrachma (Biblical Greek)</option>
                                <option value="0.0034">Drachma (Biblical Greek)</option>
                                <option value="0.00385">Denarius (Biblical Roman)</option>
                                <option value="0.000240625">Assarion (Biblical Roman)</option>
                                <option value="6.01563E-5">Quadrans (Biblical Roman)</option>
                                <option value="3.00781E-5">Lepton (Biblical Roman)</option>
                                <option value="2.17671E-8">Planck mass</option>
                                <option value="9.1093897E-31">Electron mass (rest)</option>
                                <option value="1.8835327E-28">Muon mass</option>
                                <option value="1.6726231E-27">Proton mass</option>
                                <option value="1.6749286E-27">Neutron mass</option>
                                <option value="3.343586E-27">Deuteron mass</option>
                                <option value="5.9760000000002E+24">Earth's mass</option>
                                <option value="2.0E+30">Sun's mass</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ucto2">Converted Weight Result 2:</label>
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