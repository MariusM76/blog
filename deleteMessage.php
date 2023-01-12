<?php

include "header.php";
include "mainmenu.php";

$messages = Message::findAll();
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <form action="deleteMessage.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="postId" class="form-label">Choose post to delete messages from: </label>
                    <select class="form-control" id="postId" name ="postId">
                        <?php foreach(Post::findBy('published','Y') as $post): ?>
                            <option value="<?php echo $post->getId(); ?>"><?php echo $post->title; ?> (No of messages: <?php echo $post->getNoOfMessages() ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary my-3">Submit</button>
            </form>
            <?php
            if (isset($_POST['postId'])):
                $post = new Post($_POST['postId']);
                $messagesForPostId = Message::findBy('postId',$_POST['postId']);
            if (count($messagesForPostId)>=2):?>
            <form action="../blog-backend/processDeleteMessage.php" method="post">

                    <div class="my-3">
                        <label for="messageId" class="form-label">Messages for post: <?php echo $post->title ;?></label>
                        <select class="form-control" id="messageId" name ="messageId" ">
                            <?php foreach($messagesForPostId as $messageForPostId):?>
                                <option value="<?php echo $messageForPostId->getId(); ?>"><?php echo $messageForPostId->message; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php elseif (count($messagesForPostId)==1):?>
                    <form action="../blog-backend/processDeleteMessage.php" method="post">
                        <div class="mb-3">
                            <label for="messageId" class="form-label">Message for post: <?php echo $post->title ;?></label>
                            <select class="form-control" id="messageId" name ="messageId" ">
                                <option value="<?php echo $messagesForPostId[0]->getId(); ?>"><?php echo $messagesForPostId[0]->message; ?> </option>
                            </select>
                        </div>

                <?php endif;?>
                <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <?php unset($_POST['postId']); endif;?>
            </form>
        </div>
    </div>
</div>
