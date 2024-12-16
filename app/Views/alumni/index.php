<!DOCTYPE html>
<html lang="en">

<head>
  <title>IPE Alumni</title>
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

  <!-- Table Section Begin -->

  <div class="container-fluid">
    <div class="row">
      <!-- Left Advertisement -->
      <div class="col-lg-2 col-md-3 col-sm-12 mb-4">
        <div class="card">
          <img src="<?php echo base_url(); ?>public/assets/img/blog/blog-7.jpg" class="card-img-top" alt="Advertisement 1">
          <div class="card-body">
            <h5 class="card-title">Ad 1</h5>
            <p class="card-text">Description for the first advertisement.</p>
          </div>
        </div>
      </div>

      <!-- Center Table -->
      <div class="col-lg-8 col-md-6 col-sm-12 mb-4">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="text-center mb-4">Alumni Information</h2>
          <!-- Register Button -->
          <a href="<?=base_url();?>ipe/alumni/reg" class="btn btn-primary">Register</a>
        </div>
        <div class="table-responsive border">
    <table id="alumniTable" class="table table-bordered nowrap border" style="width:100%">
        <thead>
            <tr>
                <th>#</th> <!-- Serial number column -->
                <?php foreach ($columnsToDisplay as $column): ?>
                    <th><?= ucfirst(str_replace('_', ' ', $column)); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($alumniData)): ?>
                <?php foreach ($alumniData as $index => $row): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <?php foreach ($columnsToDisplay as $column): ?>
                            <?php if ($column === 'fb_id_link' || $column === 'linkedin_id_link'): ?>
                                <td><a href="<?= esc($row[$column]); ?>"><?= ucfirst(explode('_', $column)[0]); ?></a></td>
                            <?php else: ?>
                                <td><?= esc($row[$column]); ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="<?= count($columnsToDisplay) + 1; ?>" class="text-center">No records found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
      </div>

      <!-- Right Advertisement -->
      <div class="col-lg-2 col-md-3 col-sm-12 mb-4">
        <div class="card">
          <img src="<?php echo base_url(); ?>public/assets/img/blog/blog-7.jpg" class="card-img-top" alt="Advertisement 2">
          <div class="card-body">
            <h5 class="card-title">Ad 2</h5>
            <p class="card-text">Description for the second advertisement.</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Table Section End -->

  <!-- Footer Section Begin -->
  <?= view('footer'); ?>


  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

  <script>
    $(document).ready(function() {
        $('#alumniTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            responsive: true, // Enable responsive extension
            columnDefs: [
                { responsivePriority: 1, targets: 0 }, // Serial number column
                { responsivePriority: 2, targets: 5 }, // Name column (example)
                { responsivePriority: 3, targets: 4 }, // Roll no column (example)
                { responsivePriority: 4, targets: 1 }, // Graduation institute (example)
                { responsivePriority: 5, targets: 3 }  // Batch name no (example)
            ]
        });
    });
  </script>

</body>

</html>