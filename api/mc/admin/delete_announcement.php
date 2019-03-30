<?php
session_start();
include("packageloader.php");

$announcement = $_POST['announcement'];
$id = $announcement['ID'];
$sql = "DELETE FROM announcement WHERE ID='$id'";
RunSQL($sql);

return json_encode(true);
?>
