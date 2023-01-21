<?php

include "header.php";
include "mainmenu.php";

$users = User::findAll();
?>
<div class="container">
    <table class="table  table-info table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Subscribe</th>
            <th scope="col">Type</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php
            $i=0;
            foreach ($users as $user):
            $i = $i +1
            ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->role; ?></td>
                <td><?php echo $user->subscribe; ?></td>
                <td><?php echo $user->type; ?></td>
                <td>
                <a href="updateUser.php?userId=<?php echo $user->getId(); ?>"><button type="button"  class="btn btn-info">
                        Edit/Update user data
                    </button>
                </a>
                <a href="deleteUser.php?userId=<?php echo $user->getId(); ?>"><button type="button"  class="btn btn-danger">
                        Delete user
                    </button>
                </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>