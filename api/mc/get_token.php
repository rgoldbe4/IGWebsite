<?php
session_start();
set_include_path("/home/buffsove/public_html/");
include("packageloader.php");

$userID = $_POST['userID'];

//Generate the token
$code = substr(md5(microtime()),rand(0,26),5);

//Add it to the database under their ID
$sql = "INSERT INTO user_minecraft (`userID`, `code`, `confirm`) VALUES ('$userID', '$code', '0');";

RunSQL($sql);
//Respond back with the token.
echo json_encode($code);
?>
