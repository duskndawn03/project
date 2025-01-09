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

  <!-- Slick Carousel CSS -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

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

  <?= view('header'); ?>

  <div class="container-fluid">

    <div class="row g-2">
      <!-- Advertisement Card 1 -->
      <div class="col-lg-2 col-md-2 col-sm-6 mb-4 order-2 order-lg-1">
        <div class="card h-100">
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

      <!-- Slider Section -->
      <div class="col-lg-8 col-md-8 col-sm-12 mb-4 order-1">
        <!-- WOWSlider section -->
        <div id="wowslider-container1">
          <div class="ws_images">
            <ul>
              <li><img src="https://wowslider.com/sliders/demo-23/data1/images/hohenschwangau532864.jpg" alt="Lake in Alps" title="Lake in Alps" id="wows1_0" />Hohenschwangau</li>
              <li><img src="https://wowslider.com/sliders/demo-23/data1/images/landscape1344620.jpg" alt="Iffeldorf Lake" title="Iffeldorf Lake" id="wows1_1" />Easter Lake</li>
              <li><img src="https://wowslider.com/sliders/demo-23/data1/images/lucerne1359909.jpg" alt="Lake in Switzerland" title="Lake in Switzerland" id="wows1_2" />Lucerne</li>
              <li><img src="https://wowslider.com/sliders/demo-23/data1/images/rieti106848.jpg" alt="Italian Lake" title="Italian Lake" id="wows1_3" />Rieti</li>
              <li><img src="https://wowslider.com/sliders/demo-23/data1/images/squantzpond209864.jpg" alt="Autumn Lake" title="Autumn Lake" id="wows1_4" />Squantz Pond</li>
            </ul>
          </div>
          <div class="ws_bullets">
            <div>
              <a href="#" title="Lake in Alps"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/hohenschwangau532864.jpg" alt="Lake in Alps" />1</span></a>
              <a href="#" title="Iffeldorf Lake"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/landscape1344620.jpg" alt="Iffeldorf Lake" />2</span></a>
              <a href="#" title="Lake in Switzerland"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/lucerne1359909.jpg" alt="Lake in Switzerland" />3</span></a>
              <a href="#" title="Italian Lake"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/rieti106848.jpg" alt="Italian Lake" />4</span></a>
              <a href="#" title="Autumn Lake"><span><img src="https://wowslider.com/sliders/demo-23/data1/tooltips/squantzpond209864.jpg" alt="Autumn Lake" />5</span></a>
            </div>
          </div>
          <div class="ws_shadow"></div>
        </div>
        <script type="text/javascript" src="https://wowslider.com/sliders/demo-23/engine1/wowslider.js"></script>
        <script type="text/javascript" src="https://wowslider.com/sliders/demo-23/engine1/script.js"></script>
      </div>

      <!-- Advertisement Card 2 -->
      <div class="col-lg-2 col-md-2 col-sm-6 mb-4 order-3 order-lg-1">
        <div class="card h-100">
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
        <!-- <div class="notice-bar text-center py-2" style="background-color: #ffcc00; color: #000;">
          <strong>Notice:</strong> This is a sample notice text!
        </div> -->
        <div class="alert alert-info text-center m-0 py-2" role="alert">
          <strong>Important Notice:</strong> Free shipping on orders over $50! 🚚
        </div>
      </div>
    </div>

    <div class="row g-0 mt-4">
      <div class="col-lg-10 col-md-10 col-sm-12">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Top Ranking <a href="#" style="text-decoration: none;" class="float-end">View All</a></h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card" style="width: 18rem;">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Featured seller</h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Top Ranking <a href="#" style="text-decoration: none;" class="float-end">View All</a></h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card" style="width: 18rem;">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Featured seller</h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Top Ranking <a href="#" style="text-decoration: none;" class="float-end">View All</a></h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card" style="width: 18rem;">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Featured seller</h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Top Ranking <a href="#" style="text-decoration: none;" class="float-end">View All</a></h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card" style="width: 18rem;">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Featured seller</h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Top Ranking <a href="#" style="text-decoration: none;" class="float-end">View All</a></h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card" style="width: 18rem;">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <h5 class="mb-3">Featured seller</h5>
              <div class="responsive">
                <?php if (isset($products) && !empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <div class="card">
                      <img src="<?= $product['product_image_path']; ?>" class="card-img-top" alt="<?= $product['product_name']; ?>">
                      <div class="card-body">
                        <h6 class="card-title"><?= $product['subcategory_id']; ?></h6>
                        <p class="card-text">$ <?= $product['current_price']; ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No products available.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Third grid item (4 grid spaces) -->
      <div class="col-lg-2 col-md-2 col-sm-12">
        <div class="card mb-4">
          <div class="img-wrapper border-bottom">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
          </div>
          <div class="img-wrapper border-bottom">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
          </div>
          <div class="img-wrapper border-bottom">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
          </div>
          <div class="img-wrapper border-bottom">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
          </div>
          <div class="img-wrapper border-bottom">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
          </div>
          <div class="img-wrapper border-bottom">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
          </div>
          <div class="img-wrapper border-bottom">
            <img src="<?php echo base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
          </div>
        </div>
      </div>
    </div>
  </div>

  <?= view('footer'); ?>
  <!-- Slick Carousel JS -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.responsive').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: false, // Disable arrows
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
    });
  </script>

</body>

</html>