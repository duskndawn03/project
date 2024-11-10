<?php include '../../config/baseurl.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date & Time calculator</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI CDN -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

</head>

<body>

    <?= view('header');?>

    <div class="container-fluid my-4">
        <div class="row g-4">

            <div class="col-lg-3 col-md-3 border-end">
                <!-- Age Calculator Section -->
                <h2>Age Calculator</h2>
                <p>Enter your Date of Birth:</p>
                <div class="d-flex align-items-center">
                    <select id="month" class="form-control w-25">
                        <option value="">Month</option>
                        <option value="0">January</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                        <option value="4">May</option>
                        <option value="5">June</option>
                        <option value="6">July</option>
                        <option value="7">August</option>
                        <option value="8">September</option>
                        <option value="9">October</option>
                        <option value="10">November</option>
                        <option value="11">December</option>
                    </select>
                    <select id="day" class="form-control w-25 ml-2">
                        <option value="">Day</option>
                    </select>
                    <input type="number" id="year" class="form-control w-25 ml-2" placeholder="Year" min="1900" max="2100">
                </div>
                <button class="btn btn-danger mt-3" onclick="calculateAge()">Calculate</button>
                <br>
                <span id="ageResult" class="output"></span>
            </div>



            <div class="col-lg-6 col-md-6 border-end">
                <!-- Time Calculator Section -->
                <h3>Time Difference Calculator</h3>
                <div class="form-group row">
                    <label for="startTime" class="col-sm-3 col-form-label text-right">Start Time:</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" id="startTime" class="form-control w-75">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endTime" class="col-sm-3 col-form-label text-right">End Time:</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" id="endTime" class="form-control w-75">
                    </div>
                </div>

                <!-- Redesigned Holidays and Workdays Section -->
                <div class="section">
                    <div>
                        <h4>Select Holidays</h4>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="friday" class="form-check-input">
                            <label for="friday" class="form-check-label">Friday</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="saturday" class="form-check-input">
                            <label for="saturday" class="form-check-label">Saturday</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="sunday" class="form-check-input">
                            <label for="sunday" class="form-check-label">Sunday</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="number" id="optionalHolidays" class="form-control" placeholder="Optional Holidays" style="width: 100%;">
                        </div>
                    </div>

                    <div>
                        <h4>Extra Workdays</h4>
                        <input type="number" id="extraWorkDays" class="form-control" placeholder="Enter extra workdays">
                    </div>
                </div>

                <!-- Calculate Button -->
                <button class="btn btn-danger mt-2" onclick="calculateTime()">Calculate</button>

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

    <?= view('footer');?>

    <!-- age calculator script-->
    <script>
        document.getElementById("month").addEventListener("change", updateDays);

        function updateDays() {
            const month = parseInt(document.getElementById("month").value);
            const year = parseInt(document.getElementById("year").value);
            const daySelect = document.getElementById("day");

            daySelect.innerHTML = '<option value="">Day</option>'; // Reset days

            if (!isNaN(month)) {
                const daysInMonth = new Date(year, month + 1, 0).getDate(); // Get last day of the month
                for (let day = 1; day <= daysInMonth; day++) {
                    daySelect.innerHTML += `<option value="${day}">${day}</option>`;
                }
            }
        }

        function calculateAge() {
            const month = parseInt(document.getElementById("month").value);
            const day = parseInt(document.getElementById("day").value);
            const year = parseInt(document.getElementById("year").value);

            if (isNaN(month) || isNaN(day) || isNaN(year)) {
                document.getElementById("ageResult").innerHTML = "Please select a valid date of birth.";
                return;
            }

            const dobDate = new Date(year, month, day);
            const today = new Date();

            let ageInYears = today.getFullYear() - dobDate.getFullYear();
            const monthDiff = today.getMonth() - dobDate.getMonth();
            const dayDiff = today.getDate() - dobDate.getDate();

            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                ageInYears--;
            }

            const months = monthDiff < 0 ? monthDiff + 12 : monthDiff;
            const days = dayDiff < 0 ? new Date(today.getFullYear(), today.getMonth(), 0).getDate() + dayDiff : dayDiff;

            // Calculate total days, weeks, hours, minutes, and seconds
            const totalDays = Math.floor((today - dobDate) / (1000 * 60 * 60 * 24));
            const totalWeeks = Math.floor(totalDays / 7);
            const totalMonths = ageInYears * 12 + months;

            const totalHours = totalDays * 24;
            const totalMinutes = totalHours * 60;
            const totalSeconds = totalMinutes * 60;

            // Format result strings
            const ageResult = `
        You are:<br>
        ${ageInYears} years ${months} months ${days} days old <br>
        or ${totalMonths} months ${days} days old <br>
        or ${totalWeeks} weeks ${days} days old <br>
        or ${totalDays} days old <br>
        or ${totalHours.toLocaleString()} hours old <br>
        or ${totalMinutes.toLocaleString()} minutes old <br>
        or ${totalSeconds.toLocaleString()} seconds old
    `;

            document.getElementById("ageResult").innerHTML = ageResult;
        }
    </script>

    <!-- time calculator script -->
    <script>
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

            let timeDiff = (end - start) / 1000; // Difference in seconds

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