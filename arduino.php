<?php

   include_once 'dbconnect.php';

    $sql = "INSERT INTO vrgame.users2 (earthquake) VALUES ('".$_GET["earthquake"]."')";    

    // Execute SQL statement

    mysql_query($sql);

?>