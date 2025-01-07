<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- jQuery UI CDN -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="https://wowslider.com/sliders/demo-23/engine1/style.css" />
  <!-- <script type="text/javascript" src="engine1/jquery.js"></script> -->
  <!-- End WOWSlider.com HEAD section -->

  <style type="text/css">
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

    /* Style for subcategories dropdown */
    .subcategory-list {
      display: none;
      position: absolute;
      left: 100%;
      top: 0;
      background-color: #f8f9fa;
      border: 1px solid #ddd;
      min-width: 200px;
      padding: 10px;
      z-index: 100;
    }

    /* Ensure category has relative position for absolute positioning of subcategory list */
    .category {
      position: relative;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    /* Show subcategories when the category is active */
    .category.active .subcategory-list {
      display: block;
    }

    .subcategory-list li a {
      padding: 8px 15px;
      color: #555;
      text-decoration: none;
      /* Remove underline */
    }

    .subcategory-list li a:hover {
      text-decoration: underline;
      /* Underline on hover */
      background-color: transparent;
      /* No background color change on hover */
    }

    /* Arrow for categories */
    .category .arrow {
      margin-left: 10px;
      transition: transform 0.3s ease;
    }

    .category.active .arrow {
      transform: rotate(90deg);
      /* Rotate the arrow when the category is active */
    }
  </style>
</head>

<body>
  <!-- Header Section Begins -->
  <?= view('header'); ?>
  <!-- Header Section End -->

  <br>
  <div class="container-fluid">
    <div class="row g-0">
      <!-- First Grid: Top Category List -->
      <div class="col-md-2">
        <h4 class="mb-4">Product Categories</h4>
        <div class="list-group">
          <?php foreach ($categories as $category): ?>
            <div class="list-group-item category" onclick="toggleSubcategories(this)">
              <h5><?= $category['category_name'] ?></h5> <span class="arrow">&#8594;</span>
              <ul class="list-unstyled subcategory-list ms-3">
                <?php foreach ($subcategories as $subcategory): ?>
                  <?php if ($subcategory['category_id'] == $category['category_id']): ?>
                    <li>
                      <a href="<?= base_url('supply/products/'.$subcategory['slug']); ?>">
                        <?= $subcategory['subcategory_name'] ?>
                      </a>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Second Grid: Automatic Picture Slide -->
      <div class="col-md-7">
        <div id="wowslider-container1">
          <div class="ws_images">
            <ul>
              <!-- <li><img src="https://wowslider.com/sliders/demo-23/data1/images/hohenschwangau532864.jpg" alt="Lake in Alps" title="Lake in Alps" id="wows1_0" />Hohenschwangau</li>
              <li><img src="https://wowslider.com/sliders/demo-23/data1/images/landscape1344620.jpg" alt="Iffeldorf Lake" title="Iffeldorf Lake" id="wows1_1" />Easter Lake</li>
              <li><img src="https://wowslider.com/sliders/demo-23/data1/images/lucerne1359909.jpg" alt="Lake in Switzerland" title="Lake in Switzerland" id="wows1_2" />Lucerne</li>
              <li><img src="https://wowslider.com/sliders/demo-23/data1/images/rieti106848.jpg" alt="Italian Lake" title="Italian Lake" id="wows1_3" />Rieti</li>
              <li><img src="https://wowslider.com/sliders/demo-23/data1/images/squantzpond209864.jpg" alt="Autumn Lake" title="Autumn Lake" id="wows1_4" />Squantz Pond</li> -->
              <?php if (!empty($sliderimages)): ?>
                <?php foreach ($sliderimages as $image): ?>

                  <li>
                    <img src="<?= base_url($image['photo_path']); ?>"
                      alt="Autumn Lake"
                      title="Autumn Lake"
                      id="wows1_4" />
                    Squantz Pond
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>

          <div class="ws_bullets">
            <div>
              <?php if (!empty($sliderbulletimages)): ?>
                <?php foreach ($sliderbulletimages as $image): ?>
                  <a href="#" title="Lake in Alps"><span><img src="<?= base_url($image['photo_path']); ?>" alt="Lake in Alps" />1</span></a>
                <?php endforeach; ?>
              <?php endif; ?>
              <!-- <a href="#" title="Lake in Alps"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/hohenschwangau532864.jpg" alt="Lake in Alps" />1</span></a>
              <a href="#" title="Iffeldorf Lake"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/landscape1344620.jpg" alt="Iffeldorf Lake" />2</span></a>
              <a href="#" title="Lake in Switzerland"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/lucerne1359909.jpg" alt="Lake in Switzerland" />3</span></a>
              <a href="#" title="Italian Lake"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/rieti106848.jpg" alt="Italian Lake" />4</span></a>
              <a href="#" title="Autumn Lake"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/squantzpond209864.jpg" alt="Autumn Lake" />5</span></a> -->
            </div>
          </div>
          <div class="ws_shadow"></div>
        </div>
        <script type="text/javascript" src="https://wowslider.com/sliders/demo-23/engine1/wowslider.js"></script>
        <script type="text/javascript" src="https://wowslider.com/sliders/demo-23/engine1/script.js"></script>
      </div>

      <!-- Third Grid: Divided into Two Rows, Each with Two Cards -->
      <div class="col-md-3">
        <!-- First Row with Two Cards -->
        <div class="row mb-3">
          <div class="col-12">
            <div class="card position-relative">
              <img src="https://www.tradeindia.com/images/default/post-card.png" class="card-img-top" alt="Card 1">
              <!-- Button positioned on top of the image -->
              <button class="btn btn-primary position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                Click Me
              </button>
            </div>
          </div>
        </div>
        <!-- Second Row with Two Cards -->
        <div class="row">
          <div class="col-12">
            <div class="card position-relative">
              <img src="https://www.tradeindia.com/images/default/sell-card.png" class="card-img-top" alt="Card 3">
              <button class="btn btn-primary position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                Click Me
              </button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- <div class="container d-flex justify-content-center mt-3" style="background: linear-gradient(to right, #50556D, #69799b);">
        <ul class="nav">
          <a class="nav-link" style="color: white;" href="#">Active</a>
          <a class="nav-link" style="color: white;" href="#">Much longer nav link</a>
          <a class="nav-link" style="color: white;" href="#">Link</a>
          <a class="nav-link" style="color: white;" href="#">Disabled</a>
        </ul>
  </div> -->
  <section class="mt-3" style="background: linear-gradient(to right, #50556D, #69799b); padding: 15px;">
    <div class="container d-flex justify-content-center">
      <ul class="d-flex list-unstyled mb-0" style="font-size: 12px; gap: 60px;">
        <li class="d-flex align-items-center text-white">
          <img src="https://esimg.eworldtrade.com/2K19/images/tradeWithConfidence.png" alt="Trade With Confidence" loading="lazy" width="24" height="24" class="me-2">
          TRADE WITH CONFIDENCE
        </li>
        <li class="d-flex align-items-center text-white">
          <img src="https://esimg.eworldtrade.com/2K19/images/verifiedUsers.png" alt="Verified Buyers" loading="lazy" width="24" height="24" class="me-2">
          VERIFIED BUYERS
        </li>
        <li class="d-flex align-items-center text-white">
          <img src="https://esimg.eworldtrade.com/2K19/images/globalNetwork.png" alt="Global Network" loading="lazy" width="24" height="24" class="me-2">
          GLOBAL NETWORK
        </li>
        <li class="d-flex align-items-center text-white">
          <img src="https://esimg.eworldtrade.com/2K19/images/helpCenter.png" alt="Help Center" loading="lazy" width="24" height="24" class="me-2">
          24/7 HELP CENTER
        </li>
      </ul>
    </div>
  </section>

  <div class="container-fluid my-4">
    <div class="row g-0">
      <!-- Main Card Section -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="card-title">Analyst's Choice</h3>
              <a href="#" class="text-decoration-none">See All</a>
            </div>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <!-- Inner Cards Container -->
            <div class="row g-0">
              <!-- Inner Card -->
              <?php
              for ($i = 0; $i < 3; $i++) {
                echo "<div class='col-md-4'>
                        <div class='card'>
                          <img src='https://p.globalsources.com/IMAGES/PDT/S1201037798/cnc-machined-parts-supplier.jpg' class='card-img-top' alt='...'>
                          <div class='card-body'>
                            <h6 class='card-title'>Something</h6>
                            <p class='card-text'>Some text</p>
                          </div>
                        </div>
                      </div>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Repeat the Main Card Column as Needed -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="card-title">Low MOQ</h3>
              <a href="#" class="text-decoration-none">See All</a>
            </div>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <!-- Inner Cards Container -->
            <div class="row g-0">
              <!-- Inner Card -->
              <?php
              for ($i = 0; $i < 3; $i++) {
                echo "<div class='col-md-4'>
                        <div class='card'>
                          <img src='https://p.globalsources.com/IMAGES/PDT/S1201037798/cnc-machined-parts-supplier.jpg' class='card-img-top' alt='...'>
                          <div class='card-body'>
                            <h6 class='card-title'>Something</h6>
                            <p class='card-text'>Some text</p>
                          </div>
                        </div>
                      </div>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h3 class="card-title">OEM Products</h3>
              <a href="#" class="text-decoration-none">See All</a>
            </div>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <!-- Inner Cards Container -->
            <div class="row g-0">
              <!-- Inner Card -->
              <?php
              for ($i = 0; $i < 3; $i++) {
                echo "<div class='col-md-4'>
                        <div class='card'>
                          <img src='https://p.globalsources.com/IMAGES/PDT/S1201037798/cnc-machined-parts-supplier.jpg' class='card-img-top' alt='...'>
                          <div class='card-body'>
                            <h6 class='card-title'>Something</h6>
                            <p class='card-text'>Some text</p>
                          </div>
                        </div>
                      </div>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid my-4">
    <div class="row g-0">
      <!-- Left section with image and button -->
      <div class="position-relative col-md-3 d-flex flex-column align-items-center text-center">
        <img src="https://image.made-in-china.com/258f1j00tQaEUjTlDthS/Sporting-Goods.webp" alt="Sports Equipment" class="img-fluid position-absolute" style="top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;">
        <h3 class="mt-3" style="position: relative; z-index: 2;">Sporting Goods & Recreation</h3>
        <button class="btn btn-danger mb-3" style="position: relative; z-index: 2;">Source Now</button>
      </div>

      <?php
      for ($i = 0; $i < 3; $i++) {
        echo '<div class="col-md-3">
        <div class="card">
          <img height="200px" src="https://image.made-in-china.com/258f1j00tQaEUjTlDthS/Sporting-Goods.webp" class="card-img-top" alt="...">
          <div class="card-body">
            <h6 class="card-title">Card title</h6>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">An item</li>
              <li class="list-group-item">A second item</li>
              <li class="list-group-item">A third item</li>
              <li class="list-group-item">A fourth item</li>
            </ul>
          </div>
        </div>
      </div>';
      }
      ?>

    </div>
  </div>


  <div class="container-fluid my-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="h5 mb-0">
          <a href="/product/landingPage/recommendSuppliers?source=GSOLHP_RS" class="text-decoration-none">Recommended Suppliers</a>
        </h2>
        <a href="/product/landingPage/recommendSuppliers?source=GSOLHP_RS_ViewMore" class="btn btn-link">See All</a>
      </div>
      <div class="card-body">
        <div class="row g-0">
          <!-- Supplier Item 1 -->
          <div class="col-md-4 mb-4">
            <div class="card">
              <a href="//shforest.manufacturer.globalsources.com/homepage_6008852140170.htm?source=GSOLHP_RS_1_4&amp;type=SCORE_RS">
                <div class="bg-light rounded" style="height: 60px; background-image: url('https://s.globalsources.com/IMAGES/SPL/LOGO/170/L8852140170.jpg'); background-size: cover;"></div>
              </a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="//shforest.manufacturer.globalsources.com/homepage_6008852140170.htm?source=GSOLHP_RS_1_4&amp;type=SCORE_RS" class="text-decoration-none">Shanghai Forests Packaging Group Co. Ltd.</a>
                </h5>
                <div>
                  <span class="badge bg-primary">Premier Supplier</span>
                  <span class="badge bg-success">Verified Manufacturer</span>
                  <span class="badge bg-info">5 years</span>
                  <span class="badge bg-warning">China</span>
                </div>
                <p class="card-text">Business Type: Online Seller, Trading Company, Agent</p>
                <p class="card-text">No. of employees: 550</p>
                <div class="d-flex flex-wrap">
                  <a href="/Cardboard-gift/paper-Packaging-box-1219889330p.htm?source=GSOLHP_RS_1_1" class="me-2">
                    <img src="https://p.globalsources.com/IMAGES/PDT/S1219889330/paper-Packaging-box.jpg?ver=6049461560" alt="Product Image" class="img-fluid" style="width: 80px;">
                  </a>
                  <a href="/Retail-box/paper-box-1185457598p.htm?source=GSOLHP_RS_1_2" class="me-2">
                    <img src="https://p.globalsources.com/IMAGES/PDT/S1185457598/paper-box.jpg?ver=5740906007" alt="Product Image" class="img-fluid" style="width: 80px;">
                  </a>
                  <a href="/Garment-packaging/Kraft-Paper-Mailer-Box-Carton-1185272458p.htm?source=GSOLHP_RS_1_3">
                    <img src="https://p.globalsources.com/IMAGES/PDT/S1185272458/Kraft-Paper-Mailer-Box-Carton.jpg?ver=5744245036" alt="Product Image" class="img-fluid" style="width: 80px;">
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Supplier Item 2 -->
          <div class="col-md-4 mb-4">
            <div class="card">
              <a href="//nanway.manufacturer.globalsources.com/homepage_6008825697371.htm?source=GSOLHP_RS_2_4&amp;type=SCORE_RS">
                <div class="bg-light rounded" style="height: 60px; background-image: url('https://s.globalsources.com/IMAGES/SPL/LOGO/371/L8825697371.jpg'); background-size: cover;"></div>
              </a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="//nanway.manufacturer.globalsources.com/homepage_6008825697371.htm?source=GSOLHP_RS_2_4&amp;type=SCORE_RS" class="text-decoration-none">Shenzhen Nanway Industrial Co.,Ltd</a>
                </h5>
                <div>
                  <span class="badge bg-primary">Premier Supplier</span>
                  <span class="badge bg-success">Verified Manufacturer</span>
                  <span class="badge bg-info">4 years</span>
                  <span class="badge bg-warning">China</span>
                </div>
                <p class="card-text">Business Type: Wholesaler, Distributor, Exporter</p>
                <p class="card-text">No. of employees: 150</p>
                <div class="d-flex flex-wrap">
                  <a href="/Smart-watch/Smart-Watches-1212323374p.htm?source=GSOLHP_RS_2_1" class="me-2">
                    <img src="https://p.globalsources.com/IMAGES/PDT/S1212323374/Smart-Watches.jpg?ver=5995133860" alt="Product Image" class="img-fluid" style="width: 80px;">
                  </a>
                  <a href="/Smart-watch/Smart-Watches-1212323717p.htm?source=GSOLHP_RS_2_2" class="me-2">
                    <img src="https://p.globalsources.com/IMAGES/PDT/S1212323717/Smart-Watches.jpg?ver=5995142646" alt="Product Image" class="img-fluid" style="width: 80px;">
                  </a>
                  <a href="/Smart-watch/smart-watch-1197765711p.htm?source=GSOLHP_RS_2_3">
                    <img src="https://p.globalsources.com/IMAGES/PDT/S1197765711/smart-watch.jpg?ver=6017194446" alt="Product Image" class="img-fluid" style="width: 80px;">
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- Supplier Item 3 -->
          <div class="col-md-4 mb-4">
            <div class="card">
              <a href="//example.manufacturer.globalsources.com/homepage_6008888888888.htm?source=GSOLHP_RS_3_4&amp;type=SCORE_RS">
                <div class="bg-light rounded" style="height: 60px; background-image: url('https://s.globalsources.com/IMAGES/SPL/LOGO/888/L8888888888.jpg'); background-size: cover;"></div>
              </a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="//example.manufacturer.globalsources.com/homepage_6008888888888.htm?source=GSOLHP_RS_3_4&amp;type=SCORE_RS" class="text-decoration-none">Example Supplier Co., Ltd.</a>
                </h5>
                <div>
                  <span class="badge bg-primary">Premier Supplier</span>
                  <span class="badge bg-success">Verified Manufacturer</span>
                  <span class="badge bg-info">3 years</span>
                  <span class="badge bg-warning">China</span>
                </div>
                <p class="card-text">Business Type: Manufacturer, Exporter</p>
                <p class="card-text">No. of employees: 300</p>
                <div class="d-flex flex-wrap">
                  <a href="/Product-1/product-1234567890p.htm?source=GSOLHP_RS_3_1" class="me-2">
                    <img src="https://p.globalsources.com/IMAGES/PDT/S1234567890/Product-1.jpg?ver=6049461560" alt="Product Image" class="img-fluid" style="width: 80px;">
                  </a>
                  <a href="/Product-2/product-1234567891p.htm?source=GSOLHP_RS_3_2" class="me-2">
                    <img src="https://p.globalsources.com/IMAGES/PDT/S1234567891/Product-2.jpg?ver=5740906007" alt="Product Image" class="img-fluid" style="width: 80px;">
                  </a>
                  <a href="/Product-3/product-1234567892p.htm?source=GSOLHP_RS_3_3">
                    <img src="https://p.globalsources.com/IMAGES/PDT/S1234567892/Product-3.jpg?ver=5744245036" alt="Product Image" class="img-fluid" style="width: 80px;">
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Add more suppliers similarly in the column format -->
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid my-4">
    <div class="row g-0" style="background: url('https://s.globalsources.com/IMAGES/website/image/home/rfq_home.jpg') no-repeat center center; background-size: cover; padding: 50px 0;">
      <div class="col-md-6">
        <div class="card text-white" style="background-color: rgba(255, 255, 255, 0);">
          <div class="card-body">
            <h2 class="card-title mb-4">Request for Quotations (RFQ)</h2>
            <p>
              <a href="#" class="btn btn-outline-light">View More</a>
            </p>
            <ul class="list-styled mb-4">
              <li>Submit an RFQ in just one minute.</li>
              <li>Get multiple quotations from Verified Suppliers.</li>
              <li>Compare and choose the best quotation!</li>
            </ul>
          </div>
        </div>
      </div>


      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Get Quotations Now</h5>
            <form>
              <div class="mb-3">
                <input type="text" placeholder="Please enter a specific product name" class="form-control">
              </div>
              <div class="mb-3 d-flex">
                <input type="text" placeholder="Quantity" class="form-control me-2">
                <div class="dropdown">
                  <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="unitDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Unit
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="unitDropdown">
                    <li><a class="dropdown-item" href="#">Bags</a></li>
                    <li><a class="dropdown-item" href="#">Boxes</a></li>
                    <li><a class="dropdown-item" href="#">Cartons</a></li>
                    <li><a class="dropdown-item" href="#">Pieces</a></li>
                    <!-- More items as needed -->
                  </ul>
                </div>
              </div>
              <a href="/buyerCenter/RFQForm?source=GSOLHP_RFQ&resource=3" class="btn btn-danger">Request for Quotations</a>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>


  <?= view('footer'); ?>

  <script>
    // Function to toggle subcategories visibility and ensure only one category is open at a time
    function toggleSubcategories(clickedCategory) {
      // Close all open categories
      var allCategories = document.querySelectorAll('.category');
      allCategories.forEach(function(category) {
        // Remove 'active' class from all categories
        if (category !== clickedCategory) {
          category.classList.remove('active');
        }
      });

      // Toggle the 'active' class on the clicked category
      clickedCategory.classList.toggle('active');
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

</body>

</html>