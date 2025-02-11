<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Verify OTP</h2>
        <form action="<?= site_url('seller/check-otp') ?>" method="post">
            <div class="mb-3">
                <label>Mobile Number</label>
                <input type="text" name="mobile_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>OTP Code</label>
                <input type="text" name="otp" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Verify OTP</button>
        </form>
    </div>
</body>
</html>
