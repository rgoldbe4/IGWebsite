<?php
session_start();
set_include_path("/home/buffsove/public_html/");
include("packageloader.php");

$announcements = $_POST['announcements'];
foreach ($announcements as $announcement) {
    $id = $announcement['ID'];
    $text = $announcement['text'];
    $staff = $announcement['staff'];
    if ($id <= 0) {
        $query = "INSERT INTO announcement (text, staff) VALUES ('$text','$staff')";
        RunSQL($query);
    }
}

$currentAnnouncements = [];

class Announcement {}

$sql = "SELECT * FROM announcement";

$result = RunSQL($sql);

while ($currentAnnouncement = $result->fetch_object("Announcement")) {
    array_push($currentAnnouncements, $currentAnnouncement);
}

echo json_encode($currentAnnouncements);
//echo json_encode($queries);
?>
