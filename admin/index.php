<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest Bootstrap CSS (v5.3.2) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Admin Panel Dashboard</title>
    <style>
        .main {
            padding: 20px;
        }
    </style>
</head>
<body>
    
<?php include 'header.php'?>

<!-- Main Content -->
<div class="main">
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3>Card 1</h3>
                    </div>
                    <div class="card-body">
                        <p>Some content for Card 1.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3>Card 2</h3>
                    </div>
                    <div class="card-body">
                        <p>Some content for Card 2.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3>Card 3</h3>
                    </div>
                    <div class="card-body">
                        <p>Some content for Card 3.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Latest jQuery (v3.6.4) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Latest Popper.js (v2.11.8) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<!-- Latest Bootstrap JS (v5.3.2) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
