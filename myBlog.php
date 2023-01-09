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
                            <a class="nav-link fw-semibold" aria-current="page" href="#">All Posts</a>
                        </li>
                        <?php
                        foreach ($topics as $topic):
                        ?>
                        <li class="nav-item px-4 border-end">
                            <a class="nav-link fw-semibold" href="#"><?php echo $topic->name;?></a>
                        </li>
                        <?php endforeach;?>
                        <li class="nav-item px-4 border-end">
                            <a class="nav-link fw-semibold" href="#">My Top 5</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>