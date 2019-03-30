<?php
session_start();
include("packageloader.php");

$announcements = [];

class Announcement {}

$sql = "SELECT * FROM announcement";

$result = RunSQL($sql);

while ($announcement = $result->fetch_object("Announcement")) {
    array_push($announcements, $announcement);
}

echo json_encode($announcements);
?>
