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
  <section>


    <div class="container-fluid">
      <div class="row g-0">
        <div class="col-md-2 col-lg-2">
          <div class="card mb-2">
            <div class="card-header">
              Shop by category
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <?php if (!empty($categoryData)): ?>
                  <?php foreach ($categoryData as $categoryItem): ?>
                    <li class="list-group-item">
                      <a href="<?= site_url('study/books/view_all_books?category=' . urlencode($categoryItem['category'])); ?>" class="text-decoration-none"><?= esc($categoryItem['category']) ?></a>
                    </li>
                  <?php endforeach; ?>
                <?php else: ?>
                  <li class="list-group-item">No categories found.</li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="card mb-2">
            <div class="card-header">
              Sort
            </div>
            <div class="card-body">
              <form>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="options" id="option1" value="option1">
                  <label class="form-check-label" for="option1">
                    Option 1
                  </label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="options" id="option2" value="option2">
                  <label class="form-check-label" for="option2">
                    Option 2
                  </label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="options" id="option3" value="option3">
                  <label class="form-check-label" for="option3">
                    Option 3
                  </label>
                </div>
              </form>
            </div>
          </div>
          <div class="card mb-2">
            <div class="card-header">
              <form>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="filter1" value="filter1">
                  <label class="form-check-label" for="filter1">
                    e book
                  </label>
                </div>
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="filter2" value="filter2">
                  <label class="form-check-label" for="filter2">
                    in stock
                  </label>
                </div>
              </form>
            </div>
          </div>
          <div class="card mb-2">
            <div class="card-header">Filter</div>
            <div class="card-body">
              <div class="card-title">Authors</div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="Search" aria-describedby="search-icon">
                <span class="input-group-text" id="search-icon">
                  <i class="fa fa-search"></i> <!-- Bootstrap icon for search -->
                </span>
              </div>
              <div class="overflow-auto" style="max-height: 200px;">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item1">
                  <label class="form-check-label" for="item1">Item 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item2">
                  <label class="form-check-label" for="item2">Item 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item3">
                  <label class="form-check-label" for="item3">Item 3</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item1">
                  <label class="form-check-label" for="item1">Item 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item2">
                  <label class="form-check-label" for="item2">Item 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item3">
                  <label class="form-check-label" for="item3">Item 3</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item1">
                  <label class="form-check-label" for="item1">Item 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item2">
                  <label class="form-check-label" for="item2">Item 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item3">
                  <label class="form-check-label" for="item3">Item 3</label>
                </div>
                <!-- Add more items as needed -->
              </div>
            </div>
          </div>
          <div class="card mb-2">
            <div class="card-header">By publishers</div>
            <div class="card-body">
              <div class="card-title">Publishers</div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="Search" aria-describedby="search-icon">
                <span class="input-group-text" id="search-icon">
                  <i class="fa fa-search"></i> <!-- Bootstrap icon for search -->
                </span>
              </div>
              <div class="overflow-auto" style="max-height: 200px;">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item1">
                  <label class="form-check-label" for="item1">Item 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item2">
                  <label class="form-check-label" for="item2">Item 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item3">
                  <label class="form-check-label" for="item3">Item 3</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item1">
                  <label class="form-check-label" for="item1">Item 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item2">
                  <label class="form-check-label" for="item2">Item 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item3">
                  <label class="form-check-label" for="item3">Item 3</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item1">
                  <label class="form-check-label" for="item1">Item 1</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item2">
                  <label class="form-check-label" for="item2">Item 2</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item3">
                  <label class="form-check-label" for="item3">Item 3</label>
                </div>
                <!-- Add more items as needed -->
              </div>
            </div>
          </div>
          <div class="card mb-2">
            price
          </div>
          <div class="card mb-2">
            <div class="card-header">Languages</div>
            <div class="card-body">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="Search" aria-describedby="search-icon">
                <span class="input-group-text" id="search-icon">
                  <i class="fa fa-search"></i> <!-- Bootstrap icon for search -->
                </span>
              </div>
              <div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item1">
                  <label class="form-check-label" for="item1">Bangla</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item2">
                  <label class="form-check-label" for="item2">Bangla and English</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="item3">
                  <label class="form-check-label" for="item3">English</label>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-2">
            discount
          </div>
          <div class="card mb-2">
            <div class="card-header">Ratings</div>
            <div class="card-body">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="item1">
                <label class="form-check-label" for="item1">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="item2">
                <label class="form-check-label" for="item2">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="item3">
                <label class="form-check-label" for="item3">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="item3">
                <label class="form-check-label" for="item3">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="item3">
                <label class="form-check-label" for="item3">
                  <i class="fa fa-star"></i>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-8">
          <div class="container">
            <h1 class="mb-3">Books</h1>

            <div class="row g-3">
              <?php if (!empty($paginatedBooks)): ?>
                <?php foreach ($paginatedBooks as $book): ?>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100">
                      <img src="<?= base_url('public/assets/img/shop/shop-2.jpg'); ?>" class="card-img-top" alt="<?= esc($book['book_details_name']) ?>">
                      <div class="card-body">
                        <h5 class="card-title"><?= esc($book['book_details_name']) ?></h5>
                        <p class="card-text">By <?= esc($book['book_details_author']) ?></p>
                        <a href="<?= base_url('study/books/details/' . esc($book['book_details_slug'])); ?>" class="btn btn-outline-primary btn-sm">View Details</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p>No books found.</p>
              <?php endif; ?>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center my-4">
              <?= $pager->links() ?>
            </div>
          </div>


        </div>
        <div class="col-md-2 col-lg-2">
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

  </section>
  <!-- Book Section End -->

  <!-- Image Modal -->
  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageModalLabel">Book Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img id="modalImage" src="" alt="Book Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  <?= view('footer'); ?>

  <script>
    // Load image into modal
    document.querySelectorAll('.btn-outline-primary').forEach(button => {
      button.addEventListener('click', function() {
        document.getElementById('modalImage').src = this.getAttribute('href');
      });
    });
  </script>

  <script>
    // Debounce function to limit the number of AJAX requests
    function debounce(func, delay) {
      let timer;
      return function(...args) {
        clearTimeout(timer);
        timer = setTimeout(() => func.apply(this, args), delay);
      };
    }

    $(document).ready(function() {
      $('#searchInput').on('keyup', debounce(function() {
        let searchQuery = $(this).val().trim();

        // Only make the AJAX request if there's a search term
        if (searchQuery.length > 0) {
          $.ajax({
            url: '<?= base_url('study/books/search_books'); ?>', // Endpoint to handle search
            type: 'GET',
            data: {
              query: searchQuery
            },
            dataType: 'json',
            success: function(data) {
              let resultsHtml = '';

              if (data.length > 0) {
                data.forEach(function(book) {
                  resultsHtml += `
										<div class="col-lg-3 col-md-3 mb-3">
												<div class="card">
                          <div class="container">
                              <div class="label new">New</div>
                              <h5><a style="text-decoration: none;" href="#">${book.name}</a></h5>
                              <h6>Author: ${book.author}</h6>
                              <p>Category: ${book.category}</p>
                          </div>
												</div>
										</div>`;
                });
              } else {
                resultsHtml = '<p>No results found for your search.</p>';
              }

              $('#searchResults').html(resultsHtml);
            },
            error: function() {
              $('#searchResults').html('<p>Error loading search results.</p>');
            }
          });
        } else {
          $('#searchResults').empty(); // Clear results if search is empty
        }
      }, 300)); // Debounce delay of 300ms
    });
  </script>
</body>

</html>