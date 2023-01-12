<?php

include "header.php";
include "mainmenu.php";

$messageToUpdate = new Message($_GET['messageId']);
$assignedPost = new Post($messageToUpdate->postId);

?>


<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <form action="../blog-backend/processUpdateMessage.php?messageId=<?php echo $messageToUpdate->getId(); ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="messageId" class="form-label">Update/Edit message:</label>
                    <input disabled type="text" class="form-control" id="messageId" name ="messageId" value="<?php echo $messageToUpdate->getId(); ?>">
                </div>
                <div class="my-3">
                    <label for="name" class="form-label">Change author (<?php echo $messageToUpdate->name; ?>) </label>
                    <select type="text" class="form-control" id="name" name ="name">
                        <?php foreach(Message::findAll() as $message): ?>
                            <option value="<?php echo $message->name; ?>"><?php echo $message->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="my-3">
                    <label for="message" class="form-label">Edit message:</label>
                    <input type="text" class="form-control" id="message" name ="message" value="<?php echo $messageToUpdate->message; ?>">
                </div>
                <div class="my-3">
                     <label for="postId" class="form-label">Assign to another post ( now on: "<?php echo $assignedPost->title; ?>" )</label>
                    <select type="text" class="form-control" id="postId" name ="postId">
                        <?php foreach(Post::findAll() as $post): ?>
                            <option value="<?php echo $post->getId(); ?>"><?php echo $post->title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>