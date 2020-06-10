<?php
//controller/register.php

require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/dbManager.php");

$conn = connectDB($servername, $username, $password, $dbname);
$validUser = validateRegister();

if ($validUser) {
    registerUser($conn);
    require_once(__DIR__ . "/../view/register.php");
}else{
    header("Location: index.php?action=sign-up");
}