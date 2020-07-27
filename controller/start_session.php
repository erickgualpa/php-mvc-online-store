<?php
// controller/start_session.php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/dbManager.php");

$conn = connectDB($servername, $username, $password, $dbname);

$validUser = validateUser($conn);
if ($validUser) {
    $_SESSION["verified"] = true;
    $_SESSION["cart"] = [];
    $_SESSION["totalAmount"] = 0;
    $_SESSION["id"] = $_POST["email"];
    header("Location: index.php");
}else{
    header("Location: index.php?action=log-in&fail=true");
}
