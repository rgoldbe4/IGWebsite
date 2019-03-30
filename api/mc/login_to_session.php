<?php
session_start();

$username = $_POST['username'];
$userID = $_POST['ID'];
$playerID = $_POST['playerID'];

$_SESSION['username'] = $username;
$_SESSION['userID'] = $userID;
$_SESSION['playerID'] = $playerID;

?>
