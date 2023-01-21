<?php
include 'header.php';
include 'mainmenu.php';

?>

<div class="container justify-content-center ">
        <div class="row mt-4 justify-content-center">
            <div class="col-10 mt-4 mb-2 justify-content-center">
                <h3>Choose image to add text to:</h3>
            </div>
            <?php
            foreach (Image::findAll() as $image):
            ?>
            <div class="card mx-3 my-3 h-30" style="width: 20rem;">
                <form class="" action="textOverImage2.php" method="post" enctype="multipart/form-data">
                    <input hidden id="imageId" name="imageId" value="<?php echo $image->getId()?>">
                <a  href="textOverImage2.php"><button type="submit"><img src="./images/<?php echo $image->file?>" class="card-img-top " alt=""></button></a>
                </form>
            </div>
            <?php endforeach;?>
        </div>
 </div>



