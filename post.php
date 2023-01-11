<?php
include "header.php";
include "mainmenu.php";
//include "../blog-backend/views.php";


$post = new Post($_GET['postId']);

$lastPostsQuery = "SELECT * FROM POSTS ORDER BY id DESC LIMIT 3";
$lastPosts = query($lastPostsQuery);
$lastPosts = ObjFromArray($lastPosts);

?>

<div class="container justify-content-center">
    <div class="row justify-content-center">
        <div class="col-8">
            <?php
            $image = new Image ($post->imageId);
            $crtDate = date('d m Y');
            $lastUpdate = lastUpdateShow($post->getId());
            ?>
            <div class="card mb-4 px-5 border-dark">
                <div class="card-body ">
                    <p class="card-text"><small class="text-muted"><?php echo $post->createdAt; ?>
                            <i class="fa fa-heart-o px-1 offset-md-8 text-decoration-none text-muted fs-6" aria-hidden="true">
                                <span class="top-0 start-100 translate-middle badge rounded-pill bg-info "><?php echo $post->likes; ?>
<!--                                    <span class="visually-hidden">unread messages</span>-->
                                </span>
                            </i></small>
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
                                <h3 class="text-light bg-info">Messages :</h3>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <?php foreach($messages as $message): ?>
                                <div class="my-3"><?php echo $message->name; ?> wrote: </div>
                                <textarea maxlength="350" class="form-control my-3" ><?php echo $message->message; ?></textarea>
                            <?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
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