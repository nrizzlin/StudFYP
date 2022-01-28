<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-left">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="assignation.php">Assignation </a></li>
                            <li><a   href="calendar.php">Calendar</a></li>
                             <li><a href="progress.php">Progress</a></li>
                             <li><a href="/studfyp/admin_index.php">Manage User</a></li>
                              <li><a href="report.php">Report</a></li>
                              <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi fa-lg mdi-account-circle"></i> <?php echo $User ?>    
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li class="nav-item dropdown">
                                            <a href="/studfyp/logout.php?logout">Logout</a>
                                        </li>
                                    </ul>
                                 </li>

                            <li><a href="/studfyp/logout.php?logout">Logout</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
