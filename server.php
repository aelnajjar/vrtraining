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
			<th>Required Fuctions</th>
			<th>Current</th>
			<th>Recommended</th>
		</tr>
	</thead>
	<!-- Table Header -->

	<!-- Table Body -->
	<tbody>
	
		<tr>
			<td>Is the <b><?php echo $file; ?></b> file writable?</td>
			<td><?php echo $file_msg; ?></td>
			<td>Yes</td>
		</tr>
		
		<tr>
			<td>Is the mail() function enabled?</td>
			<td><?php echo $mail_msg; ?></td>
			<td>Yes</td>
		</tr>



		<tr>
			<td>PHP Version</td>
			<td><?php echo function_exists('phpversion') ? phpversion() : ''; ?></td>
			<td><?php echo function_exists('phpversion') ? phpversion() : ''; ?></td>
		</tr>

		<tr>
			<td>Is MySQL enabled?</td>
			<td><?php echo $mysql_msg; ?></td>
			<td>Yes</td>
		</tr>

		<tr>
			<td>Is file uploading enabled?</td>
			<td><?php echo $file_msg; ?></td>
			<td>Yes</td>
		</tr>


	</tbody>
	<!-- Table Body -->

</table>


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
