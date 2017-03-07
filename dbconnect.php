<?php

	 // PUT IT HEREEEEEE
	 
	 $MySQLi_CON = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);

$dbconnect = mysql_pconnect($DB_host, $DB_user, $DB_pass);
    $dbselect = mysql_select_db("vrgame",$dbconnect);

    // Prepare the SQL statement

  //  $query = "INSERT INTO vrgame.users2 (uid,earthquake) VALUES ('11','".$_GET["earthquake"]."')";    this will add new row with id=11 and earthquake equal to what u will type
$query = "UPDATE users2 SET earthquake='".$_GET["earthquake"]."' WHERE username='".$_GET["username"]."'";

    // Execute SQL statement

    
 mysql_query($query);

     if($MySQLi_CON->connect_errno)
     {
         die("ERROR : -> ".$MySQLi_CON->connect_error);
     }

?>
