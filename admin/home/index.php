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

    <title>Home</title>

</head>
<body>

<?php include '../header.php';?>

<div class="container my-5">
    <h2 class="text-center mb-4">Photos</h2>

    <div class="accordion" id="accordionExample">

        <!-- Accordion Item 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Home logo
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <form action="upload.php" method="POST" enctype="multipart/form-data">
                      <div class="mb-3">
                          <label for="fileInput" class="form-label">Upload a logo:</label>
                          <input type="file" class="form-control" id="fileInput" name="logo" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Upload</button>
                  </form>
                </div>
            </div>
        </div>

        <!-- Accordion Item 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    What are the benefits of using Bootstrap?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Bootstrap provides a responsive grid system, pre-designed components, and extensive JavaScript plugins, making it easier to develop attractive and functional websites without extensive CSS knowledge.
                </div>
            </div>
        </div>

        <!-- Accordion Item 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    How do I install Bootstrap?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    You can install Bootstrap by including the CSS and JS files from a CDN in your HTML, or you can download the Bootstrap package and include it locally in your project.
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
