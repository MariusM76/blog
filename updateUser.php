<?php
include "header.php";
include "mainmenu.php";

$userToUpdate = new User($_GET['userId']);
?>

<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <form action="../blog-backend/processUpdateUser.php?userId=<?php echo $userToUpdate->getId(); ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
<!--                    <input hidden type="text" class="form-control" id="userId" name ="userId"  value="--><?php //echo $user->getId(); ?><!--">-->
                    <input type="text" class="form-control" id="username" name ="username" placeholder="Edit username:" value="<?php echo $userToUpdate->username; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name ="email" placeholder="Enter email:" value="<?php echo $userToUpdate->email; ?>">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role:</label>
                    <select type="text" class="form-control" id="role" name ="role">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subscribe" class="form-label">Subscribe:</label>
                    <select type="text" class="form-control" id="subscribe" name ="subscribe">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type:</label>
                    <select type="text" class="form-control" id="type" name ="type">
                        <option value="author">Author</option>
                        <option value="non_author">Non-Author</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="viewEditDeleteUsers.php"><button class="btn btn-info mt-2 col-md-4 offset-md-7">Back to users admin page</button></a>
        </div>
    </div>
</div>
