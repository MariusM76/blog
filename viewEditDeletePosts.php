<?php
include "header.php";
include "mainmenu.php";

$posts = Post::findAll();
?>

<div class="container">
    <table class="table  table-info table-striped">
        <div class="text-center my-3"><h3>POSTS: </h3></div>
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
                    <a href="updatePost2.php?postId=<?php echo $post->getId();?>" type="button"  class="btn btn-info">
                        Edit/Update post
                    </a>
                    <button type="button" id="myModal" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal-<?php echo $post->getId();?>">
                        View post
                    </button>
                    <a href="deletePost.php?postId=<?php echo $post->getId();?>" type="button"  class="btn btn-danger">
                            Delete post
                    </a>

                    <div class="modal fade modal-xl" id="myModal-<?php echo $post->getId();?>"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="myModal">Post no. <?php echo $post->getId();?> (<?php echo $post->title;?>) : </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="container justify-content-center">
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <?php
                                                $lastPostsQuery = "SELECT * FROM POSTS ORDER BY id DESC LIMIT 3";
                                                $lastPosts = query($lastPostsQuery);
                                                $lastPosts = ObjFromArray($lastPosts);
                                                $image = new Image ($post->imageId);
                                                $crtDate = date('d m Y');
                                                $lastUpdate = lastUpdateShow($post->getId());
                                                ?>
                                                <div class="card mb-4 px-5 border-dark">
                                                    <div class="card-body ">
                                                        <p class="card-text"><small class="text-muted"><?php echo $post->createdAt; ?>
                                                                <i class="fa fa-heart-o px-1 offset-md-8 text-decoration-none text-muted fs-6" aria-hidden="true">
                                                                    <span class="top-0 start-100 translate-middle badge rounded-pill bg-info "><?php echo $post->likes; ?>
                                                                    </span>
                                                                </i></small>
                                                        <p><small class="text-muted">Written by <?php echo $post->getAuthorName();?></small></p>

                                                        </p>
                                                        <h2 class="card-title my-4"><?php echo $post->title; ?></h2>
                                                        <img src="images/<?php echo $image->file; ?>" class="card-img-top" alt="...">
                                                        <p class="card-text my-4"><?php echo $post->body; ?></p>
                                                        <p class="card-text border-bottom p-2"><small class="text-muted">Last update: <?php echo $lastUpdate; ?></small></p>
                                                        <div class="mb-4 text-decoration-none">
                                                            <a href="#"><i class="fa fa-instagram text-dark px-2 text-start" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-twitter text-dark px-2 text-start" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-pinterest-p text-dark px-2 text-start" aria-hidden="true"></i></a>
                                                            <span class="mb-4 px-2 offset-md-7 text-decoration-none text-muted fs-6">Topic: <?php echo $post->getTopicName(); ?></span>
                                                        </div>
                                                        <span class="mb-4 px-2 text-decoration-none text-muted fs-6">If you like, drop a like:   </span>
                                                        <a class="text-decoration-none fw-semibold fs-5 text-dark" href="../blog-backend/addLike.php?postId=<?php echo $post->getId(); ?>"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>

                                                <div class="my-3 px-4">
                                                    <?php
                                                    $messages = Message::findBy('postId',$post->getId());
                                                    if (count($messages)>0):
                                                    ?>
                                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header bg-info" id="flush-headingOne">
                                                                <button class="accordion-button collapsed bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                                    <h3 class="text-light bg-info">Messages (<?php echo $post->getNoOfMessages(); ?>):</h3>
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                                <?php foreach($messages as $message): ?>
                                                                    <div class="my-3"><?php echo $message->name; ?> wrote: </div>
                                                                    <textarea disabled maxlength="350" class="form-control my-3" ><?php echo $message->message; ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; endif; ?>
                                                    <h3 class="my-4">Leave a reply :</h3>
                                                    <?php if(getAuthUser()): ?>
                                                        <div><?php echo "  ".$_SESSION['authUser']." reply:  " ?></div>
                                                        <form action="../blog-backend/addMessage.php" method="post">
                                                            <input hidden for="postId" name ="postId" id="postId" class="form-label" value="<?php echo $post->getId();?>">

                                                            <label for="message" class="form-label"></label>
                                                            <textarea maxlength="350" class="form-control" id="message" name ="message" placeholder="Enter post message: (max. 350 characters)"></textarea>
                                                            <button type="submit" class="btn btn-info my-3">Submit</button>
                                                        </form>
                                                    <?php else: ?>
                                                        <form action="../blog-backend/addMessage.php" method="post">
                                                            <input hidden for="postId" name ="postId" id="postId" class="form-label" value="<?php echo $post->getId();?>"></input>
                                                            <label for="name" class="form-label text-decoration-none text-muted">Name: </label>
                                                            <input type="text" for="name" name ="name" id="name" class="form-label text-decoration-none text-muted border-bottom border-top-0 border-start-0 border-end-0" ></input>
                                                            <label for="message" class="form-label"></label>
                                                            <textarea maxlength="350" class="form-control" id="message" name ="message" placeholder="Enter post message: (max. 350 characters)"></textarea>
                                                            <button type="submit" class="btn btn-info my-3">Submit</button>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="my-4 px-3">
                                                    <span class="mb-4 px-2 text-decoration-none text-muted fs-6">Recent posts</span>
                                                    <a href="myBlog.php" class="mb-4 px-2 offset-md-9 text-decoration-none text-muted fs-6">See All></a>
                                                </div>
                                                <div class="card-group mx-2">
                                                    <?php
                                                    foreach ($lastPosts as $lastPost):
                                                        $image = new Image($lastPost->imageId);
                                                        ?>
                                                        <div class="card mx-2">
                                                            <a class="text-decoration-none fw-semibold text-dark link-info" href="post.php?postId=<?php echo $lastPost->id?>">
                                                                <img src="images/<?php echo $image->file; ?>" class="card-img-top" alt="...">
                                                                <div class="card-body">
                                                                    <h6 class="card-title"><?php echo $lastPost->title; ?></h6>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
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