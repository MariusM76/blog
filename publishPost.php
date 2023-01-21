<?php

include "header.php";
include "mainmenu.php";

$unplublishedPosts = Post::findBy('published','N');
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h3>Unpublished posts (<?php echo count($unplublishedPosts); ?>) :</h3>
            <form action="../blog-backend/processPublishPost.php" method="post">
                <label for="postId" class="form-label"><h4>Title:</h4></label>
                    <?php
                    if (count($unplublishedPosts)>1):
                    ?>
                        <select type="text" class="form-control" id="postId" name ="postId" placeholder="Select post:">
                            <?php foreach($unplublishedPosts as $unplublishedPost):?>
                                <option value="<?php echo $unplublishedPost->getId(); ?>"><?php echo $unplublishedPost->title; ?></option>
                            <?php endforeach;?>
                        </select>
                <?php else:
                    $unplublishedPost = new Post($unplublishedPosts[0]->getId());
                    ?>
                <div class="col-10 my-2">
                    <input hidden type="text" class="form-control" id="postId" name ="postId" value="<?php echo $unplublishedPost->getId();?>">
                    <input disabled type="text" class="form-control" id="postId" name ="postId" value="<?php echo $unplublishedPost->title;?>">
                </div>
                <?php endif;?>
                <button type="submit" class="btn btn-primary mt-2">Publish</button>
            </form>
        </div>
    </div>
</div>



<!--<div class="container">-->
<!--    <div class="row mt-4">-->
<!--        <div class="col-12">-->
<!--            <h3>Unpublished posts (--><?php //echo count($unplublishedPosts); ?><!--) :</h3>-->
<!--            <form action="publishPost.php" method="post" enctype="multipart/form-data">-->
<!--                <div class="mb-3">-->
<!--                    <label for="topicId" class="form-label">Choose topic:</label>-->
<!--                    <select type="text" class="form-control" id="topicId" name ="topicId" placeholder="Select topic:">-->
<!--                        <option value="All">All</option>-->
<!--                        --><?php //foreach(Topic::findAll() as $topic): ?>
<!--                            <option value="--><?php //echo $topic->getId(); ?><!--">--><?php //echo $topic->name; ?><!--</option>-->
<!--                        --><?php //endforeach; ?>
<!--                    </select>-->
<!--                </div>-->
<!--                <button type="submit" class="btn btn-primary">Submit</button>-->
<!--            </form>-->
<!--            --><?php
//            if (isset($_POST['topicId'])):
//            $topicId= $_POST['topicId'];
//
//            if ($topicId=='All'):?>
<!--            <form action="../blog-backend/processPublishPost.php" method="post">-->
<!--                <div class="mb-3">-->
<!--                    <label for="postId" class="form-label">Title:</label>-->
<!--                    <select type="text" class="form-control" id="postId" name ="postId" placeholder="Select post:">-->
<!--                        --><?php //foreach(Post::findAll() as $post):
//                            if ($post->published=='N'):
//                        ?>
<!--                            <option value="--><?php //echo $post->getId(); ?><!--">--><?php //echo $post->title; ?><!--</option>-->
<!--                        --><?php //endif; endforeach; ?>
<!--                    </select>-->
<!--                </div>-->
<!--                --><?php //else:?>
<!--                    <div class="mb-3">-->
<!--                        <form action="../blog-backend/processPublishPost.php" method="post">-->
<!--                            <label for="postId" class="form-label">Title:</label>-->
<!--                            <select type="text" class="form-control" id="postId" name ="postId" placeholder="Select post:">-->
<!--                                --><?php
//                                foreach(Post::findBy('topicId',$topicId) as $post):
//                                    if ($post->published=='N'):
//                                ?>
<!--                                    <option value="--><?php //echo $post->getId(); ?><!--">--><?php //echo $post->title; ?><!--</option>-->
<!--                                --><?php //endif; endforeach; ?>
<!--                            </select>-->
<!---->
<!--                        </form>-->
<!--                    </div>-->
<!---->
<!--                --><?php //endif;?>
<!--                <button type="submit" class="btn btn-primary mt-2">Publish</button>-->
<!--                --><?php //unset($_POST['topicId']); endif;?>
<!--            </form>-->
<!--            <a href="admin.php"><button class="btn btn-info mt-2 col-md-2 offset-md-9">Back to admin page</button></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
