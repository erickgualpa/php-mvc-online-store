<?php
// controller/product.php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/dbManager.php");

$conn = connectDB($servername, $username, $password, $dbname);

$result_set_product_info = getProductInfo($conn, $product);

require_once(__DIR__."/../view/product.php");
