<?php
include "header.php";
include "mainmenu.php";

$topicToUpdate = new Topic($_GET['topicId']);
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-12">
            <form action="updateTopic.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <form action="../blog-backend/processUpdateTopic.php" method="post">
                        <div class="my-3">
                            <label for="topicName" class="form-label">Topic to edit/update: </label>
                            <input hidden type="text" class="form-control" id="topicId" name ="topicId" value="<?php echo $topicToUpdate->getId(); ?>">
                            <input type="text" class="form-control" id="topicName" name ="topicName" placeholder="Update topic name" value="<?php echo $topicToUpdate->name; ?>">
                        </div>
                        <button formaction="../blog-backend/processUpdateTopic.php" type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                </div>
                <a href="viewEditDeleteTopic.php"><button class="btn btn-info mt-2 col-md-3 offset-md-8">Back to topic admin page</button></a>
        </div>
    </div>
</div>



<!--    <div class="container">-->
<!--    <div class="row mt-4">-->
<!--        <div class="col-12">-->
<!--            <form action="updateTopic.php" method="post" enctype="multipart/form-data">-->
<!--                <div class="mb-3">-->
<!--                    <label for="topicId" class="form-label">Choose topic to update/edit:</label>-->
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
//            if ($topicId=='All'):?>
<!--                <div class="mb-3">-->
<!--                    <label for="xyz" class="form-label"></label>-->
<!--                    <span>Can`t edit this, choose another topic</span>-->
<!--                </div>-->
<!--                --><?php //else:
//                    $topicToEdit = new Topic($_POST['topicId']);
//                    ?>
<!--                    <form action="../blog-backend/processUpdateTopic.php" method="post">-->
<!--                    <div class="my-3">-->
<!--                        <label for="topicName" class="form-label">Edit topic name</label>-->
<!--                        <input hidden type="text" class="form-control" id="topicId" name ="topicId" value="--><?php //echo $topicToEdit->getId(); ?><!--">-->
<!--                        <input type="text" class="form-control" id="topicName" name ="topicName" placeholder="Update topic name" value="--><?php //echo $topicToEdit->name; ?><!--">-->
<!--                    </div>-->
<!--                --><?php //endif;?>
<!--                <button formaction="../blog-backend/processUpdateTopic.php" type="submit" class="btn btn-primary mt-2">Submit</button>-->
<!--                --><?php //unset($_POST['topicId']); endif;?>
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

