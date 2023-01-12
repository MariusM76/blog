<?php
include "header.php";
include "mainmenu.php";

?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <form action="deletePost.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="topicId" class="form-label">Choose topic:</label>
                    <select type="text" class="form-control" id="topicId" name ="topicId" placeholder="Select topic:">
                        <option value="All">All</option>
                        <?php foreach(Topic::findAll() as $topic): ?>
                            <option value="<?php echo $topic->getId(); ?>"><?php echo $topic->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php
            if (isset($_POST['topicId'])):
            $topicId= $_POST['topicId'];
            if ($topicId=='All'):?>
            <form action="../blog-backend/processDeletePost.php" method="post">
                <div class="mb-3">
                    <label for="postId" class="form-label">Title:</label>
                    <select type="text" class="form-control" id="postId" name ="postId" placeholder="Select post:">
                        <?php foreach(Post::findAll() as $post):
                                ?>
                                <option value="<?php echo $post->getId(); ?>"><?php echo $post->title; ?> (Published: <?php echo $post->published;?> ) </option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <?php else:?>
                    <div class="mb-3">
                        <form action="../blog-backend/processDeletePost.php" method="post">
                            <label for="postId" class="form-label">Title:</label>
                            <select type="text" class="form-control" id="postId" name ="postId" placeholder="Select post:">
                                <?php
                                foreach(Post::findBy('topicId',$topicId) as $post):
                                        ?>
                                        <option value="<?php echo $post->getId(); ?>"><?php echo $post->title; ?>(Published: <?php echo $post->published;?> ) </option>
                                    <?php endforeach; ?>
                            </select>

                        </form>
                    </div>
                <?php endif;?>
                <button type="submit" class="btn btn-primary mt-2">Delete post</button>
                <?php unset($_POST['topicId']); endif;?>
            </form>
            <a href="admin.php"><button class="btn btn-info mt-2 col-md-2 offset-md-8">Back to admin page</button></a>
        </div>
    </div>
</div>
