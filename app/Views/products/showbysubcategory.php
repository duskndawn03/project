<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= esc($subcategory_name) ?></title>
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

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
  <!-- DataTables Responsive Extension CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
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
  <?= view('header'); ?>

  <div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="text-decoration: none;" href="<?= site_url('supply/products') ?>">Home</a></li>
        <li class="breadcrumb-item"><a style="text-decoration: none;" href="<?= site_url('supply/products/category/'.esc($main_category_slug).'') ?>"><?= esc($main_category_name) ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= esc($subcategory_name) ?></li>
      </ol>
    </nav>

    <h1 class="mb-4">Products in <?= esc($subcategory_name) ?></h1>


    <!-- Grid Container -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
          <!-- Product Box (Card) -->
          <div class="col">
            <div class="card h-100">
              <!-- Product Image -->
              <img src="<?= esc($product['product_image_path']) ?>" class="card-img-top" alt="<?= esc($product['product_image_title']) ?>" style="height: 200px; object-fit: cover;">

              <!-- Card Body -->
              <div class="card-body">
                <h5 class="card-title"><?= esc($product['product_name']) ?></h5>
                <p class="card-text"><?= esc($product['product_description']) ?></p>
                <p class="card-text"><strong>Price:</strong> <?= esc($product['current_price']) ?></p>
              </div>

              <!-- Card Footer -->
              <div class="card-footer text-center">
                <a href="<?= base_url('supply/products/details/' . $product['product_slug']) ?>" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No products found in this subcategory.</p>
      <?php endif; ?>
    </div>
  </div>


  <?= view('footer'); ?>
</body>

</html>