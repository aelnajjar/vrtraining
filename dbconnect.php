<?php

	 $DB_host = "ap-cdbr-azure-east-a.cloudapp.net";
	 $DB_user = "b3945d7f4038ce";
	 $DB_pass = "4561cc15";
	 $DB_name = "vrgame";
	 
	 $MySQLi = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($MySQLi->connect_errno)
     {
         die("ERROR : -> ".$MySQLi->connect_error);
     }


?>
