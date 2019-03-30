<?php
session_start();
session_destroy();
session_start();
header("location: /mc/donate/index.php");
exit();
?>
