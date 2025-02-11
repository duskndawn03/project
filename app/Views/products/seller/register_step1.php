<!DOCTYPE html>
<html>
<head>
    <title>Seller Registration - Step 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Register as a Seller - Step 1</h2>
        <form action="<?= site_url('seller/send-otp') ?>" method="post">
            <div class="mb-3">
                <label>Mobile Number</label>
                <input type="text" name="mobile_number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Send OTP</button>
        </form>
    </div>
</body>
</html>
