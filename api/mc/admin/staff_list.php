<?php
session_start();
include("packageloader.php");

$staffMembers = [];

class User {}
$query = "SELECT ID, playerID, power, username FROM user WHERE power > 0";
$result = RunSQL($query);

while ($user = $result->fetch_object("User")) {
    array_push($staffMembers, $user);
}

echo json_encode($staffMembers);

?>
