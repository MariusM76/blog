<?php
include 'header.php';
include 'mainmenu.php';
?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <div class="card text-center bg-info">
                <div class="card-header">
                    <div class="border border-top-0 border-start-0 border-end-0 border-dark mt-3"><h3>ADMIN PANEL</h3></div>
                    <ul class="nav nav-tabs card-header-tabs justify-content-around mt-5">
                        <li class="nav-item list-group-flush">
                            <div class="dropdown-center">
                                <button class="btn btn-light dropdown-toggle mb-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage posts
                                </button>
                                <ul class="dropdown-menu list-group-flush rounded-4">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="viewEditDeletePosts.php">View/Edit/Delete posts</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="insertPost.php">Add post</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="publishPost.php">Publish post</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown-center">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage topics
                                </button>
                                <ul class="dropdown-menu rounded-4">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="viewEditDeleteTopic.php">View/Edit/Delete topics</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="insertTopic.php">Add topics</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown-center ">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage messages
                                </button>
                                <ul class="dropdown-menu rounded-4">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="viewMessages.php">View/Edit messages</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="deleteMessage.php">Delete message</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown-center">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage users
                                </button>
                                <ul class="dropdown-menu rounded-4">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="viewEditDeleteUsers.php">View/Edit/Delete users</a></li>
                                    <li ><hr class="dropdown-divider"></li>
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="insertUser.php">Add user</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown-center">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Miscellaneous
                                </button>
                                <ul class="dropdown-menu rounded-4">
                                    <li class="list-group-item list-group-item-action list-group-item-info"><a class="dropdown-item" href="textOverImage.php">Add text to an image</a></li>
                                    <li ><hr class="dropdown-divider"></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Welcome admin!!</h5>
                    <p class="card-text">You can select an option from menus</p>
                    <a href="home.php" class="btn btn-secondary">Go to home page</a>
                </div>
            </div>
        </div>
    </div>
</div>
