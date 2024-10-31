<?php
// Include database connection
include '../../config/db_connection.php';
include '../../config/baseurl.php';

// Check if the category parameter is set in the GET request
if (!isset($_GET['category']) || empty($_GET['category'])) {
    echo "<p>Error: Category not specified. Please return to the <a href='".$baseurl."/pages/books/books.php'>Books</a>.</p>";
    exit;
}

// Get category from URL
$category = $_GET['category'];
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
    <?php include '../../includes/header.php'; ?>
    <!-- Header Section End -->

     <!-- Breadcrumb Begin -->
    <nav aria-label="breadcrumb" class="bg-light py-3">
        <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $baseurl; ?>/"><i class="fa fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Books</li>
        </ol>
        </div>
    </nav>
    <!-- Breadcrumb End -->

    <!-- Book Section Begin -->
    <section class="py-0">
        <div class="container">
            <?php
            echo '<h3>' . htmlspecialchars($category) . '</h3>';
            // Fetch all books in the specified category
            $sql = "SELECT * FROM book_details WHERE book_details_category = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $category);
            $stmt->execute();
            $result = $stmt->get_result();

            echo '<div class="row g-4">';
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='col-lg-3 col-md-4 col-sm-6'>
                        <div class='card'>
                        <img src='{$baseurl}/assets/img/shop/shop-1.jpg' class='card-img-top' alt='Book Image'>
                        <div class='card-body'>
                            <span class='badge bg-success mb-2'>New</span>
                            <h5 class='card-title'>" . htmlspecialchars($row["book_details_name"]) . "</h5>
                            <p class='card-text'>" . htmlspecialchars($row["book_details_author"]) . "</p>
                            <a href='{$baseurl}/assets/img/shop/shop-1.jpg' class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#imageModal'>View Image</a>
                        </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p class='col-12'>No books found in this category.</p>";
            }
            echo '</div>';
            ?>
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

    <?php include '../../includes/footer.php'; ?>

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