<?php
// controller/portada.php
    if(isset($_GET['finish-session']) && $_GET['finish-session'] == true){
        $_SESSION["verified"] = false;
    }
    require(__DIR__."/../view/portada.php");

