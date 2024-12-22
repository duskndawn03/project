<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container my-5">
        <h1 class="mb-4">Categories</h1>

        <!-- Add Category -->
        <form action="categories/createCategory" method="post" class="mb-4">
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
        <table class="table table-bordered">
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
                                <form action="categories/updateCategory/<?= $category['category_id'] ?>" method="post" class="d-inline-flex">
                                    <input type="text" name="category_name" class="form-control" value="<?= $category['category_name'] ?>" required>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </form>
                                <form action="categories/deleteCategory/<?= $category['category_id'] ?>" method="post" class="d-inline">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h1 class="mt-5 mb-4">Subcategories</h1>

        <!-- Add Subcategory -->
        <form action="categories/createSubcategory" method="post" class="mb-4">
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
        <table class="table table-bordered">
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
                                <form action="categories/updateSubcategory/<?= $subcategory['subcategory_id'] ?>" method="post" class="d-inline-flex">
                                    <input type="text" name="subcategory_name" class="form-control" value="<?= $subcategory['subcategory_name'] ?>" required>
                                    <select name="category_id" class="form-select" required>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?= $category['category_id'] ?>" <?= $subcategory['category_id'] == $category['category_id'] ? 'selected' : '' ?>><?= $category['category_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </form>
                                <form action="categories/deleteSubcategory/<?= $subcategory['subcategory_id'] ?>" method="post" class="d-inline">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
