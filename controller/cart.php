<?php
// controller/cart.php

require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/dbManager.php");

$conn = connectDB($servername, $username, $password, $dbname);

if(isset($_GET["removeproduct"]) && $_GET["removeproduct"] == true){
    if (($key = array_search($_GET["product"], $_SESSION["cart"])) !== false) {
        unset($_SESSION["cart"][$key]);
    }
    $product_price = getProductInfo($conn,$_GET["product"])->fetch_assoc()["price"];
    $_SESSION["totalAmount"] -= $product_price;
}


$result_set_products_in_cart = [];

foreach ($_SESSION["cart"] as $prod) {
    $tmp = getProductInfo($conn, $prod);
    array_push($result_set_products_in_cart, $tmp);
}

require_once(__DIR__."/../view/cart.php");
