<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['userSession']))
{
	header("Location: index.php");
}
$query = $MySQLi_CON->query("SELECT * FROM users2 WHERE uid=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$MySQLi_CON->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">VR-Based Crises Training System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Top 10</a></li>
           
		  <li><a href="home.php?home"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
		  <li><a href="records.php?home"><span class="glyphicon glyphicon-record"></span>&nbsp; Records</a></li>
            <li><a href="#">Friends</a></li>
		  
          </ul>
          <ul class="nav navbar-nav navbar-right">
		  
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['username']; ?></a></li>
            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
		 
		  
          </ul>
        </div><!--/.nav-collapse --> 
      </div>
    </nav>

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>

<?php

$query = "SELECT username,ourgame FROM (SELECT username,ourgame FROM users2 ORDER BY ourgame ASC LIMIT 10) ORDER BY ourgame ASC";
// $query = "SELECT uid, username FROM <users2> ORDER BY ourgame DESC LIMIT 10";
/*$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<table><tr><th>#</th><th>User Name</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["uid"]. "</td><td>" . $row["User name"]. " " . $row["ourgame"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close(); */
?>  

</body>
</html>


