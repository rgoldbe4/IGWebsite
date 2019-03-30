<?php
session_start();
include("packageloader.php");

$playerId = $_POST['playerId'];
$response = [];

class PlayerStats {}
class PlayerBanned {}
class PlayerKicked {}
class PlayerSolitary {}

$playerStatsSQL = "SELECT * FROM player_stats WHERE playerID = '$playerId'";
$playerStatsResult = RunSQL($playerStatsSQL);

$response['stats'] = $playerStatsResult->fetch_object("PlayerStats");

$playerBanSQL = "SELECT * FROM player_banned WHERE playerID = '$playerId' ORDER BY banStart DESC";
$playerBanResult = RunSQL($playerBanSQL);
$playerBans = [];

while ($ban = $playerBanResult->fetch_object("PlayerBanned")) {
    array_push($playerBans, $ban);
}

$response['bans'] = $playerBans;

$playerKickSQL = "SELECT * FROM player_kicked WHERE playerID='$playerId'";
$playerKickResult = RunSQL($playerKickSQL);
$playerKicks = [];

while ($kick = $playerKickResult->fetch_object("PlayerKicked")) {
    array_push($playerKicks, $kick);
}

$response['kicks'] = $playerKicks;

$playerSolitarySQL = "SELECT * FROM player_solitary WHERE playerID='$playerId'";
$playerSolitaryResult = RunSQL($playerSolitarySQL);
$playerSolitaries = [];
while ($solitary = $playerSolitaryResult->fetch_object("PlayerSolitary")) {
    array_push($playerSolitaries, $solitary);
}

$response['solitary'] = $playerSolitaries;

$staffBanSQL = "SELECT * FROM player_banned WHERE staffID = '$playerId'";
$staffBanResult = RunSQL($staffBanSQL);
$staffBans = [];

while ($ban = $staffBanResult->fetch_object("PlayerBanned")) {
    array_push($staffBans, $ban);
}

$response['staffbans'] = $staffBans;

$staffKickSQL = "SELECT * FROM player_kicked WHERE staffID = '$playerId'";
$staffKickResult = RunSQL($staffKickSQL);
$staffKicks = [];

while ($kick = $staffKickResult->fetch_object("PlayerKicked")) {
    array_push($staffKicks, $kick);
}

$response['staffkicks'] = $staffKicks;

$staffSolitarySQL = "SELECT * FROM player_solitary WHERE staffID='$playerId'";
$staffSolitaryResult = RunSQL($staffSolitarySQL);
$staffSolitaries = [];

while ($solitary = $staffSolitaryResult->fetch_object("PlayerSolitary")) {
    array_push($staffSolitaries, $solitary);
}

$response['staffsolitary'] = $staffSolitaries;

echo json_encode($response);
?>
