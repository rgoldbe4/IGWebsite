<?php
session_start();
set_include_path("/home/buffsove/public_html/");
include("packageloader.php");

//We only need the minified player class.
class Player {
    public $ID, $name;
}

$response = [];

$sql = "SELECT ID,name FROM player";
$result = RunSQL($sql);
$players = [];
$response['result'] = $result->num_rows != 0;

while ($player = $result->fetch_object("Player")) {
    array_push($players, $player);
}

$response['players'] = $players;
echo json_encode($response);
?>
