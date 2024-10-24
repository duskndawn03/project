<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
        <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="<?php echo $baseurl; ?>/"><img src="<?php echo $baseurl; ?>/assets/img/logo.png" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <a href="#">Login</a>
        <a href="#">Register</a>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-1 col-lg-1">
                <div class="header__logo">
                    <a href="<?php echo $baseurl; ?>/"><img src="<?php echo $baseurl; ?>/assets/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="<?php echo $baseurl; ?>/">Home</a></li>

                        <li><a href="#">STUDY MATERIAL</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo $baseurl; ?>/pages/books/books.php">BOOKS</a></li>
                                <li><a href="#">COURSES</a></li>
                                <li><a href="<?php echo $baseurl; ?>/pages/calculator/">CALCULATORS</a></li>
                            </ul>
                        </li>

                        <li><a href="#">PLANNING & PROCUREMENT</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo $baseurl; ?>/pages/business.php">BUSINESS DIRECTORY</a></li>
                                <li><a href="<?php echo $baseurl; ?>/shop.php">PRODUCTS</a></li>
                                <li><a href="<?php echo $baseurl; ?>/shop.php">PLANNING MATERIALS</a></li>
                                <li><a href="<?php echo $baseurl; ?>/shop.php">SERVICES</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="<?php echo $baseurl; ?>/pages/ipealumni/ipealumni.php">AlUMNIES</a></li>

                        <li><a href="#">NEWS & CIRCULARS</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo $baseurl; ?>/news/news.php">NEWS</a></li>
                                <li><a href="<?php echo $baseurl; ?>/pages/jobs/jobs.php">JOB CIRCULARS</a></li>
                            </ul>
                        </li>
                        <li><a href="#">CONTACT US</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo $baseurl; ?>/shop.php">ABOUT US</a></li>
                            </ul>
                        </li>
                
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        <a href="#">Login</a>
                        <a href="#">Register</a>
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                        
                        <!-- <li>
                            <a href="#" id="dark-mode-toggle">
                                <span class="fa fa-moon-o"></span>
                            </a>
                        </li> -->

                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>