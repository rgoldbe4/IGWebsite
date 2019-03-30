<?php
session_start();
include("packageloader.php");

$response = [];
$gangData = [];

class Gang {}
class PlayerGang {}
class Player {}

if (empty($_POST['page'])) {

} else {

}

$sql = "SELECT * FROM gang";
$result = RunSQL($sql);

//Lets say... 12 rows... We want 2 pages.
$pages = floor($result->num_rows / 10) + 1;


//Grab all gangs and their players.
while ($currentGang = $result->fetch_object("Gang")) {
    //Gang -> PlayerGang
    $gang = (array) $currentGang;
    $gang['players'] = [];

    //Gang ID
    $gangID = $currentGang->ID;

    //Grab all players inside the gang.
    $sql = "SELECT * FROM player_gang WHERE gangID='$gangID'";
    $playerGangResult = RunSQL($sql);

    while ($currentPlayerGang = $playerGangResult->fetch_object("PlayerGang")) {
        $playerGang = (array) $currentPlayerGang;

        $playerID = $currentPlayerGang->playerID;

        //Don't return IP, UUID
        $sql = "SELECT ID, name, nickname FROM player WHERE ID='$playerID'";
        $playerResult = RunSQL($sql);

        while ($currentPlayer = $playerResult->fetch_object("Player")) {
            $player = (array) $currentPlayer;
            $player['rank'] = $currentPlayerGang->gangRankID;
           array_push($gang['players'], $player);
        }
    }

    array_push($gangData, $gang);

}

$response['gangData'] = $gangData;
$response['pages'] = $pages;
echo json_encode($response);
?>
