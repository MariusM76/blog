<?php
include "header.php";
include "mainmenu.php";

$postToUpdate= new Post($_GET['postId']);
?>


<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <h3>Update post: </h3>
            <form action="../blog-backend/processUpdatePost.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input hidden type="text" class="form-control" id="postId" name ="postId" value="<?php echo $postToUpdate->getId(); ?>">
                    <label for="userId" class="form-label">Author (user ID):</label>
                    <select type="text" class="form-control" id="userId" name ="userId" placeholder="Select author:">
                        <?php foreach(User::findAll() as $user): ?>
                            <option value="<?php echo $user->getId(); ?>"><?php echo $user->username; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="topicId" class="form-label">Update post topic: </label>
                    <select type="text" class="form-control" id="topicId" name ="topicId" placeholder="Select topic:">
                        <?php foreach(Topic::findAll() as $topic): ?>
                            <option value="<?php echo $topic->getId(); ?>"><?php echo $topic->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name ="title" placeholder="Update post title" value="<?php echo $postToUpdate->title; ?>">
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Content</label>
                    <textarea class="form-control" id="body" name ="body" placeholder="Enter post content:" ><?php echo $postToUpdate->body; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name ="image" placeholder="Select your image:">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="viewEditDeletePosts.php"><button class="btn btn-info mt-2 col-md-2 offset-md-9">Back to edit/update/delete admin page</button></a>
            </form>

        </div>
    </div>
</div>
