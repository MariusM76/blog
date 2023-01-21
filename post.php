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
                    <div class="px-2 mt-4 text-decoration-none text-muted fs-6"> PDF OPTIONS:
                        <a class="px-4 mx-3 offset-md-0 btn btn-info text-decoration-none text-muted fs-6" target="_blank" href="../blog-backend/postPDF.php?postId=<?php echo $post->getId(); ?>">Save to PDF</a>
                        <a class="px-2 btn btn-warning text-decoration-none text-muted fs-6" target="_self" href="../blog-backend/downloadToPDF.php?postId=<?php echo $post->getId(); ?>">download PDF</a>
                    </div >
                    <div class="px-2 mt-4 text-decoration-none text-muted fs-6">E-mail OPTIONS:
                        <a class=" px-4 btn btn-info text-decoration-none text-muted fs-6" target="_blank" href="../blog-backend/processSendEmail.php?postId=<?php echo $post->getId(); ?>">Send to email</a>
                    </div>
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
                                <h3 class="text-light bg-info">Messages (<?php echo count($messages) ?>) :</h3>
                            </button>
                        </h2>
                        <?php foreach($messages as $message): ?>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                                <div class="my-3"><?php echo $message->name; ?> wrote: </div>
                                <textarea disabled maxlength="350" class="form-control my-3" ><?php echo $message->message; ?></textarea>

                            <?php
                            $replies = Reply::findBy('messageId',$message->getid());
                            if (count($replies)>2):
                                foreach ($replies as $reply):
                                ?>
                                <div class="text-right">
                                    <div class="my-3"><?php echo $reply->name; ?> wrote: </div>
                                    <textarea disabled maxlength="350" class="form-control my-3 text-right" style="max-width: 550px;"><?php echo $reply->body; ?></textarea>
                                </div>
                                <?php endforeach;?>
                            <?php elseif (count($replies)==1): ?>
                            <div class="text-right">
                                <div class="my-3"><?php echo $replies[0]->name;?> replied: </div>
                                <textarea disabled maxlength="350" class="form-control my-3 text-right" style="max-width: 550px;"><?php echo $replies[0]->body; ?></textarea>
                            </div>
                            <?php endif;?>


                            <form action="../blog-backend/processReply.php" method="post"
                                <label class="btn-group dropend border-0">
                                    <button type="button" class="btn btn-secondary dropdown-toggle text-decoration-none border-0 border-top" data-bs-toggle="dropdown" aria-expanded="false">
                                        reply
                                    </button>
                                    <ul class="dropdown-menu border-0 bg-info">
                                    <?php
                                    if(getAuthUser()):
                                    $author = $_SESSION['authUser'];?>
                                        <label class="form-label text-decoration-none px-3"> <?php echo $author; ?>: </label>
                                        <input hidden for="messageId" name ="messageId" id="messageId" class="form-label" value="<?php echo $message->getId();?>">
                                        <input hidden for="userId" name ="userId" id="userId" class="form-label" value="<?php echo $_SESSION['id']; ?>"
                                        <input hidden for="messageId" name ="messageId" id="messageId" class="form-label" value="<?php echo $message->getId();?>">
                                        <textarea id="body" name="body" class="text-start mx-3" style="min-width: 650px;"></textarea>
                                        <li><hr class="dropdown-divider"></li>
                                        <button type="submit" class="btn">Submit</button>
                                    <?php else:?>
                                        <label class="form-label text-decoration-none px-3">  Name: </label>
                                        <input hidden for="messageId" name ="messageId" id="messageId" class="form-label" value="<?php echo $message->getId();?>">
                                        <input type="text" for="userName" name ="userName" id="userName" class="form-label text-decoration-none text-muted border-bottom border-top-0 border-start-0 border-end-0" ></input>
                                        <textarea id="body" name="body" class="text-start mx-3" style="min-width: 650px;"></textarea>
                                        <li><hr class="dropdown-divider"></li>
                                        <button type="submit" class="btn">Submit</button>
                                    <?php endif;?>
                                    </ul>
                                </div>
                            </form>
                        <?php endforeach;?>
                        </div>
                    </div>
                </div>
        <?php endif;?>
                <h3 class="my-5">Leave a message :</h3>
                <?php if(getAuthUser()): ?>
                <div><?php echo "  ".$_SESSION['authUser']." : " ?></div>
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