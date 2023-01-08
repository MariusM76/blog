<?php
include "header.php";
include "mainmenu.php";

?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <form action="../blog-backend/processInsertPost.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="topicId" class="form-label">Category</label>
                    <select type="text" class="form-control" id="topicId" name ="topicId" placeholder="Select topic:">
                        <?php foreach(Topic::findAll() as $topic): ?>
                            <option value="<?php echo $topic->getId(); ?>"><?php echo $topic->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name ="title" placeholder="Enter post title:">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Content</label>
                    <textarea class="form-control" id="body" name ="body" placeholder="Enter post content:"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name ="image" placeholder="Select your image:">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="admin.php"><button class="btn btn-primary mt-2">Back to admin page</button></a>
        </div>
    </div>
</div>

