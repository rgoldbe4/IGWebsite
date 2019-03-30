<?php
session_start();
set_include_path("/home/buffsove/public_html/");
include("packageloader.php");

$response = [];
class User {}

$username = $_POST['username'];
$password = md5(md5($_POST['password']));

//Step 1: Determine if a user exists with the username is and password
$sql = "SELECT ID FROM user WHERE username='$username'";
$result = RunSQL($sql);

if ($result->num_rows == 0) {
    //Step 2: Create the account.
    $sql = "INSERT INTO user (username, password) VALUES ('$username','$password')";
    $result = RunSQL($sql);
    $response['message'] = "Your account has been successfully created!";
    $response['result'] = true;

    class User {
        public $ID, $username, $playerID;
    }

    $sql = "SELECT ID, username, playerID WHERE username='$username' AND password='$password'";
    $result = RunSQL($sql);

    $response['data'] = $result->fetch_object("User");

} else {
    $response['message'] = "The username, $username, is currently in use!";
    $response['result'] = false;
}


echo json_encode($response);
?>
