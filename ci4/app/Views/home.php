<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- jQuery UI CDN -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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
  <?php include 'header.php'; ?>
  <!-- Header Section End -->

  <div class="container-fluid"> <!-- Change container to container-fluid for full-width -->
    <div class="row g-0"> <!-- Add no-gutters to remove extra padding between columns -->
      <!-- First grid item (3 grid spaces) -->
      <div class="col-lg-3 col-md-3 col-sm-12">
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

      <!-- Main Slide (6 grid spaces) -->
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card mb-4">
          <div class="img-wrapper">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-1.jpg" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Main Slide</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.lorem ipsum is a dummy text lorem ipsum is a dummy text lorem ipsum is a dummy text lorem ipsum is a dummy text</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>

      <!-- Second grid item (3 grid spaces) -->
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card mb-4">
          <div class="img-wrapper">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Advertisement portion</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Notice Bar -->
    <div class="row">
      <div class="col-12">
        <div class="notice-bar text-center py-2" style="background-color: #ffcc00; color: #000;">
          <strong>Notice:</strong> This is a sample notice text!
        </div>
      </div>
    </div>

    <div class="row g-0 mt-4"> <!-- Remove padding between columns -->
      <!-- First grid item (4 grid spaces) -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card mb-4">
          <div class="img-wrapper">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/photo1.jpg" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Advertisement Portion</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>

      <!-- Second grid item (4 grid spaces) -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card mb-4">
          <div class="img-wrapper">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-1.jpg" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Main Slide</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>

      <!-- Third grid item (4 grid spaces) -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card mb-4">
          <div class="img-wrapper">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
          </div>
          <div class="card-body">
            <h5 class="card-title">Advertisement Portion</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>

</body>
</html>