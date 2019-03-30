<?php
session_start();

?>
<html>
    <head>
        <title>Ignition Gaming - Minecraft - Donate</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <?php include_once("default_sources.php"); ?>

    </head>
    <style>
        body {
            background-image: url("background.png");
            background-repeat: no-repeat;
            background-origin:border-box;
        }
    </style>
    <body>
        <div class="container h-100 align-items-center">
            <div class="w-100 h-100 align-items-center" >

                <div class="row text-center h-100 w-100 align-items-center">
                    <div class="col margin">
                        <div class="jumbotron">
                            <h3 class="text-info">Link Your Minecraft Account</h3>
                            <a href="link.php" class="btn btn-outline-info btn-lg">Go!</a>
                        </div>
                    </div>
                    <div class="col margin">
                        <div class="jumbotron">
                            <h3 class="text-warning">View Minecraft Defiance Shop</h3>
                            <a href="shopv2.php" class="btn btn-outline-warning btn-lg">Go!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
    </script>
</html>
