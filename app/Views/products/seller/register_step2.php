<!DOCTYPE html>
<html>
<head>
    <title>Seller Registration - Step 2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Register as a Seller - Step 2</h2>
        <form action="<?= site_url('seller/register') ?>" method="post">
            <input type="hidden" name="mobile_number" value="<?= session('mobile_number') ?>">

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Store Name</label>
                <input type="text" name="store_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Complete Registration</button>
        </form>
    </div>
</body>
</html>
