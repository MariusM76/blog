<?php
include 'header.php';
include 'mainmenu.php';

$query = "SELECT * FROM posts";

if (isset($_GET['search'])){
    $search = $_GET['search'];
    $filtersArray[] = "title LIKE '%$search%' OR body LIKE '%$search%' AND published= 'y'";
} else {
    $filtersArray[] = "title LIKE '%' AND published= 'y'";
}

$filters = implode(" AND ",$filtersArray);
$query.=" WHERE ".$filters;

$searchedKeywords = query($query);

if ($searchedKeywords == NULL) {
    $searchedKeywords = [];
    $post = ''
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Search result</h1>
                </div>
                <div class="modal-body">
                    There are no post on this search. Try another one ;)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
        document.onreadystatechange = function () {
            myModal.show();
        };
    </script>
    <?php
} else {
    foreach ($searchedKeywords as $searchedResult) {
        $post[] = new Post($searchedResult['id']);
    }
}


?>

<div class="container-fluid text-center">
    <div class="row justify-content-center ">
        <div class="col-8  p-0 ">
            <div>
                <h4 class="mt-4 mb-3" style="letter-spacing:0.4em;">SEARCH RESULT(S): </h4>
            </div>
            <?php
            if ($post!=''):
            foreach ($post as $refinedPost):
                $image = new Image ($refinedPost->imageId);
                $lastUpdate = lastUpdateShow($refinedPost->getId());
                $messages = count(Message::findBy('postId',$refinedPost->getId()))
                ?>

                <div class="card my-5 text-start col-md-6 offset-md-3" style="max-width: 640px;height: 253px;">
                    <div class="row ">
                        <div class="col-md-4">
                            <a class="text-decoration-none fw-semibold text-dark link-info" href="post.php?postId=<?php echo $refinedPost->getId()?>">
                                <img src="images/<?php echo $image->file ?>" class="img-fluid rounded-start" alt="...">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <a class="text-decoration-none fw-semibold text-dark link-info" href="post.php?postId=<?php echo $refinedPost->getId()?>">
                                    <p class="card-text"><small class="text-muted"><?php echo $refinedPost->createdAt; ?></small></p>
                                    <h5 class="card-title"><?php echo $refinedPost->title ?></h5>
                                    <p class="card-text text-truncate"><?php echo $refinedPost->body ?></p>
                                    <p class="card-text my-3"><small class="text-muted border-top">Last updated: <?php echo $lastUpdate; ?></small></p>
                                    <p class="card-text "><?php echo $messages ?> Comments; <?php echo $refinedPost->likes ?> <i class="fa fa-heart-o" aria-hidden="true"></i></p>
                                </a>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

            <?php endforeach; endif; ?>
        </div>
    </div>
</div>

