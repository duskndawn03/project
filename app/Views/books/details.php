<!DOCTYPE html>
<html lang="en">

<head>
  <title>Books</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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

    .edition-omniline {
      display: flex;
      flex-direction: row;
      padding: 10px;
      margin-bottom: 10px;
      overflow-x: auto
    }

    .edition-omniline-item {
      display: flex;
      flex-direction: column;
      justify-content: top;
      align-items: center;
      flex: 1;
      padding: 9px;
      margin: 0 4px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 14px;
      word-break: break-word;
      text-align: center;
      min-width: 100px
    }

    .edition-omniline-item div {
      margin-bottom: 4px;
      font-size: 12px;
      color: #666;
      word-wrap: break-word
    }

    .edition-omniline-item a {
      text-decoration: none
    }

    .edition-omniline h4 {
      padding-right: 5px
    }

    .edition-omniline h4:last-child {
      padding-right: 0
    }

    @media only screen and (min-width: 768px) {
      .edition-omniline {
        flex-direction: row;
        justify-content: space-between
      }

      .edition-omniline-item {
        flex-direction: column;
        justify-content: flex-start;
        align-items: center
      }
    }
  </style>
</head>

<body>
  <!-- Header Section Begins -->
  <?= view('header'); ?>
  <!-- Header Section End -->

  <!-- Breadcrumb Begin -->
  <nav aria-label="breadcrumb" class="py-3">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a style="text-decoration: none;" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Books</li>
      </ol>
    </div>
  </nav>
  <!-- Breadcrumb End -->

  <!-- Search Section Begin -->
  <!-- <div class="container my-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Search for books by name, author, or category...">
    <div id="searchResults" class="row mt-3"></div>
  </div> -->
  <!-- Search Section End -->

  <!-- Book Section Begin -->
  <div class="container-fluid">
    <div class="row g-0">

      <div class="col-md-2">
        <div class="card">
          <div class="card-header">
            <img src="<?= base_url('public/assets/img/shop/shop-2.jpg'); ?>" class="img-fluid" alt="<?= esc($book['book_details_name']) ?>">
          </div>
          <div class="card-body">
            <a href="" class="btn btn-primary mb-2" style="width: 100%;">Read</a>
            <div class="card-title">Download options</div>
            <ul class="list-styled">
              <li>pdf</li>
              <li>plain text</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <h1><?= esc($book['book_details_name']) ?></h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <h6>By <?= esc($book['book_details_author']) ?></h6>

        <div>
          <div class="edition-omniline">
            <div class="edition-omniline-item">
              <div>Publish Date</div>
              <span itemprop="datePublished">1839</span>
            </div>
            <div class="edition-omniline-item">
              <div>Publisher</div>
              <span>
                <a itemprop="publisher" href="/publishers/T._Tegg;_[etc.,_etc.]" title="Show other books from T. Tegg; [etc., etc.]">T. Tegg; [etc., etc.]</a>
              </span>
            </div>
            <div class="edition-omniline-item">
              <div class="language">Language</div>
              <span itemprop="inLanguage"><a href="/languages/eng">English</a></span>
            </div>
            <div class="edition-omniline-item">
              <div class="pages">Pages</div>
              <span class="edition-pages" itemprop="numberOfPages">559</span>
            </div>
          </div>
        </div>
        <table id="bookEditions" class="table">
          <thead>
            <tr>
              <th>Edition</th>
              <th>Availability</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td><button class="btn btn-primary">Read</button></td>
            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td><button class="btn btn-primary">Read</button></td>
            </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
        
      </div>

      <div class="col-md-2">
        <div class="card h-100">
          <div class="img-wrapper">
            <img src="<?= base_url(); ?>public/assets/img/instagram/insta-2.jpg" class="card-img-top" alt="...">
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

  <!-- Book Section End -->

  <?= view('footer'); ?>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#bookEditions').DataTable({
        paging: true,       // Enable pagination
        searching: true,    // Enable search/filter
        ordering: true,     // Enable column sorting
        responsive: true    // Make it responsive
      });
    });
  </script>
</body>

</html>