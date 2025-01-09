<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= esc($category_name) ?></title>
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
</head>

<body>
  <?= view('header'); ?>

  <div class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="text-decoration: none;" href="<?= site_url('supply/products') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= esc($category_name) ?></li>
      </ol>
    </nav>

    <h1 class="mb-4">Subcategories in <?= esc($category_name) ?></h1>

    <!-- Grid Container for Subcategories -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      <?php if (!empty($subcategories)): ?>
        <?php foreach ($subcategories as $subcategory): ?>
          <div class="col">
            <!-- Subcategory Card -->
            <div class="card h-100">
              <div class="card-body text-center">
                <h5 class="card-title"><?= esc($subcategory['subcategory_name']) ?></h5>
                <a href="<?= site_url('supply/products/sub-category/'.esc($subcategory['slug'])) ?>" class="btn btn-primary">View Products</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No subcategories found in this category.</p>
      <?php endif; ?>
    </div>
  </div>

  <?= view('footer'); ?>
</body>

</html>
