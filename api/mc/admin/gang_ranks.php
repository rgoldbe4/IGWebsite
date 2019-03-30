<?php
session_start();
set_include_path("/home/buffsove/public_html/");
include("packageloader.php");

class GangRank {}

$ranks = [];

$sql = "SELECT * FROM gang_rank";
$result = RunSQL($sql);

while ($rank = $result->fetch_object("GangRank")) {
    array_push($ranks, $rank);
}

echo json_encode($ranks);

?>
