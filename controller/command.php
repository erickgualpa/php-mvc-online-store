<?php
// controller/command.php
    require_once(__DIR__."/../model/connectDB.php");
    require_once(__DIR__."/../model/dbManager.php");

    $conn = connectDB($servername, $username, $password, $dbname);

    $date =  date("Y/m/d") ;
    $cart_size = count($_SESSION["cart"]);
    $total_amount = $_SESSION["totalAmount"] ;
    $user = $_SESSION["id"];
    $validCommand = setCommandInfo($conn, $date, $cart_size, $total_amount, $user);
    if ($validCommand){
        // Insert every command line per product
        // First set product count per product_id
        $product_count = array_count_values($_SESSION["cart"]);
        foreach ($product_count as $key => $value){

            $result_set_product_info = getProductInfo($conn, $key);
            $product_info = $row = $result_set_product_info->fetch_assoc();

            $total_price = $value * floatval($row['price']);
            $product = $row['product_id'];
            $quantity = $value;
            $command_id = getLastCommandId($conn)->fetch_assoc()['command_id'];

            setCommandLineInfo($conn, $total_price, (int)$product, $quantity, $command_id);
        }
    }

    // Empty the cart
    $_SESSION["cart"] = [];
    $_SESSION["totalAmount"] = 0;
    require_once(__DIR__."/../view/command.php");



