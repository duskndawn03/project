<nav class="navbar sticky-top bg-body-tertiary navbar-expand-sm border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/assets/img/logo.png" alt="Logo"></a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">Study Materials</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>study/books/">Books</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>study/courses/">Courses</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>study/calculators/">Calculators</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">Supply Chain</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>supply/business/">Business Directory</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>supply/planning/">Planning Materials</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>supply/services/">Services</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>supply/products/">Products</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">IPE Network</a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?php echo base_url(); ?>ipe/alumni/">Alumni</a></li>
                        <li><a class="nav-link" href="<?php echo base_url(); ?>ipe/forum/">Forum</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">News & Circulars</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>news/">News</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>circulars/jobs/">Jobs</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#">Contact Us</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">About Us</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-outline-primary" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </form>

            <!-- Dark Mode Toggle Button -->
            <button id="toggleTheme" class="btn btn-outline-secondary ms-2">
                <i class="fa fa-sun-o" id="themeIcon"></i>
            </button>
        </div>
    </div>
</nav>
