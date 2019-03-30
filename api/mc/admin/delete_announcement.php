<?php
session_start();
set_include_path("/home/buffsove/public_html/");
include("packageloader.php");

$announcement = $_POST['announcement'];
$id = $announcement['ID'];
$sql = "DELETE FROM announcement WHERE ID='$id'";
RunSQL($sql);

return json_encode(true);
?>
