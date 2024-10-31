<!-- Footer Section Begin -->
<footer class="container-fluid">
    <div class="row g-0">
        <div class="col-lg-4 col-md-6 col-sm-7">
            <div class="text-center p-3">
                <a href="<?php echo $baseurl; ?>">
                    <img src="<?php echo $baseurl; ?>/assets/img/logo.png" alt="Logo" class="img-fluid mb-3">
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    cilisis.</p>
                <div class="d-flex justify-content-center">
                    <a href="#" class="me-2"><img src="<?php echo $baseurl; ?>/assets/img/payment/payment-1.png" alt="Payment 1" class="img-fluid"></a>
                    <a href="#" class="me-2"><img src="<?php echo $baseurl; ?>/assets/img/payment/payment-2.png" alt="Payment 2" class="img-fluid"></a>
                    <a href="#" class="me-2"><img src="<?php echo $baseurl; ?>/assets/img/payment/payment-3.png" alt="Payment 3" class="img-fluid"></a>
                    <a href="#" class="me-2"><img src="<?php echo $baseurl; ?>/assets/img/payment/payment-4.png" alt="Payment 4" class="img-fluid"></a>
                    <a href="#"><img src="<?php echo $baseurl; ?>/assets/img/payment/payment-5.png" alt="Payment 5" class="img-fluid"></a>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-5">
            <div class="p-3">
                <h6 class="text-uppercase">Quick links</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none">About</a></li>
                    <li><a href="#" class="text-decoration-none">Blogs</a></li>
                    <li><a href="#" class="text-decoration-none">Contact</a></li>
                    <li><a href="#" class="text-decoration-none">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="p-3">
                <h6 class="text-uppercase">Account</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none">My Account</a></li>
                    <li><a href="#" class="text-decoration-none">Orders Tracking</a></li>
                    <li><a href="#" class="text-decoration-none">Checkout</a></li>
                    <li><a href="#" class="text-decoration-none">Wishlist</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-8">
            <div class="p-3">
                <h6 class="text-uppercase">NEWSLETTER</h6>
                <form action="#">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" aria-label="Email">
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                </form>
                <div class="d-flex justify-content-center">
                    <a href="#" class="me-2"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="me-2"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="me-2"><i class="fa fa-youtube-play"></i></a>
                    <a href="#" class="me-2"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-12">
            <div class="text-center p-3">
                <p>Copyright &copy; <span id="currentYear"></span> All rights reserved by IPE
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </p>
                <script>
                    document.getElementById('currentYear').textContent = new Date().getFullYear();
                </script>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
