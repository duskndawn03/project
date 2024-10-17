<?php include '../../config/baseurl.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date & Time calculator</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl;?>/assets/css/style.css" type="text/css">

    <style>

        input, button {
            padding: 10px;
            margin: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .output {
            margin-top: 20px;
        }

        /* Style for form layout */
        .form-group {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px auto;
            max-width: 400px;

        }

        .form-group label {
            width: 120px;
            text-align: left;
            margin-right: 10px;
        }

        .form-group input {
            flex-grow: 1;
        }

        /* Align fields for output results */
        .result-group {
            margin: 20px auto;
            max-width: 600px;
        }

        .result-group label {
            width: 150px;
            text-align: left;
        }

        /* Redesigned Holidays and Workdays Section */
        .section {
            display: flex;
            justify-content: space-between;
            max-width: 600px;
            margin: 0 auto;
        }

        .section div {
            text-align: left;
            flex-basis: 45%;
        }

    </style>

</head>

<body>

    <?php include '../../includes/header.php'; ?>

    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-3">
                
            </div>
            <div class="col-lg-6 col-md-6">
                <!-- Age Calculator Section -->
                <h2>Age Calculator</h2>
                <p>Enter your Date of Birth:</p>
                <input type="date" id="dob" class="form-control w-50 mx-auto">
                <button class="btn btn-success mt-3" onclick="calculateAge()">Calculate Age</button>
                <h4 id="ageResult" class="output"></h4>



                <!-- Time Calculator Section -->

                <h3>Time Difference Calculator</h3>

                <div class="form-group row">
                    <label for="startTime" class="col-sm-3 col-form-label text-right">Start Time:</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" id="startTime" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endTime" class="col-sm-3 col-form-label text-right">End Time:</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" id="endTime" class="form-control">
                    </div>
                </div>

                <!-- Redesigned Holidays and Workdays Section -->

                <div class="section">
                    <div>
                        <h4>Select Holidays</h4>
                        <div class="form-check">
                            <input type="checkbox" id="friday" class="form-check-input">
                            <label for="friday" class="form-check-label">Friday</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="saturday" class="form-check-input">
                            <label for="saturday" class="form-check-label">Saturday</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="sunday" class="form-check-input">
                            <label for="sunday" class="form-check-label">Sunday</label>
                        </div>
                        <input type="number" id="optionalHolidays" class="form-control mt-2" placeholder="Optional Holidays">
                    </div>
                    <div>
                        <h4>Extra Workdays</h4>
                        <input type="number" id="extraWorkDays" class="form-control" placeholder="Enter extra workdays">
                    </div>
                </div>

                <br>

                <!-- Calculate Button -->
                <button class="btn btn-primary" onclick="calculateTime()">Calculate</button>

                <!-- Result Fields Section -->

                <div class="result-group">
                    <div class="form-group row">
                        <label for="overallField" class="col-sm-3 col-form-label text-right">Overall:</label>
                        <div class="col-sm-9">
                            <input type="text" id="overallField" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="yearsField" class="col-sm-3 col-form-label text-right">In Years:</label>
                        <div class="col-sm-9">
                            <input type="text" id="yearsField" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="monthsField" class="col-sm-3 col-form-label text-right">In Months:</label>
                        <div class="col-sm-9">
                            <input type="text" id="monthsField" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="daysField" class="col-sm-3 col-form-label text-right">In Days:</label>
                        <div class="col-sm-9">
                            <input type="text" id="daysField" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hoursField" class="col-sm-3 col-form-label text-right">In Hours:</label>
                        <div class="col-sm-9">
                            <input type="text" id="hoursField" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="minutesField" class="col-sm-3 col-form-label text-right">In Minutes:</label>
                        <div class="col-sm-9">
                            <input type="text" id="minutesField" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="secondsField" class="col-sm-3 col-form-label text-right">In Seconds:</label>
                        <div class="col-sm-9">
                            <input type="text" id="secondsField" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">

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
    <script>

        // Age Calculator Function
        function calculateAge() {
            const dob = document.getElementById("dob").value;
            if (dob === "") {
                document.getElementById("ageResult").innerHTML = "Please select a valid date of birth.";
                return;
            }

            const dobDate = new Date(dob);
            const today = new Date();

            let age = today.getFullYear() - dobDate.getFullYear();
            const monthDiff = today.getMonth() - dobDate.getMonth();
            const dayDiff = today.getDate() - dobDate.getDate();

            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age--;
            }

            document.getElementById("ageResult").innerHTML = `Your age is: ${age} years old.`;

        }

        // Time Difference Calculator Function
        function calculateTime() {
            const startTime = document.getElementById("startTime").value;
            const endTime = document.getElementById("endTime").value;

            if (startTime === "" || endTime === "") {
                alert("Please select valid start and end times.");
                return;
            }

            const start = new Date(startTime);
            const end = new Date(endTime);



            if (start > end) {

                alert("End time must be after start time.");

                return;

            }

            let timeDiff = (end - start) / 1000;  // Difference in seconds

            const totalSeconds = timeDiff;
            const totalMinutes = timeDiff / 60;
            const totalHours = timeDiff / 3600;
            const totalDays = timeDiff / 86400;
            const totalMonths = totalDays / 30.4375;
            const totalYears = totalDays / 365.25;

            // Handle holidays and workdays
            const fridayChecked = document.getElementById("friday").checked;
            const saturdayChecked = document.getElementById("saturday").checked;
            const sundayChecked = document.getElementById("sunday").checked;
            const optionalHolidays = parseInt(document.getElementById("optionalHolidays").value) || 0;
            const extraWorkDays = parseInt(document.getElementById("extraWorkDays").value) || 0;

            // Calculate holiday counts
            const fridayCount = calculateSpecificDayCount(start, end, 5);
            const saturdayCount = calculateSpecificDayCount(start, end, 6);
            const sundayCount = calculateSpecificDayCount(start, end, 0);

            let holidaysToSubtract = 0;
            if (fridayChecked) holidaysToSubtract += fridayCount;
            if (saturdayChecked) holidaysToSubtract += saturdayCount;
            if (sundayChecked) holidaysToSubtract += sundayCount;
            holidaysToSubtract += optionalHolidays;

            const netDays = totalDays - holidaysToSubtract + extraWorkDays;

            // Fill the result fields
            document.getElementById("yearsField").value = totalYears.toFixed(1);
            document.getElementById("monthsField").value = totalMonths.toFixed(1);
            document.getElementById("daysField").value = netDays.toFixed(0);
            document.getElementById("hoursField").value = totalHours.toFixed(0);
            document.getElementById("minutesField").value = totalMinutes.toFixed(0);
            document.getElementById("secondsField").value = totalSeconds.toFixed(0);

            // Fill the overall breakdown
            const overallText = `${Math.floor(totalYears)} years, ${Math.floor(totalMonths % 12)} months, ${Math.floor(netDays % 30.4375)} days, ${Math.floor(totalHours % 24)} hours, ${Math.floor(totalMinutes % 60)} minutes, ${Math.floor(totalSeconds % 60)} seconds`;
            document.getElementById("overallField").value = overallText;
        }

        // Helper function to calculate specific day count (0=Sunday, 1=Monday, ..., 6=Saturday)
        function calculateSpecificDayCount(start, end, dayIndex) {
            let count = 0;
            const current = new Date(start);
            while (current <= end) {
                if (current.getDay() === dayIndex) count++;
                current.setDate(current.getDate() + 1);
            }
            return count;
        }
    </script>
</body>
</html>