<?php

   include_once 'dbconnect.php';

     // Connect to your database


    $dbselect = mysql_select_db("vrgame",$dbconnect);

    // Prepare the SQL statement

    $sql = "INSERT INTO vrgame.users2 (earthquake) VALUES ('".$_GET["earthquake"]."')";    

    // Execute SQL statement

    mysql_query($sql);
?>
