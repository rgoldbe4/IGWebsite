<?php
session_start();
set_include_path("/home/buffsove/public_html/");
include("packageloader.php");

$response = [];

$username = $_POST['username'];
$password = md5(md5($_POST['password']));

$sql = "SELECT ID, username, power, playerID FROM user WHERE username='$username' AND password='$password' AND power > 0";

$result = RunSQL($sql);

if ($result->num_rows > 0) {
    $info = $result->fetch_assoc();
    $response['result'] = true;
    $_SESSION['username'] = $info['username'];
    $_SESSION['power'] = $info['power'];
    $_SESSION['userID'] = $info['ID'];
    $_SESSION['playerID'] = $info['playerID'];
} else {
    $response['result'] = false;
}

echo json_encode($response);
?>
