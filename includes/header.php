<nav class="navbar navbar-expand-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $baseurl; ?>/"><img src="<?php echo $baseurl; ?>/assets/img/logo.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseurl; ?>/">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Study</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo $baseurl; ?>/pages/books/">Books</a></li>
                        <li><a class="dropdown-item" href="#">Courses</a></li>
                        <li><a class="dropdown-item" href="<?php echo $baseurl; ?>/pages/calculator/">Calculator</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Planning</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo $baseurl; ?>/pages/business.php">Business Directory</a></li>
                        <li><a class="dropdown-item" href="<?php echo $baseurl; ?>/pages/products/">Products</a></li>
                        <li><a class="dropdown-item" href="<?php echo $baseurl; ?>/shop.php">Planning Materials</a></li>
                        <li><a class="dropdown-item" href="<?php echo $baseurl; ?>/shop.php">Services</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $baseurl; ?>/pages/alumni/">Alumnies</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">News</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo $baseurl; ?>/news/news.php">News</a></li>
                        <li><a class="dropdown-item" href="<?php echo $baseurl; ?>/pages/jobs/jobs.php">Jobs</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Contact Us</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo $baseurl; ?>/pages/business.php">About Us</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-outline-primary" type="button">Search</button>
            </form>
        </div>
    </div>
</nav>