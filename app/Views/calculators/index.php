<!DOCTYPE html>
<html lang="en">

<head>
    <title>Calculators</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI CDN -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
           /* Hover effect to show dropdown on hover */
.nav-item.dropdown:hover .dropdown-menu {
    display: block;
}

/* Optional: Add a transition for smooth opening */
.nav-item.dropdown .dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    padding: 5px 0;
    margin: 0;
    background-color: #fff;
    border-radius: 0.375rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    transition: all 0.3s ease;
}
/* Optional: add transitions for smooth opening */
.dropdown-menu {
    transition: opacity 0.3s ease;
}
    </style>
</head>

<body>

    <?= view('header');?>

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <h2 class="card-header">Math</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Percentage Calculator</li>
                        <li class="list-group-item">Percentage Error Calculator</li>
                        <li class="list-group-item">Percent Given Value Calculator</li>
                        <li class="list-group-item">Value Given Percent Calculator</li>
                    </ul>
                    <a href="#" class="card-footer">See more</a>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <h2 class="card-header">Geometry</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Area Calculator</li>
                        <li class="list-group-item">Volume Calculator</li>
                        <li class="list-group-item">Surface Calculator</li>
                        <li class="list-group-item">Circle Calculator</li>
                    </ul>
                    <a href="#" class="card-footer">See more</a>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <h2 class="card-header">Finance</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Mortgage Calculator</li>
                        <li class="list-group-item">Loan Calculator</li>
                        <li class="list-group-item">Auto Loan Calculator</li>
                        <li class="list-group-item">Interest Calculator</li>
                    </ul>
                    <a href="#" class="card-footer">See more</a>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <h2 class="card-header">Physics</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Acceleration Calculator</li>
                        <li class="list-group-item">Work Calculator</li>
                        <li class="list-group-item">Kinetic Energy Calculator</li>
                        <li class="list-group-item">Gravitational Force Calculator</li>
                    </ul>
                    <a href="#" class="card-footer">See more</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <h2 class="card-header">Converters</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="<?php echo base_url(); ?>study/calculators/length">Length Converter</a></li>
                        <li class="list-group-item"><a href="<?php echo base_url(); ?>study/calculators/area">Area Converter</a></li>
                        <li class="list-group-item"><a href="<?php echo base_url(); ?>study/calculators/weight">Weight Converter</a></li>
                        <li class="list-group-item"><a href="<?php echo base_url(); ?>study/calculators/temperature">Temperature Converter</a></li>
                    </ul>
                    <a href="#" class="card-footer">See more</a>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <h2 class="card-header">Date Time</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="<?php echo base_url(); ?>study/calculators/datetime">Date & Time Calculator</a></li>
                        <li class="list-group-item">Hours Calculator</li>
                        <li class="list-group-item">24-Hours Clock Calculator</li>
                        <li class="list-group-item">Date Calculator</li>
                    </ul>
                    <a href="#" class="card-footer">See more</a>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <h2 class="card-header">Cooking</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cooking Measurement Converter</li>
                        <li class="list-group-item">Cooking Ingredient Converter</li>
                        <li class="list-group-item">Cake Pan Converter</li>
                    </ul>
                    <a href="#" class="card-footer">See more</a>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <h2 class="card-header">Fitness</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">BMI Calculator</li>
                        <li class="list-group-item">Calorie Calculator</li>
                        <li class="list-group-item">BMR Calculator</li>
                        <li class="list-group-item">Body Fat Calculator</li>
                    </ul>
                    <a href="#" class="card-footer">See more</a>
                </div>
            </div>
        </div>

    </div>

    <?= view('footer');?>
    
</body>

</html>