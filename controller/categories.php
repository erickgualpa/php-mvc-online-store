<?php
     require_once(__DIR__."/../model/connectDB.php");
     require_once(__DIR__."/../model/dbManager.php");

     $conn = connectDB($servername, $username, $password, $dbname);
     $result_set_categories = getCategories($conn);

     require_once(__DIR__."/../view/categories.php");
