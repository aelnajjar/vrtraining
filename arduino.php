<?php

   include_once 'dbconnect.php';

    $query = "INSERT INTO users2 (earthquake) VALUES ('".$_GET["earthquake"]."')";    

    // Execute SQL statement

    mysql_query($query);

?>
