<?php
include '../../config/baseurl.php';
include '../../config/config.php';

// Fetch jobs from the database
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);
$jobs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row; // Store jobs in an array
    }
}

// Default selected job
$selectedJob = !empty($jobs) ? $jobs[0] : null;
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
        <div class="row">
            <!-- First Grid - Quick Links -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Quick Links</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Job Listings</a></li>
                            <li><a href="#">Companies</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Second Grid -->
            <div class="col-md-8">
                <!-- First Row: Headline -->
                <div class="row mb-3">
                    <div class="col">
                        <h3>Find the Right Jobs</h3>
                    </div>
                </div>

                <!-- Second Row: Categories -->
                <div class="row mb-3 text-center">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5>Live Jobs</h5>
                                <p>(2)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5>Vacancies</h5>
                                <p>(3)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5>Companies</h5>
                                <p>(5)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5>New Jobs</h5>
                                <p>(4)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third Row: Search Bar -->
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Keyword">
                    </div>
                    <div class="col-md-4">
                        <select class="form-control">
                            <option selected>Organization or company name</option>
                            <option value="1">Area or Location</option>
                            <option value="2">Job Position or designation</option>
                            <option value="3">Job category</option>
                            <option value="4">Salary range</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container-fluid">
        <div class="row">
            <!-- First Grid - Job List -->
            <div class="col-md-3">
                <?php foreach ($jobs as $job): ?>
                    <div class="card mb-3 job-card" data-job-id="<?php echo $job['id']; ?>">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-between align-items-center">
                                <?php echo htmlspecialchars($job['jobs_post_name']); ?>
                                <span class="badge bg-info"><?php echo htmlspecialchars($job['jobs_expertise_level']); ?></span>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($job['jobs_company_name']); ?></h6>
                            <p class="card-text"><?php echo htmlspecialchars($job['jobs_skills']); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars($job['jobs_description']); ?></p>
                            <p class="card-text"><strong>Salary:</strong> $<?php echo htmlspecialchars($job['jobs_salary']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Second Grid - Selected Job Details -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h5><?php echo htmlspecialchars($selectedJob['jobs_post_name']); ?></h5>
                        <h6 class="text-muted"><?php echo htmlspecialchars($selectedJob['jobs_company_name']); ?></h6>
                        <p><?php echo htmlspecialchars($selectedJob['jobs_skills']); ?></p>
                        <p><?php echo htmlspecialchars($selectedJob['jobs_description']); ?></p>
                        <p><strong>Salary:</strong> $<?php echo htmlspecialchars($selectedJob['jobs_salary']); ?></p>
                        <p><strong>Expertise Level:</strong> <?php echo htmlspecialchars($selectedJob['jobs_expertise_level']); ?></p>
                    </div>
                </div>
            </div>

            <!-- Third Grid - Advertisement -->
            <div class="col-md-2">
                <div class="card">
                    <img src="<?php echo $baseurl; ?>/assets/img/instagram/insta-1.jpg" class="card-img-top" alt="Advertisement">
                    <div class="card-body">
                        <h5 class="card-title">Advertisement Title</h5>
                        <p class="card-text">This is an advertisement description that will provide more details about the ad.</p>
                    </div>
                </div>
            </div>
        </div> <!-- End of Row -->
    </div> <!-- End of Container Fluid -->



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