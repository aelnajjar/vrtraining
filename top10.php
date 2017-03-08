
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
		<?php
		  $query = "SELECT * FROM users2 LIMIT 5";
	mysql_query($query); 
		  ?>
          </ul>
        </div><!--/.nav-collapse --> 
      </div>
    </nav>
	
<div class="container" style="margin-top:150px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
	TOP 10 </a><br /><br />
	
<?php
	
echo "<table style='border: solid 1px black;text-align:center;'>";
echo "<tr><th>Number</th>  <th>User</th><th>Score</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;text-align:center;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 


try {
	
    $conn = new PDO("mysql:host=$DB_host;dbname=$DB_name", $DB_user,  $DB_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  $stmt = $conn->prepare("SELECT username, ourgame Rating FROM users2 ORDER BY ourgame DESC LIMIT 10;"); 
	 $stmt = $conn->prepare("SELECT uid, username, ourgame FROM users2 ORDER BY ourgame DESC LIMIT 5;"); 
	
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
