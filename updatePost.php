<?php
include "header.php";
include "mainmenu.php";

?>


<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <form action="updatePost.php" method="post" enctype="multipart/form-data">
                <h3>UPDATE POST</h3>
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
            <form action="updatePost2.php" method="post">
                <form action="updatePost2.php" method="post">
                        <div class="mb-3">
                            <label for="postId" class="form-label">Title:</label>
                            <select type="text" class="form-control" id="postId" name ="postId" placeholder="Select post:">
                                <?php foreach(Post::findAll() as $post): ?>
                                    <option value="<?php echo $post->getId(); ?>"><?php echo $post->title; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php else:?>
                        <div class="mb-3">
                            <form action="updatePost2.php" method="post">
                            <label for="postId" class="form-label">Title:</label>
                            <select type="text" class="form-control" id="postId" name ="postId" placeholder="Select post:">
                                <?php foreach(Post::findBy('topicId',$topicId) as $post): ?>
                                    <option value="<?php echo $post->getId(); ?>"><?php echo $post->title; ?></option>
                                <?php endforeach; ?>
                            </select>
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </form>
                        </div>

                    <?php endif;?>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                <?php unset($_POST['topicId']); endif;?>
            </form>
            <a href="admin.php"><button class="btn btn-info mt-2 col-md-2 offset-md-9">Back to admin page</button></a>
        </div>
    </div>
</div>
