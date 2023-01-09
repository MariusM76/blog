<?php
include "header.php";
include "mainmenu.php";

$post = new Post($_GET['postId']);
//$postId = $_GET['postId'];
//var_dump($_GET['postId']);die;
?>

<div class="container nav justify-content-center">
    <div class="row">
        <nav class="navbar navbar-expand">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                        style="--bs-scroll-height: 100px;">
                        <li class="nav-item px-4 border-end">
                            <a class="nav-link fw-semibold" aria-current="page" href="#">All Posts</a>
                        </li>
                        <li class="nav-item px-4 border-end">
                            <a class="nav-link fw-semibold" href="#">Travel</a>
                        </li>
                        <li class="nav-item px-4 border-end">
                            <a class="nav-link fw-semibold" href="#">My Top 5</a>
                        </li>
                        <li class="nav-item px-4 border-end">
                            <a class="nav-link fw-semibold" href="#">Art & Culture</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="container justify-content-center">
    <div class="row justify-content-center">
        <div class="col-8">
            <?php
            $image = new Image ($post->imageId);
            $crtDate = date('d m Y');
            $lastUpdate = lastUpdateShow($post->getId());
            ?>
            <div class="card mb-4 px-5 border-dark">
                <div class="card-body ">
                    <p class="card-text"><small class="text-muted"><?php echo $post->createdAt; ?></small></p>
                    <h2 class="card-title my-4"><?php echo $post->title; ?></h2>
                    <img src="images/<?php echo $image->file; ?>" class="card-img-top" alt="...">
                    <p class="card-text my-4"><?php echo $post->body; ?></p>
                    <p class="card-text border-bottom p-2"><small class="text-muted">Last update: <?php echo $lastUpdate; ?></small></p>
                    <div class="mb-4 text-decoration-none">
                            <a href="#"><i class="fa fa-instagram text-dark px-2 text-start" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter text-dark px-2 text-start" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p text-dark px-2 text-start" aria-hidden="true"></i></a>
                        <span class="mb-4 px-2 offset-md-8 text-decoration-none text-muted fs-6">Topic: <?php echo $post->getTopicName(); ?></span>
                    </div>
                </div>
            </div>
            <div class="my-4">
                <span class="mb-4 px-2 text-decoration-none text-muted fs-6">Recent posts</span>
                <a class="mb-4 px-2 offset-md-9 text-decoration-none text-muted fs-6">See All></a>
            </div>
            <div class="card-group">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
                <div class="card mx-3">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>