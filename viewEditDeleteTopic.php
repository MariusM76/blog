<?php
include "header.php";
include "mainmenu.php";

$topics = Topic::findAll();
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <table class="table  table-info table-striped">
                <div class="text-center my-3"><h3>TOPICS: </h3></div>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Topic name</th>
                    <th scope="col">No of posts</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                foreach ($topics as $topic):
                    $i = $i + 1
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $topic->name; ?></td>
                        <td><?php echo $topic->getNoOfPosts(); ?></td>
                        <td>
                            <a href="updateTopic.php?topicId=<?php echo $topic->getId(); ?>" class="btn btn-info" type="button">
                                Edit/Update topic
                            </a>
                            <button type="button" id="myModal" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#myModal-<?php echo $topic->getId(); ?>">
                                View topic posts
                            </button>
                            <a href="deleteTopic.php?topicId=<?php echo $topic->getId(); ?>" type="button" class="btn btn-danger">
                                Delete topic
                            </a>

                            <div class="modal fade modal-xl" id="myModal-<?php echo $topic->getId(); ?>"
                                 data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="myModal">Posts from topic
                                                "<?php echo $topic->name; ?>": </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <?php
                                                    $allPost = Post::findBy('topicId', $topic->getId());

                                                    foreach ($allPost

                                                    as $post):
                                                    if ($post->published == 'Y'):
                                                    $image = new Image ($post->imageId);
                                                    ?>
                                                    <div class="col-5">
                                                        <div class="card-group my-4">
                                                            <div class="card mb-3 border-dark">
                                                                <a class="text-decoration-none fw-semibold text-dark link-info"
                                                                   href="post.php?postId=<?php echo $post->getId() ?>">
                                                                    <img src="images/<?php echo $image->file ?>"
                                                                         class="card-img-top" alt="...">
                                                                    <div class="card-body">
                                                                        <p class="card-text"><small
                                                                                    class="text-muted"><?php echo $post->createdAt; ?></small>
                                                                        </p>
                                                                        <h5 class="card-title"><?php echo $post->title ?></h5>
                                                                        <p class="card-text text-truncate"><?php echo $post->body ?></p>
                                                                        <p>Continue reading >></p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif;
                                                endforeach;
                                                unset($_GET['topicId']); ?>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
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
    </div>
</div>
