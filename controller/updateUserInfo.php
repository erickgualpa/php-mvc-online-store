<?php
// controller/updateUserInfo.php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/dbManager.php");

$conn = connectDB($servername, $username, $password, $dbname);
$result_set_user_info = getUserInfo($conn, $_SESSION["id"]);

if(isset($_GET["update-image"]) && $_GET["update-image"] == true){
    if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image'])) {
        $user_id = $result_set_user_info["user_id"];
        $filesPath = "/home/TDIW/tdiw-l7/public_html/img/profile_images/";
        $destinationPath = $filesPath.$user_id.".jpg";
        move_uploaded_file(
            $_FILES['profile_image']['tmp_name'],
            $destinationPath
        );

        updateUserProfilePic($conn, "/img/profile_images/".$user_id.".jpg");
    }
}

$user_profile_image = $result_set_user_info["profile_image"];
require_once(__DIR__."/../view/updateUserInfo.php");