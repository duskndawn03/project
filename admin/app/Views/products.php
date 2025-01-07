<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI CDN -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <!-- DataTables Responsive Extension CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container my-3">
        <details>
            <summary style="font-size: 32px;">Category Management</summary>
            <!-- Add Category -->
            <form action="<?= base_url('products/createCategory') ?>" method="post" class="mb-4">
                <div class="row g-2">
                    <div class="col-auto">
                        <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </div>
            </form>

            <h2 class="mb-3">Category List</h2>
            <table id="category" class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?= $category['category_id'] ?></td>
                            <td><?= $category['category_name'] ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form action="products/updateCategory/<?= $category['category_id'] ?>" method="post" class="d-inline-flex">
                                        <input type="text" name="category_name" class="form-control" value="<?= $category['category_name'] ?>" required>
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </form>
                                    <form action="products/deleteCategory/<?= $category['category_id'] ?>" method="post" class="d-inline">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </details>

        <details>
            <summary style="font-size: 32px;">Subcategory Management</summary>
            <!-- Add Subcategory -->
            <form action="products/createSubcategory" method="post" class="mb-4">
                <div class="row g-2">
                    <div class="col-md-5">
                        <input type="text" name="subcategory_name" class="form-control" placeholder="Subcategory Name" required>
                    </div>
                    <div class="col-md-5">
                        <select name="category_id" class="form-select" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Add Subcategory</button>
                    </div>
                </div>
            </form>

            <h2 class="mb-3">Subcategory List</h2>
            <table id="subcategory" class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <tr>
                            <td><?= $subcategory['subcategory_id'] ?></td>
                            <td><?= $subcategory['subcategory_name'] ?></td>
                            <td><?= $subcategory['category_name'] ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form action="products/updateSubcategory/<?= $subcategory['subcategory_id'] ?>" method="post" class="d-inline-flex">
                                        <input type="text" name="subcategory_name" class="form-control" value="<?= $subcategory['subcategory_name'] ?>" required>
                                        <select name="category_id" class="form-select" required>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category['category_id'] ?>" <?= $subcategory['category_id'] == $category['category_id'] ? 'selected' : '' ?>><?= $category['category_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </form>
                                    <form action="products/deleteSubcategory/<?= $subcategory['subcategory_id'] ?>" method="post" class="d-inline">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </details>

        <!-- Product Management Section -->
        <details>
            <summary style="font-size: 32px;">Product Management</summary>

            <!-- Add Product Form -->
            <h3>Add New Product</h3>
            <form action="products/createProduct" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="subcategory_id" class="form-label">Subcategory</label>
                    <select name="subcategory_id" class="form-control" required>
                        <?php foreach ($subcategories as $subcategory): ?>
                            <option value="<?= $subcategory['subcategory_id'] ?>"><?= $subcategory['subcategory_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="product_image" class="form-label">Product Image</label>
                    <input type="file" name="product_image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>

            <!-- Product List -->
            <h3>Product List</h3>
            <table id="products" class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Subcategory</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['product_id'] ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['current_price'] ?></td>
                            <td><?= $product['subcategory_id'] ?></td>
                            <td>
                                <a href="/products/editProduct/<?= $product['product_id'] ?>" class="btn btn-warning">Edit</a>
                                <form action="/products/deleteProduct/<?= $product['product_id'] ?>" method="post" class="d-inline">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </details>

        <!-- Photo Management Section -->
        <details>
            <summary style="font-size: 32px;">Slider Photo Management</summary>
            <!-- Upload Slider and Bullet Photo -->
            <form action="products/uploadSliderAndBulletPhoto" method="post" enctype="multipart/form-data" class="mb-4">
                <h3>Slider Photo</h3>
                <div class="row g-2 align-items-center mb-3">
                    <div class="col-md-6">
                        <input type="file" name="slider_photo" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="slider_photo_title" class="form-control" placeholder="Slider Photo Title" required>
                    </div>
                </div>
                <span style="color: red;">Slider Photo size must be 900 x 400</span>

                <h3 class="mt-4">Bullet Photo</h3>
                <div class="row g-2 align-items-center mb-3">
                    <div class="col-md-6">
                        <input type="file" name="bullet_photo" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="bullet_photo_title" class="form-control" placeholder="Bullet Photo Title" required>
                    </div>
                </div>
                <span style="color: red;">Bullet Photo size must be 202 x 90</span>

                <button type="submit" class="btn btn-primary w-100 mt-4">Upload Photos</button>
            </form>

            <!-- Photo List -->
            <h2 class="mb-3">Photo List</h2>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Photo Title</th>
                        <th>Bullet Photo</th>
                        <th>Bullet Photo Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($photos as $photo): ?>
                        <tr>
                            <td><?= $photo['photo_id'] ?></td>
                            <!-- Slider Photo -->
                            <td>
                                <img src="<?= $photo['photo_path'] ?>" alt="<?= $photo['photo_title'] ?>" class="img-thumbnail" style="max-width: 150px;">
                            </td>
                            <td><?= $photo['photo_title'] ?></td>
                            <!-- Bullet Photo -->
                            <?php
                            // Find the associated bullet photo
                            $bullet_photo = array_filter($bullet_photos, function ($bullet) use ($photo) {
                                return $bullet['slider_photo_id'] === $photo['photo_id'];
                            });
                            $bullet_photo = reset($bullet_photo); // Get the first matching record
                            ?>
                            <td>
                                <?php if ($bullet_photo): ?>
                                    <img src="<?= $bullet_photo['photo_path'] ?>" alt="<?= $bullet_photo['photo_title'] ?>" class="img-thumbnail" style="max-width: 150px;">
                                <?php else: ?>
                                    No Bullet Photo
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= $bullet_photo ? $bullet_photo['photo_title'] : 'No Title' ?>
                            </td>
                            <!-- Actions -->
                            <td>
                                <form action="products/deleteSliderPhoto/<?= $photo['photo_id'] ?>" method="post" class="d-inline">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </details>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#category').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true // Enable responsive extension
                // columnDefs: [
                //     { responsivePriority: 1, targets: 0 }, // Serial number column
                //     { responsivePriority: 2, targets: 5 }, // Name column (example)
                //     { responsivePriority: 3, targets: 4 }, // Roll no column (example)
                //     { responsivePriority: 4, targets: 1 }, // Graduation institute (example)
                //     { responsivePriority: 5, targets: 3 }  // Batch name no (example)
                // ]
            });
            $('#subcategory').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true // Enable responsive extension
                // columnDefs: [
                //     { responsivePriority: 1, targets: 0 }, // Serial number column
                //     { responsivePriority: 2, targets: 5 }, // Name column (example)
                //     { responsivePriority: 3, targets: 4 }, // Roll no column (example)
                //     { responsivePriority: 4, targets: 1 }, // Graduation institute (example)
                //     { responsivePriority: 5, targets: 3 }  // Batch name no (example)
                // ]
            });
            $('#products').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true // Enable responsive extension
                // columnDefs: [
                //     { responsivePriority: 1, targets: 0 }, // Serial number column
                //     { responsivePriority: 2, targets: 5 }, // Name column (example)
                //     { responsivePriority: 3, targets: 4 }, // Roll no column (example)
                //     { responsivePriority: 4, targets: 1 }, // Graduation institute (example)
                //     { responsivePriority: 5, targets: 3 }  // Batch name no (example)
                // ]
            });
        });
    </script>
</body>

</html>