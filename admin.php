<?php
include 'header.php';
//include "../blog-backend/functions.php";
include 'mainmenu.php';
?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <div class="card text-center">
                <div class="card-header">
                    <div class="border border-top-0 border-start-0 border-end-0 border-danger mt-3"><h3>ADMIN PANEL</h3></div>
                    <ul class="nav nav-tabs card-header-tabs justify-content-around mt-5">
                        <li class="nav-item list-group-flush">
                            <div class="dropdown-center">
                                <button class="btn btn-warning dropdown-toggle mb-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage posts
                                </button>
                                <ul class="dropdown-menu list-group-flush">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="insertPost.php">Add post</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="updatePost.php">Update post</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="deletePost.php">Delete post</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="publishPost.php">Publish post</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown-center">
                                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage topics
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="insertTopic.php">Add topics</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="updateTopic.php">Update topics</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="deleteTopic.php">Delete topics</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown-center">
                                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage users
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="insertUser.php">Add user</a></li>
                                    <li ><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="updateUser.php">Update user</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="deleteUser.php">Delete user</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="showUsers.php">Show users</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown-center">
                                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage messages
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="insertMessage.php">Add message</a></li>
                                    <li ><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="viewMessages.php">View messages</a></li>
                                    <li ><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="updateMessage.php">Update message</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="deleteMessage.php">Delete message</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown-center">
                                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage orders
                                </button>
                                <ul class="dropdown-menu">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="viewOrders.php">View orders</a></li>
                                    <li ><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="updateOrder.php">Update order</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="deleteOrder.php">Delete order</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Welcome admin!!</h5>
                    <p class="card-text">You can select an option from menus</p>
                    <a href="searchProductCategorySales"><button type="submit" class="btn btn-dark">Sales statistics</button></a>
                    <a href="main.php" class="btn btn-primary">Go to main page</a>
                </div>
            </div>
        </div>
    </div>
</div>
