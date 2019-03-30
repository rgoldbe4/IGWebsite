<?php

function RunSQL($sql) {
    //Just a fun note: the host never changes.
    $connection = new mysqli("66.85.144.162", "mcph746387", "0a59de0688", "mcph746387");
    // Check connection, if it fails, simply display it on the page...
    if ($connection->connect_error) {
        echo("[SQLRunner] Connection Error: " . $connection->connect_error);
    }

    if ($connection) {
        //Next, run the SQL statement...
        $results = $connection->query($sql);
        //Close out of the connection...
        $connection->close();
    }

    return $results;
}

?>
