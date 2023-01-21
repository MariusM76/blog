<?php
include 'header.php';
include "mainmenu.php";

?>


<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <form action="../blog-backend/processInsertTopic.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Topic name:</label>
                    <input autocomplete="off" type="text" class="form-control" id="name" name ="name" placeholder="Enter topic name:">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
<!--            <a href="admin.php"><button class="btn btn-info mt-2 col-md-4 offset-md-7">Back to admin page</button></a>-->
        </div>
    </div>
</div>
