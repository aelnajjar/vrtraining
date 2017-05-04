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
            <li class="active"><a href="#">Records</a></li>
           
		  <li><a href="home.php?home"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
            <li><a href="#">Friends</a></li>
		   <li><a href="top10.php?home"><span class="glyphicon glyphicon-top10"></span>&nbsp; Top 10</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
		  
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['username']; ?></a></li>
            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
		 
		  
          </ul>
        </div><!--/.nav-collapse --> 
      </div>
    </nav>
		
	<div class="container" style="margin-top:100px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:10px;">
	Your Records</a><br /><br />
  
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	
<html>
<head>
<title>Pre-Installation checklist</title
</head>
<style type="text/css">
	
/*TABLE CSS*/

#wrap {
    margin: 10px auto 0;
    text-align: center;
    width: 500px;
}

.btn {
  font-family: Courier New;
  color: #ffffff;
  font-size: 16px;
  background: #3498db;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  text-decoration: none;
}

table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	background:#eaebec;
	border:#ccc 1px solid;
margin-bottom: 20px;
width: 100%;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;
        background: #ededed;
}
table th:first-child {
	text-align: left;
	padding-left:20px;
}
table tr {
	text-align: center;
	padding-left:20px;
}
table td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
	background: #fafafa;
}
table tr.even td {
	background: #f6f6f6;
}
table tr:last-child td {
	border-bottom:0;
}
</style>
<body>
<div id="wrap">

		<!-- WEBSITE GOES HERE -->

<table cellspacing='0'> <!-- cellspacing='0' is important, must stay -->

	<!-- Table Header -->
	<thead>
		<tr>
			<th>Trainings</th>
			<th>  Score</th>
			<th>  Recommended</th>
		</tr>
	</thead>
	<!-- Table Header -->

	<!-- Table Body -->
	<tbody>
	
		<tr>
			<td>Earthquake<b><?php echo $file; ?></b> </td>
			<td><?php  echo $userRow['earthquake']; ?></td>
			<td>YES</td>
		</tr>
		
		<tr>
			<td>Fire</td>
			<td><?php  echo $userRow['fire']; ?></td>
			<td>YES</td>
		</tr>



		<tr>
			<td>Gas Leaking</td>
			<td><?php  echo $userRow['gas']; ?></td>
			<td>YES</td>
		</tr>

		<tr>
			<td>Kitchen Fire</td>
			<td><?php  echo $userRow['electricity']; ?></td>
			<td>YES</td>
		</tr>

		<tr>
			<td>Total Score</td>
			<td><?php  echo $userRow['ourgame']; ?></td>
			<td></td>
		</tr>
		


	</tbody>
	<!-- Table Body -->

</table>


<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

// SET YOUR PDF OPTIONS
// FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'url',
  "source" => 'http://vrtraining.azurewebsites.net/records.php?server',
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'records.pdf');

// CALL THE phptopdf FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='url_google.pdf'>Download Your PDF</a>");
?>




</div>
</body>
</html>
