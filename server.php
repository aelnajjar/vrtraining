<?php
session_start();
include_once 'dbconnect.php';
if(!isset($_SESSION['userSession']))
{
	header("Location: index.php");
}
$query = $MySQLi_CON->query("SELECT * FROM users WHERE uid=".$_SESSION['userSession']);
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
            <li class="active"><a href="#">Stats</a></li>
            <li><a href="server.php?server"><span class="glyphicon glyphicon-server"></span>&nbsp; Records</a></li>
            <li><a href="#">Friends</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['username']; ?></a></li>
            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
		 
		  
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
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
			<th>Completed</th>
			<th>Recommended</th>
		</tr>
	</thead>
	<!-- Table Header -->

	<!-- Table Body -->
	<tbody>
	
		<tr>
			<td>Earthquake<b><?php echo $file; ?></b> 1</td>
			<td><?php echo $file_msg; ?></td>
			<td>Yes</td>
		</tr>
		
		<tr>
			<td>Fire</td>
			<td><?php echo $mail_msg; ?>NO</td>
			<td></td>
		</tr>



		<tr>
			<td>Gas Leaking</td>
			<td><?php echo $mail_msg; ?>NO</td>
			<td></td>
		</tr>

		<tr>
			<td>Electricity Fault</td>
			<td><?php echo $mail_msg; ?>Yes</td>
			<td></td>
		</tr>

		<tr>
			<td>Lightning</td>
			<td><?php echo $file_msg; ?></td>
			<td>Yes</td>
		</tr>


	</tbody>
	<!-- Table Body -->

</table>
<li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>

<?php
if (function_exists('mail') && is_writable($file) && function_exists('mysql_connect') && ini_get('file_uploads') == 1)
{
echo '<a href="" class="btn">Continue Installation</a>';
}
  else
{
echo 'Please enable/install extensions before continuing, otherwise, the script will not work as designed.';
}

?>



</div>
</body>
</html>
