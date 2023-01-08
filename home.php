<?php
include "header.php";
include "mainmenu.php";
//include "../blog-backend/functions.php";
?>

<div class="container-fluid">
    <div class="row mt-5 p-0 mb-5">
        <div>
            <div class="container justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <?php
                        $allPost = Post::findAll();
                        $countPosts = count ($allPost)-1;
                        $lastPost = $allPost[$countPosts];
                        $image = new Image ($lastPost->imageId);
//                        var_dump($image->file);die;
                        ?>
                        <div class="card mb-3 border-dark">
                            <img src="images/<?php echo $image->file ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $lastPost->title ?></h5>
                                <p class="card-text"><?php echo $lastPost->body ?></p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 border-dark border-top border-bottom p-0 mb-5">
        <div class="col-5 mt-5 mb-5 text-center">
            <h2 class="mt-5 mb-5">Never Miss a New Post.</h2>
        </div>
        <div class="col-5 mt-5 mb-5 text-end">
            <input class="fs-4 mt-5 mb-5 border-top-0 border-start-0 border-end-0" type="email"
                   placeholder="Enter your email: ">
            <button class="btn btn-outline-info fs-5 mt-5 mb-5 " type="submit">Subscribe</button>
        </div>
    </div>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-8 border-end p-0 text-center">
                <div>
                    <h4 class="mt-4 mb-3" style="letter-spacing:0.4em;">TRAIN OF THOUGHT</h4>
                </div>

                <div class="row g-0">
                    <div class="">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text text-start">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text text-start"><small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-4">
                <h4 class="mt-4 mb-3" style="letter-spacing:0.4em;">ABOUT ME</h4>
            </div>
        </div>
    </div>
</div>
