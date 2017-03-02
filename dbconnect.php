<?php

	 $DB_host = "ap-cdbr-azure-east-a.cloudapp.net";
	 $DB_user = "b3945d7f4038ce";
	 $DB_pass = "4561cc15";
	 $DB_name = "vrgame";
	 
	 $MySQLi_CON = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);

$dbconnect = mysql_pconnect($DB_host, $DB_user, $DB_pass);
    $dbselect = mysql_select_db("vrgame",$dbconnect);

    // Prepare the SQL statement

    $query = "INSERT INTO vrgame.users2.'11' (earthquake) VALUES ('".$_GET["earthquake"]."')";    

    // Execute SQL statement

    
 mysql_query($query);

     if($MySQLi_CON->connect_errno)
     {
         die("ERROR : -> ".$MySQLi_CON->connect_error);
     }

?>
