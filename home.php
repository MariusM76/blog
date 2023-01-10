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
                        $crtDate = date('d m Y');
                        $lastUpdate = lastUpdateShow($lastPost->getId());
//                        var_dump($lastPost->createdAt);die;
                        ?>
                        <div class="card mb-3 border-dark">
                            <a class="text-decoration-none fw-semibold text-dark link-info" href="post.php?postId=<?php echo $lastPost->getId()?>">
                            <img src="images/<?php echo $image->file ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><small class="text-muted"><?php echo $lastPost->createdAt; ?></small></p>
                                <h5 class="card-title"><?php echo $lastPost->title ?></h5>
                                <p class="card-text text-truncate"><?php echo $lastPost->body ?></p>
                                <p class="card-text"><small class="text-muted">Last update: <?php echo $lastUpdate; ?></small></p>
                            </a>
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
        <div class="row ">
            <div class="col-8 border-end p-0 ">
                <div>
                    <h4 class="mt-4 mb-3" style="letter-spacing:0.4em;">TRAIN OF THOUGHT</h4>
                </div>
                <?php
                $allPost = Post::findAll();
                foreach ($allPost as $post):
                    $image = new Image ($post->imageId);
                    $lastUpdate = lastUpdateShow($lastPost->getId());
                ?>

                    <div class="card my-5 text-start col-md-6 offset-md-3" style="max-width: 640px;height: 253px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a class="text-decoration-none fw-semibold text-dark link-info" href="post.php?postId=<?php echo $post->getId()?>">
                                <img src="images/<?php echo $image->file ?>" class="img-fluid rounded-start" alt="...">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a class="text-decoration-none fw-semibold text-dark link-info" href="post.php?postId=<?php echo $post->getId()?>">
                                    <p class="card-text"><small class="text-muted"><?php echo $post->createdAt; ?></small></p>
                                    <h5 class="card-title"><?php echo $post->title ?></h5>
                                    <p class="card-text text-truncate"><?php echo $post->body ?></p>
                                    <p class="card-text my-3"><small class="text-muted border-top">Last updated: <?php echo $lastUpdate; ?></small></p>
                                    <p class="card-text "><?php echo $post->likes ?> <i class="fa fa-heart-o" aria-hidden="true"></i></p>
                                    </a>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>
            <div class="col-4 justify-content-center">
                <h4 class="mt-4 mb-3" style="letter-spacing:0.4em;">ABOUT ME</h4>
                <img src="images/about_me.png" class="img-fluid  my-5" style="max-width: 254px;height: 200px;" alt="...">
                <p class="d-flex col-md-8 offset-md-3" style="max-width: 90%;">
                    <span class="text-start" style="width: 80%;">I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. I’m a great place for you to tell a story and let your users know a little more about you.</span>
                </p>
                <a class="text-decoration-none fw-semibold text-dark link-info text-start" href="about.php">Continue reading >></a>
            </div>
        </div>
    </div>
</div>
