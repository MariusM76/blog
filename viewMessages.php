<?php

include "header.php";
include "mainmenu.php";

$posts = Post::findAll();
?>

<div class="container">
    <table class="table  table-info table-striped">
        <div class="text-center my-3"><h3>BLOG MESSAGES: </h3></div>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Topic</th>
            <th scope="col">Post title</th>
            <th scope="col">Created on</th>
            <th scope="col">No of messages</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
        foreach ($posts as $post):
            $i = $i +1
            ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $post->getTopicName(); ?></td>
                <td><?php echo $post->title; ?></td>
                <td><?php echo $post->createdAt; ?></td>
                <td><?php echo $post->getNoOfMessages(); ?></td>
                <td>
                    <button type="button" id="myModal" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal-<?php echo $post->getId();?>">
                        View post messages
                    </button>

                    <div class="modal fade modal-xl" id="myModal-<?php echo $post->getId();?>"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="myModal">Post no. <?php echo $post->getId();?> (<?php echo $post->title;?>) : </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Message ID</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Author</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <?php
                                        $messages = Message::findBy('postId',$post->getId());
                                        $j=0;
                                        if (count($messages)>=2){
                                            foreach ($messages as $message):
                                                $j = $j + 1;
                                                ?>
                                                <tr>
                                                    <td ><?php echo $j; ?></td>
                                                    <td><?php echo $message->getId();?></td>
                                                    <td><?php echo $message->message;?></td>
                                                    <td><?php echo $message->name;?></td>
                                                    <td>
                                                        <a href="updateMessage.php?messageId=<?php echo $message->getId(); ?>"><button type="submit" class="btn btn-info" data-bs-dismiss="modal" aria-label="Update">Edit/Update</button></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php
                                        } elseif (count($messages)==1){
                                            ?>
                                            <tr>
                                                <td>1</td>
                                                <td><?php echo $messages[0]->getId();?></td>
                                                <td><?php echo $messages[0]->message;?></td>
                                                <td><?php echo $messages[0]->name;?></td>
                                                <td>
                                                    <a href="updateMessage.php?messageId=<?php echo $messages[0]->getId(); ?>"><button type="submit" class="btn btn-info" data-bs-dismiss="modal" aria-label="Update">Edit/Update</button></a>
                                                </td>
                                            </tr>
                                        <?php }; ?>
                                        <tr>
                                            <th scope="row">#</th>
                                            <td><b>TOTAL MESSAGES:  </b></td>
                                            <td class="col-md-6 offset-md-6"><b><?php echo count($messages);?> </b></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
