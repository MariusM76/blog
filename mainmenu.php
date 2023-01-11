<?php include "../blog-backend/functions.php"; ?>

<div class="container-fluid">
    <div class="row justify-content-center border-top border-opacity-75 border border-2 shadow mb-5 bg-body rounded mt-4">
    </div>
    <div class="container mb-5">
        <div class="row justify-content-center mt-4">
            <div class="col-10 text-center">
                <h3 style="letter-spacing:0.3em;">EVERYTHING IS PERSONAL. INCLUDING THIS BLOG.</h3>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-12 text-center">
                <h3 style="text-align:center; font-size:116px;">Train of Thought</h3>
            </div>
        </div>
    </div>
    <div class="row mt-4 border-dark border-top border-bottom p-0 mb-5">
        <div>
            <div class="container nav justify-content-center">
                <div class="row">
                    <nav class="navbar navbar-expand">
                        <div class="container">
                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                                    style="--bs-scroll-height: 100px;">
                                    <li class="nav-item px-3 border-start border-end">
                                        <a class="nav-link fw-semibold" aria-current="page" href="home.php">Home</a>
                                    </li>
                                    <li class="nav-item px-3 border-start border-end">
                                        <a class="nav-link fw-semibold" href="myBlog.php">My Blog</a>
                                    </li>
                                    <li class="nav-item px-3 border-start border-end">
                                        <a class="nav-link fw-semibold" href="about.php">About</a>
                                    </li>
                                    <li class="nav-item px-3 border-start border-end">
                                        <a class="nav-link fw-semibold" href="#">Contact</a>
                                    </li>
                                </ul>
                                <form class="d-flex px-3" role="search">
                                    <input class="form-control fw-semibold me-2 border-bottom border-top-0 border-start-0 border-end-0"
                                           type="search" placeholder="Search..." aria-label="Search">
                                    <button class="btn btn-outline-secondary " type="submit"><i
                                                class="fa fa-search"></i></button>
                                </form>
                                <ul class="navbar-nav me-auto my-2 my-lg-0 px-4 border-start border-end text-decoration-none">
                                    <li class="nav-item px-2 text-decoration-none">
                                        <a class="text-decoration-none" href="#"><i
                                                    class="fa fa-facebook-official text-dark text-decoration-none"
                                                    aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item px-2">
                                        <a href="#"><i class="fa fa-instagram text-dark" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item px-2">
                                        <a href="#"><i class="fa fa-twitter text-dark" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item px-2">
                                        <a href="#"><i class="fa fa-pinterest-p text-dark" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
<!--                                --><?php //var_dump($_SESSION['role']);die; ?>
                                <span class="px-2">
                                    <?php if (getAuthUser() && $_SESSION['role']=='Admin'): ?>
                                        <?php echo "  Welcome,  ".$_SESSION['authUser']."   " ?>
                                        <span class="">
                                            <a class="btn btn-outline-info text-dark" href="../blog-backend/logout.php">Logout</a>
                                            <a class="btn btn-outline-info text-dark" href="../blog-frontend/admin.php">Go to Admin Panel</a>
                                        </span>
<!--                                    <span class="px-2">-->
<!--                                            <a class="btn btn-outline-info text-dark" href="../blog-frontend/admin.php">Go to Admin Panel</a>-->
<!--                                        </span>-->

                                </span>

                                <?php elseif (getAuthUser()): ?>
                                    <?php echo "  Welcome,  ".$_SESSION['authUser']."   " ?>
                                        <span class="">
                                            <a class="btn btn-outline-info text-dark" href="../blog-backend/logout.php">Logout</a>
                                        </span>
                                <?php else: ?>
                                    <form class="d-flex px-2" >
                                        <a href="login.php" class="btn btn-outline-success "  >Login</a>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>