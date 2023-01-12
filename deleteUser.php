<?php
include "header.php";
include "mainmenu.php";

?>

<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <form action="deleteUser.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="userId" class="form-label">Choose user to delete:</label>
                    <select type="text" class="form-control" id="userId" name ="userId" placeholder="Select user:">
                        <?php foreach(User::findAll() as $user): ?>
                            <option value="<?php echo $user->getId(); ?>"><?php echo $user->username; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php
            if (isset($_POST['userId'])):
                $userId= $_POST['userId'];
            $userToDelete = new User($userId);
            ?>
                <form action="../blog-backend/processDeleteUser.php" method="post">
                    <div class="my-3">
                        <label for="userName" class="form-label">Are you sure you want to delete this user ?</label>
                        <input hidden type="text" class="form-control" id="userId" name ="userId" value="<?php echo $userToDelete->getId(); ?>">
                        <input disabled type="text" class="form-control" id="userName" name ="userName" value="<?php echo $userToDelete->username; ?>">
                    </div>

                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            <?php unset($_POST['topicId']); endif;?>
            </form>
            <a href="admin.php"><button class="btn btn-info mt-2 col-md-4 offset-md-6">Back to admin page</button></a>
        </div>
    </div>
</div>