<?php
include 'header.php';
include "mainmenu.php";
//include "../blog-backend/functions.php";
?>

<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <form action="../blog-backend/processInsertUser.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input autocomplete="off" type="text" class="form-control" id="username" name ="username" placeholder="Enter username:">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name ="email" placeholder="Enter email:">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name ="password" placeholder="Enter password:">
                </div>
                <div class="mb-3">
                    <label for="subscribe" class="form-label">Subscribe:</label>
                    <select type="text" class="form-control" id="subscribe" name ="subscribe" placeholder="Select:">
                        <?php $user = new User() ?>
                            <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="admin.php"><button class="btn btn-info mt-2 col-md-4 offset-md-7">Back to admin page</button></a>
        </div>
    </div>
</div>
