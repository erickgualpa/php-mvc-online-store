<?php
// controller/footer.php
if(isset($_GET["action"]) && $_GET["action"] == "add-product"){
    array_push($_SESSION["cart"], $_GET["product"]);
    $_SESSION["totalAmount"] +=  floatval($_GET["price"]);
}

require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/dbManager.php");

$conn = connectDB($servername, $username, $password, $dbname);

require_once(__DIR__."/../view/footer.php");