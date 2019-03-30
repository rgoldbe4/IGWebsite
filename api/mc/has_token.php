<?php
session_start();
set_include_path("/home/buffsove/public_html/");
include("packageloader.php");

class UserMinecraft {}
$response = [];
$userID = $_SESSION['userID'];
$sql = "SELECT * FROM user_minecraft WHERE userID='$userID'";

$results = RunSQL($sql);

$data = $results->fetch_object("UserMinecraft");

if ($results->num_rows != 0) {
    if ($data->code === null) {
        $response['hasCode'] = false;
    } else {
        $response['hasCode'] = true;
    }
}

$response['data'] = $data;

echo json_encode($response);
?>
