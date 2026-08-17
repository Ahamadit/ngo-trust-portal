<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img
                            src="assets/logo/logo2.png"
                            alt="navbar brand"
                            class="navbar-brand"
                            height="50" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a  href="dashboard.php" class="collapsed" aria-expanded="false">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                                <span class="cat"></span>
                            </a>

                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#base">
                                <i class="fas fa-info-circle"></i> <!-- About Us -->

                                <p>About Us</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="authorization.php">
                                            <span class="sub-item">Authorization</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="our_team.php">
                                            <span class="sub-item">Our Team</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="what_we_do.php">
                                <i class="fas fa-briefcase"></i>
                                <p>What We DO</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a  href="banner.php">
                                <i class="fas fa-image"></i> <!-- for "Banner" -->
                                <p>Banner</p>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a  href="download.php">
                                <i class="fas fa-image"></i> <!-- for "Banner" -->
                                <p>Download</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->