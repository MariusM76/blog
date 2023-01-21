<?php
include 'header.php';
include 'mainmenu.php';
//var_dump($_POST);die;
?>

<div class="container justify-content-center">
    <div class="row mt-4 ">
        <div class="col-8">
            <form type="" action="" method="post">
                <input hidden type="text" id="imageId" name="imageId" value="<?php echo $_POST['imageId'] ?>">
                Choose colour:
                <input class="mx-2" min="0" max="255" type="color" id="colorId" name="colorId">
                <div class="my-3">
                    Input text
                    <input type="text" id="text" name="text">
                </div>
                <div class="my-3">
                    Choose font:
                    <select type="text" class="form-control" id="font" name ="font">
                        <?php
                            $path = "C:/Windows/Fonts";
                            $searchTTFs= scanDirToArrayForTTF($path);
                        foreach ($searchTTFs as $font_file):
                        ?>
                        <option value="<?php echo $font_file;?>"><?php echo $font_file;?></option>
                        <?php  endforeach; ?>
                    </select>
                </div>
                <div class="my-3">
                    Font size:
                    <input type="text" id="fontSize" name="fontSize">
                </div>
                <div class="my-3">
                    Choose positions:
                </div>
                <div>
                    <input type="text" id="posX" name="posX" placeholder="X position:" value="0"></br>
                    <input type="text" id="posY" name="posY" placeholder="Y position:" value="20"></br>
                    <input type="text" id="angle" name="angle" placeholder="Angle:">
                </div>
                <div class="my-3">
                    <button formaction="../blog-backend/processTextOverImage.php" formtarget="_blank" class="btn btn-info text-decoration-none" type="submit">Preview</button>
                </div>
                <div class="my-3">
                    <a  href="../blog-backend/saveModifiedImage.php"><button formaction="../blog-backend/saveModifiedImage.php" formtarget="_self" class="btn btn-info text-decoration-none" type="submit">Save image</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
