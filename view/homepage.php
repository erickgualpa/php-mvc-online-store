<?php
// view/homepage.php
?>
<!DOCTYPE html>
<html>
    <?php require(__DIR__."/../view/header.php");?>
    <body>
        <?php require(__DIR__."/../view/head.php"); ?>
        <div id="main-content">
            <?php require(__DIR__."/../controller/categories.php");?>
        </div>
        <div id="summary">
            <?php require(__DIR__."/../controller/footer.php");?>
        </div>
    </body>

</html>
