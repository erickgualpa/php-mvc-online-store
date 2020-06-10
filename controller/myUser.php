<?php
    // controller/myUser.php
    require_once(__DIR__."/../model/connectDB.php");
    require_once(__DIR__."/../model/dbManager.php");

    $conn = connectDB($servername, $username, $password, $dbname);
    $user = $_SESSION["id"];

    if(isset($_GET['update']) && $_GET['update'] == true){
        updateUser($conn);
    }

    $result_user_info = getUserInfo($conn, $user);

    $user_name = $result_user_info["user_name"];
    $user_email = $result_user_info["email"];
    $user_password = $result_user_info["password"];
    $user_address = $result_user_info["address"];
    $user_town = $result_user_info["town"];
    $user_postal_code = $result_user_info["postalCode"];
    $user_profile_image = $result_user_info["profile_image"];

    require_once(__DIR__."/../view/myUser.php");