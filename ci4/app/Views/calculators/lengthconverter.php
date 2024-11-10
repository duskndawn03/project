<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Length Converter</title>

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
                <!-- <section class="length-converter-section"> -->
                <!-- <h2 class="text-center mt-5">Length Unit Converter</h2> -->
                <!-- <br> -->
                <!-- <div class="container"> -->
                <!-- <div class="row justify-content-center"> -->
                <!-- <div class="col-md-6"> -->
                <div class="converter-form">
                    <form>
                        <div class="form-group">
                            <label for="ucfrom">Enter Length:</label>
                            <input type="number" class="form-control" id="ucfrom" oninput="ucUpdateResult(); ucUpdateResult2();">
                        </div>

                        <div class="form-group">
                            <label for="ucfromunit">From:</label>
                            <select class="form-control" id="ucfromunit" onchange="ucUpdateResult(); ucUpdateResult2();">
                                <option value="1">Meter [m]</option>
                                <option value="1000">Kilometer [km]</option>
                                <option value="0.1">Decimeter [dm]</option>
                                <option value="0.01">Centimeter [cm]</option>
                                <option value="0.001">Millimeter [mm]</option>
                                <option value="1.0E-6">Micrometer [µm]</option>
                                <option value="1.0E-9">Nanometer [nm]</option>
                                <option value="1609.344">Mile [mi]</option>
                                <option value="0.9144">Yard [yd]</option>
                                <option value="0.3048">Foot [ft]</option>
                                <option value="0.0254">Inch [in]</option>
                                <option value="9.46073047258E+15">Light year [ly]</option>
                                <option value="1.0E+18">Exameter [Em]</option>
                                <option value="1.0E+15">Petameter [Pm]</option>
                                <option value="1000000000000">Terameter [Tm]</option>
                                <option value="1000000000">Gigameter [Gm]</option>
                                <option value="1000000">Megameter [Mm]</option>
                                <option value="100">Hectometer [hm]</option>
                                <option value="10">Dekameter [dam]</option>
                                <option value="1.0E-6">Micron [µ]</option>
                                <option value="1.0E-12">Picometer [pm]</option>
                                <option value="1.0E-15">Femtometer [fm]</option>
                                <option value="1.0E-18">Attometer [am]</option>
                                <option value="3.08567758128E+22">Megaparsec [Mpc]</option>
                                <option value="3.08567758128E+19">Kiloparsec [kpc]</option>
                                <option value="3.08567758128E+16">Parsec [pc]</option>
                                <option value="149597870691">Astronomical unit [AU]</option>
                                <option value="4828.032">League [lea]</option>
                                <option value="5559.552">Nautical league (UK)</option>
                                <option value="5556">Nautical league (int.)</option>
                                <option value="1853.184">Nautical mile (UK)</option>
                                <option value="1852">Nautical mile (international)</option>
                                <option value="1609.3472186944">Mile (US survey)</option>
                                <option value="201.168">Furlong [fur]</option>
                                <option value="20.1168">Chain [ch]</option>
                                <option value="6.096">Rope</option>
                                <option value="5.0292">Rod [rd]</option>
                                <option value="1.8288">Fathom [fath]</option>
                                <option value="1.143">Ell</option>
                                <option value="0.4572">Cubit (UK)</option>
                                <option value="0.1016">Hand</option>
                                <option value="0.2286">Span (cloth)</option>
                                <option value="0.1143">Finger (cloth)</option>
                                <option value="0.05715">Nail (cloth)</option>
                                <option value="0.0084666667">Barleycorn</option>
                                <option value="2.54E-5">Mil [mil]</option>
                                <option value="2.54E-8">Microinch</option>
                                <option value="1.0E-10">Angstrom [A]</option>
                                <option value="1.61605E-35">Planck length</option>
                                <option value="5.2917724900001E-11">Bohr radius</option>
                                <option value="696000000">Sun's radius</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="uctounit">To (Result 1):</label>
                            <select class="form-control" id="uctounit" onchange="ucUpdateResult()">
                                <option value="1">Meter [m]</option>
                                <option value="1000">Kilometer [km]</option>
                                <option value="0.1">Decimeter [dm]</option>
                                <option value="0.01">Centimeter [cm]</option>
                                <option value="0.001">Millimeter [mm]</option>
                                <option value="1.0E-6">Micrometer [µm]</option>
                                <option value="1.0E-9">Nanometer [nm]</option>
                                <option value="1609.344">Mile [mi]</option>
                                <option value="0.9144">Yard [yd]</option>
                                <option value="0.3048">Foot [ft]</option>
                                <option value="0.0254">Inch [in]</option>
                                <option value="9.46073047258E+15">Light year [ly]</option>
                                <option value="1.0E+18">Exameter [Em]</option>
                                <option value="1.0E+15">Petameter [Pm]</option>
                                <option value="1000000000000">Terameter [Tm]</option>
                                <option value="1000000000">Gigameter [Gm]</option>
                                <option value="1000000">Megameter [Mm]</option>
                                <option value="100">Hectometer [hm]</option>
                                <option value="10">Dekameter [dam]</option>
                                <option value="1.0E-6">Micron [µ]</option>
                                <option value="1.0E-12">Picometer [pm]</option>
                                <option value="1.0E-15">Femtometer [fm]</option>
                                <option value="1.0E-18">Attometer [am]</option>
                                <option value="3.08567758128E+22">Megaparsec [Mpc]</option>
                                <option value="3.08567758128E+19">Kiloparsec [kpc]</option>
                                <option value="3.08567758128E+16">Parsec [pc]</option>
                                <option value="149597870691">Astronomical unit [AU]</option>
                                <option value="4828.032">League [lea]</option>
                                <option value="5559.552">Nautical league (UK)</option>
                                <option value="5556">Nautical league (int.)</option>
                                <option value="1853.184">Nautical mile (UK)</option>
                                <option value="1852">Nautical mile (international)</option>
                                <option value="1609.3472186944">Mile (US survey)</option>
                                <option value="201.168">Furlong [fur]</option>
                                <option value="20.1168">Chain [ch]</option>
                                <option value="6.096">Rope</option>
                                <option value="5.0292">Rod [rd]</option>
                                <option value="1.8288">Fathom [fath]</option>
                                <option value="1.143">Ell</option>
                                <option value="0.4572">Cubit (UK)</option>
                                <option value="0.1016">Hand</option>
                                <option value="0.2286">Span (cloth)</option>
                                <option value="0.1143">Finger (cloth)</option>
                                <option value="0.05715">Nail (cloth)</option>
                                <option value="0.0084666667">Barleycorn</option>
                                <option value="2.54E-5">Mil [mil]</option>
                                <option value="2.54E-8">Microinch</option>
                                <option value="1.0E-10">Angstrom [A]</option>
                                <option value="1.61605E-35">Planck length</option>
                                <option value="5.2917724900001E-11">Bohr radius</option>
                                <option value="696000000">Sun's radius</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ucto">Converted Length Result 1:</label>
                            <input type="text" class="form-control" id="ucto" readonly>
                        </div>

                        <div class="form-group">
                            <label for="uctounit2">To (Result 2):</label>
                            <select class="form-control" id="uctounit2" onchange="ucUpdateResult2()">
                                <option value="1">Meter [m]</option>
                                <option value="1000">Kilometer [km]</option>
                                <option value="0.1">Decimeter [dm]</option>
                                <option value="0.01">Centimeter [cm]</option>
                                <option value="0.001">Millimeter [mm]</option>
                                <option value="1.0E-6">Micrometer [µm]</option>
                                <option value="1.0E-9">Nanometer [nm]</option>
                                <option value="1609.344">Mile [mi]</option>
                                <option value="0.9144">Yard [yd]</option>
                                <option value="0.3048">Foot [ft]</option>
                                <option value="0.0254">Inch [in]</option>
                                <option value="9.46073047258E+15">Light year [ly]</option>
                                <option value="1.0E+18">Exameter [Em]</option>
                                <option value="1.0E+15">Petameter [Pm]</option>
                                <option value="1000000000000">Terameter [Tm]</option>
                                <option value="1000000000">Gigameter [Gm]</option>
                                <option value="1000000">Megameter [Mm]</option>
                                <option value="100">Hectometer [hm]</option>
                                <option value="10">Dekameter [dam]</option>
                                <option value="1.0E-6">Micron [µ]</option>
                                <option value="1.0E-12">Picometer [pm]</option>
                                <option value="1.0E-15">Femtometer [fm]</option>
                                <option value="1.0E-18">Attometer [am]</option>
                                <option value="3.08567758128E+22">Megaparsec [Mpc]</option>
                                <option value="3.08567758128E+19">Kiloparsec [kpc]</option>
                                <option value="3.08567758128E+16">Parsec [pc]</option>
                                <option value="149597870691">Astronomical unit [AU]</option>
                                <option value="4828.032">League [lea]</option>
                                <option value="5559.552">Nautical league (UK)</option>
                                <option value="5556">Nautical league (int.)</option>
                                <option value="1853.184">Nautical mile (UK)</option>
                                <option value="1852">Nautical mile (international)</option>
                                <option value="1609.3472186944">Mile (US survey)</option>
                                <option value="201.168">Furlong [fur]</option>
                                <option value="20.1168">Chain [ch]</option>
                                <option value="6.096">Rope</option>
                                <option value="5.0292">Rod [rd]</option>
                                <option value="1.8288">Fathom [fath]</option>
                                <option value="1.143">Ell</option>
                                <option value="0.4572">Cubit (UK)</option>
                                <option value="0.1016">Hand</option>
                                <option value="0.2286">Span (cloth)</option>
                                <option value="0.1143">Finger (cloth)</option>
                                <option value="0.05715">Nail (cloth)</option>
                                <option value="0.0084666667">Barleycorn</option>
                                <option value="2.54E-5">Mil [mil]</option>
                                <option value="2.54E-8">Microinch</option>
                                <option value="1.0E-10">Angstrom [A]</option>
                                <option value="1.61605E-35">Planck length</option>
                                <option value="5.2917724900001E-11">Bohr radius</option>
                                <option value="696000000">Sun's radius</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ucto2">Converted Length Result 2:</label>
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