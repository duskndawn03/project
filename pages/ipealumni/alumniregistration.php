<?php
session_start(); // Start the session

// Check if there's a success message and store it in a variable
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
// Clear the message after displaying it
unset($_SESSION['success_message']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Alumni</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/style.css" type="text/css">

    </style>
</head>
<body>

    <?php include '../../includes/header.php'?>

    <!-- Registration Form Section Begin -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Register as Alumni</h2>

        <!-- Display success message if available -->
        <?php if ($success_message): ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($success_message); ?>
            </div>
        <?php endif; ?>

        <!-- Registration form goes here -->
        <form action="<?php echo $baseurl;?>/functions/register_alumni.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="graduationInstitute">Graduation Institute</label>
                    <input type="text" class="form-control" id="graduationInstitute" name="graduation_institute" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="admissionYear">Admission Year</label>
                    <input type="number" class="form-control" id="admissionYear" name="admission_year" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="batchNameNo">Batch Name & No</label>
                    <input type="text" class="form-control" id="batchNameNo" name="batch_name_no" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="rollNo">Roll No.</label>
                    <input type="text" class="form-control" id="rollNo" name="roll_no" required>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="contactNo">Contact No.</label>
                <input type="tel" class="form-control" id="contactNo" name="contact_no" required>
            </div>

            <div class="form-group">
                <label for="additionalContact">Additional Contact No.</label>
                <input type="tel" class="form-control" id="additionalContact" name="additional_contact">
            </div>
            <div class="form-group">
                <label for="emailAddress">Email Address</label>
                <input type="email" class="form-control" id="emailAddress" name="email_address" required>
            </div>

            <div class="form-group">
                <label for="additionalEmail">Additional Email Address</label>
                <input type="email" class="form-control" id="additionalEmail" name="additional_email">
            </div>
            <div class="form-group">
                <label for="fbIdLink">Facebook Profile Link</label>
                <input type="url" class="form-control" id="fbIdLink" name="fb_id_link">
            </div>
            <div class="form-group">
                <label for="linkedinIdLink">LinkedIn Profile Link</label>
                <input type="url" class="form-control" id="linkedinIdLink" name="linkedin_id_link">
            </div>
            <div class="form-group">
                <label for="bloodGroup">Blood Group</label>
                <input type="text" class="form-control" id="bloodGroup" name="blood_group">
            </div>
            <div class="form-group">
                <label for="currentOccupation">Current Occupation</label>
                <input type="text" class="form-control" id="currentOccupation" name="current_occupation">
            </div>
            <div class="form-group">
                <label for="institutionName">Institution Name</label>
                <input type="text" class="form-control" id="institutionName" name="institution_name">
            </div>
            <div class="form-group">
                <label for="professionalHistory">Professional History</label>
                <textarea class="form-control" id="professionalHistory" name="professional_history"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="presentAddress">Present Address</label>
                    <input type="text" class="form-control" id="presentAddress" name="present_address">
                </div>
                <div class="form-group col-md-6">
                    <label for="permanentAddress">Permanent Address</label>
                    <input type="text" class="form-control" id="permanentAddress" name="permanent_address">
                </div>
            </div>
            <div class="form-group">
                <label for="areaOfExpertise">Area of Expertise</label>
                <input type="text" class="form-control" id="areaOfExpertise" name="area_of_expertise">
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php include '../../includes/footer.php'?>
    <!-- Registration Form Section End -->

    <!-- Js Plugins -->
    <script src="<?php echo $baseurl;?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/jquery.slicknav.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo $baseurl;?>/assets/js/main.js"></script>
</body>
</html>
