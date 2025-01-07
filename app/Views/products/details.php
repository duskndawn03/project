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
</head>

<body>

    <!-- Header Section Begins -->
    <?= view('header'); ?>
    <!-- Header Section End -->

    <div class="container">
        <div class="product-details row g-4">
            <!-- Product Image -->
            <div class="col-md-6">
                <img src="https://via.placeholder.com/400x400" alt="Product Image" class="product-image img-fluid">
            </div>
            <!-- Product Details -->
            <div class="col-md-6">
                <h2><?= esc($product['product_name']) ?></h2>
                <p class="text-muted">Category: <span class="fw-bold">Electronics</span></p>
                <p class="text-muted">SKU: <span class="fw-bold">12345</span></p>
                <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum, dolor in vehicula sodales, est nisi faucibus ligula, nec tincidunt orci odio id nisl.</p>
                <h3 class="text-danger"><?= esc(number_format($product['current_price'], 2)) ?> TAKA</h3>

                <!-- Quantity and Add to Cart -->
                <div class="d-flex align-items-center mt-4">
                    <div class="quantity-controls me-3">
                        <button class="btn btn-outline-secondary" onclick="changeQuantity(-1)">-</button>
                        <input type="number" id="quantity" class="form-control d-inline-block text-center mx-2" value="1" min="1" style="width: 60px;">
                        <button class="btn btn-outline-secondary" onclick="changeQuantity(1)">+</button>
                    </div>
                    <button class="btn btn-primary btn-lg">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <?= view('footer'); ?>
    <script>
        function changeQuantity(amount) {
            const quantityInput = document.getElementById('quantity');
            const currentQuantity = parseInt(quantityInput.value);
            const newQuantity = currentQuantity + amount;
            if (newQuantity >= 1) {
                quantityInput.value = newQuantity;
            }
        }
    </script>
</body>

</html>