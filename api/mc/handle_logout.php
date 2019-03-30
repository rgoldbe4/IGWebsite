<?php
session_start();
session_destroy();
session_start();

$response = [];
$response['result'] = true;
echo json_encode($response);
?>
