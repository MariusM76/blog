<?php
include "header.php";
include "mainmenu.php";

$topicToDelete = new Topic($_GET['topicId']);
?>

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-10">
            <h4> ARE YOU SURE YOU WANT TO DELETE THIS POST: </h4>
            <h5><?php echo $topicToDelete->name;?> (Posts: <?php echo $topicToDelete->getNoOfPosts();?>)</h5>
            <div class="mb-3">
                <form action="../blog-backend/processDeleteTopic.php" method="post">
                    <input hidden id="topicId" name ="topicId" value="<?php echo $topicToDelete->getId(); ?>">
                    <button type="submit" class="btn btn-danger mt-2">Delete topic</button>
                </form>
            </div>
            <a href="viewEditDeleteTopic.php"><button class="btn btn-info mt-2 col-md-3 offset-md-8">Back to topic admin page</button></a>
        </div>
    </div>
</div>


<!---->
<!--<div class="container">-->
<!--    <div class="row mt-4">-->
<!--        <div class="col-12">-->
<!--            <form action="deleteTopic.php" method="post" enctype="multipart/form-data">-->
<!--                <div class="mb-3">-->
<!--                    <label for="topicId" class="form-label">Choose topic to delete:</label>-->
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
//                if ($topicId=='All'):?>
<!--                    <div class="mb-3">-->
<!--                        <label for="xyz" class="form-label"></label>-->
<!--                        <span>Can`t delete this, choose another topic</span>-->
<!--                    </div>-->
<!--                --><?php //else:
//                $topicTodelete = new Topic($_POST['topicId']);
//                ?>
<!--                <form action="../blog-backend/processDeleteTopic.php" method="post">-->
<!--                    <div class="my-3">-->
<!--                        <label for="topicName" class="form-label">Are you sure you want to delete this topic ?</label>-->
<!--                        <input hidden type="text" class="form-control" id="topicId" name ="topicId" value="--><?php //echo $topicTodelete->getId(); ?><!--">-->
<!--                        <input disabled type="text" class="form-control" id="topicName" name ="topicName" placeholder="Update topic name" value="--><?php //echo $topicTodelete->name; ?><!--">-->
<!--                    </div>-->
<!---->
<!--                <button type="submit" class="btn btn-primary mt-2">Submit</button>-->
<!--                    --><?php //endif;?>
<!--                --><?php //unset($_POST['topicId']); endif;?>
<!--            </form>-->
<!--            <a href="admin.php"><button class="btn btn-info mt-2 col-md-2 offset-md-8">Back to admin page</button></a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
