<?php
include "header.php";
include "mainmenu.php";

$topics = Topic::findAll();
?>

<div class="container nav justify-content-center">
    <div class="row">
        <nav class="navbar navbar-expand">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                        style="--bs-scroll-height: 100px;">
                        <li class="nav-item px-4 border-end">
                            <a class="nav-link fw-semibold" aria-current="page" href="myBlog.php?topicId=">All Posts</a>
                        </li>
<!--                        <form method="post">-->
                        <?php
                        foreach ($topics as $topic):
                            ?>
                        <form method="post">
                            <li id="topic" name="topic" value="<?php echo $topic->getId(); ?>" class="nav-item px-4 border-end">
                                <input hidden id="topic" name="topic" value="<?php echo $topic->getId(); ?>">
                                <a class="nav-link fw-semibold" href="myBlog.php?topicId=<?php echo $topic->getId(); ?>"><?php echo $topic->name; ?></a>
                            </li>
                        </form>
                        <?php endforeach; ?>
<!--                        </form>-->
                        <li class="nav-item px-4 border-end">
                            <a class="nav-link fw-semibold" href="#">My Top 5</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<?php //var_dump($_GET['topicId']);die;?>
<div class="container">
    <div class="row justify-content-center">
        <?php
        if (!isset($_GET['topicId']) || $_GET['topicId']=='' ):
            $allPost = Post::findAll();
        else :
            $allPost = Post::findBy('topicId',$_GET['topicId']);
        endif;
        foreach ($allPost as $post):
        if ($post->published=='Y'):
        $image = new Image ($post->imageId);
        ?>
        <div class="col-5">
            <div class="card-group my-4">
                <div class="card mb-3 border-dark">
                    <a class="text-decoration-none fw-semibold text-dark link-info"
                       href="post.php?postId=<?php echo $post->getId() ?>">
                        <img src="images/<?php echo $image->file ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><small class="text-muted"><?php echo $post->createdAt; ?></small></p>
                            <h5 class="card-title"><?php echo $post->title ?></h5>
                            <p class="card-text text-truncate"><?php echo $post->body ?></p>
                            <p>Continue reading >></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; endforeach; unset($_GET['topicId']); ?>

</div>