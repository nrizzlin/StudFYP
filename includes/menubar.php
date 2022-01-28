<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-16">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-center">
                             <li><a href="coordinator/home.php?User=".$User;>Home</a></li>
                             <li><a href="admin_index.php?User=".$User;>Dashboard</a></li>
                             <li><a href="createuser.php?User=".$User;>Create User</a></li>
                              <li><a href="displayuser.php?User=".$User;>Display User</a></li>
                               
                               <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi fa-lg mdi-account-circle"></i> <?php echo $User ?>    
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li class="nav-item dropdown">
                                            <a href="logout.php?logout">Logout</a>
                                        </li>
                                    </ul>
                                 </li>

                            <li><a href="logout.php?logout">Logout</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>