<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Business Directory</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
  <!-- Header Section Begin -->
  <?= view('header'); ?>
  <!-- Header Section End -->

  <div class="container-fluid">
    <div class="row g-0">
      <ul class="list-inline d-flex justify-content-center">
        <?php for ($ascii = 65; $ascii <= 90; $ascii++): ?>
          <li class="list-inline-item fs-3">
            <a href="<?= base_url('business/category/search/' . strtolower(chr($ascii))) ?>">
              <span class="badge bg-primary"><?= chr($ascii) ?></span>
            </a>
          </li>
        <?php endfor; ?>
      </ul>
    </div>
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
    <div class="row g-0 justify-content-center">
      <div class="col-md-8">
        <form class="d-flex justify-content-center">
          <!-- First Input Field: Find Business -->
          <div class="input-group me-2">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Find business" aria-label="Find business">
          </div>

          <!-- Second Input Field: Location -->
          <div class="input-group me-2">
            <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
            <input type="text" class="form-control" id="location-input" placeholder="Location" aria-label="Location">
          </div>

          <!-- Search Button -->
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>
    </div>

    <div class="row g-0 mt-4"> <!-- Add no-gutters to remove extra padding between columns -->
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
  </div>

  <?= view('footer'); ?>

</body>
</html>