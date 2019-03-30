<?php
session_start();
include("packageloader.php");

PackageLoader::Minecraft();
$response = [];

$username = $_POST['username'];
$password = md5(md5($_POST['password']));

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = RunSQL($sql);

$response['result'] = $result->num_rows != 0;

if ($result->num_rows > 0)
    $response['data'] = $result->fetch_object("User");

echo json_encode($response);
?>
