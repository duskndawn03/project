<?php
// Check if the category parameter is set in the GET request
if (!isset($category) || empty($category)) {
    echo "<p>Error: Category not specified. Please return to the <a href='" . base_url() . "study/books/'>Books</a>.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>All books</title>
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
    <?= view('header'); ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Books</li>
            </ol>
        </div>
    </nav>
    <!-- Breadcrumb End -->

    <!-- Book Section Begin -->
    <section class="py-0">
        <div class="container">
            <h3>Books in <?= esc($category) ?> Category</h3>

            <div class="row g-4">
                <?php if (!empty($books)): ?>
                    <?php foreach ($books as $book): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card">
                                <img src="<?= base_url() ?>/public/assets/img/shop/shop-1.jpg" class="card-img-top" alt="Book Image">
                                <div class="card-body">
                                    <span class="badge bg-success mb-2">New</span>
                                    <h5 class="card-title"><?= esc($book['book_details_name']) ?></h5>
                                    <p class="card-text"><?= esc($book['book_details_author']) ?></p>
                                    <a href="<?= base_url() ?>/public/assets/img/shop/shop-1.jpg" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal">View Image</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="col-12">No books found in this category.</p>
                <?php endif; ?>
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
    <!-- Book Section End -->

    <?= view('footer'); ?>

    <script>
        // Load image into modal
        document.querySelectorAll('.btn-outline-primary').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('modalImage').src = this.getAttribute('href');
            });
        });
    </script>

</body>

</html>