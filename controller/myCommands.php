<?php
// controller/myCommands.php
require_once(__DIR__."/../model/connectDB.php");
require_once(__DIR__."/../model/dbManager.php");

$conn = connectDB($servername, $username, $password, $dbname);

$user_name = $_SESSION["id"];
$result_set_my_commands = getCommandsForUser($conn, $user_name);

require_once(__DIR__."/../view/myCommands.php");