<?php
//First and foremost: make sure we have a session...
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$session_json = [];

foreach ($_SESSION as $key => $value) {
    $session_json[$key] = $value;
}
echo json_encode($session_json);

?>
