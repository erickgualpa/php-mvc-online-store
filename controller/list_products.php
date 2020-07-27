<?php
// controller/list_products.php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/dbManager.php");

$conn = connectDB($servername, $username, $password, $dbname);

$result_set_product_list = getProducts($conn, $category);

require_once(__DIR__."/../view/list_products.php");
