<?php
include '../../config/baseurl.php';
include '../../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/style.css" type="text/css">

    <style type="text/css">
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
    <!-- Header Section Begins -->
    <?php include '../../includes/header.php'; ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="<?php echo $baseurl; ?>/"><i class="fa fa-home"></i> Home</a>
                        <span>Books</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- search section begins -->
    <div class="container mt-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search for books by name, author, or category...">
        <div id="searchResults" class="row mt-3"></div>
    </div>
    <!-- search section ends -->

    <!-- Book Section Begin -->
    <section class="shop spad">
        <div class="container">
            <?php
                // Fetch book categories from the database
                $sql = "SELECT * FROM book_category";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output each book category
                    while ($row = $result->fetch_assoc()) {
                        echo '<h3>' . htmlspecialchars($row["book_category"]) . '</h3>';
                        echo '<br>';

                        // Fetch book details based on category
                        $category = $row["book_category"];
                        $details_sql = "SELECT * FROM book_details WHERE book_details_category = '$category'";
                        $details_result = $conn->query($details_sql);

                        echo '<div class="row">';
                        if ($details_result->num_rows > 0) {
                            while ($details_row = $details_result->fetch_assoc()) {
                                echo '<div class="col-lg-3 col-md-3">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="' . $baseurl . '/assets/img/shop/shop-1.jpg">
                                            <div class="label new">New</div>
                                            <ul class="product__hover">
                                                <li><a href="' . $baseurl . '/assets/img/shop/' . htmlspecialchars($details_row["book_details_image"]) . '" class="image-popup"><span class="arrow_expand"></span></a></li>
                                                
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h5><a href="#">' . htmlspecialchars($details_row["book_details_name"]) . '</a></h5>
                                            <h6><a href="#">' . htmlspecialchars($details_row["book_details_author"]) . '</a></h6>
                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                            echo "<p>No books found in this category.</p>";
                        }
                        echo '</div><br>'; // Close the row for this category and add a line break
                        echo '<div class="text-center">
                            <a href="view_all_books.php?category=' . urlencode($category) . '" class="btn btn-primary">View All</a>
                        </div><br>';
                    }
                } else {
                    echo "<p>No categories found.</p>";
                }
                ?>
        </div>
    </section>
    <!-- Book Section End -->

    <?php include '../../includes/footer.php'; ?>

    <!-- Js Plugins -->
    <script src="<?php echo $baseurl; ?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/mixitup.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.slicknav.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo $baseurl; ?>/assets/js/main.js"></script>

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
                        url: 'search_books.php',  // Endpoint to handle search
                        type: 'GET',
                        data: { query: searchQuery },
                        dataType: 'json',
                        success: function(data) {
                            let resultsHtml = '';

                            if (data.length > 0) {
                                data.forEach(function(book) {
                                    resultsHtml += `
                                        <div class="col-lg-3 col-md-3 mb-3">
                                            <div class="product__item">
                                                <div class="product__item__pic set-bg" style="background-image: url('${book.image}');">
                                                    <div class="label new">New</div>
                                                </div>
                                                <div class="product__item__text">
                                                    <h5><a href="#">${book.name}</a></h5>
                                                    <h6>Author: ${book.author}</h6>
                                                    <p>Category: ${book.category}</p>
                                                </div>
                                            </div>
                                        </div>
                                    `;
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