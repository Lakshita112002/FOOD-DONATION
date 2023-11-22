<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
</head>
<body>
<?php 
session_start();
if (!isset($_SESSION['loggedIn']))
{
	include("header.html");
}
else{
	include("loginheader.html");
}
?>
		<div class="hometext">
			<h1></h1></br></br></br></br></br>
			<h2></h2>
			<h3><i></i> </h3>
		</div>
	</div>
</body>
</html>