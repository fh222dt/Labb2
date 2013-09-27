<?php 
session_start();
require_once("user.php");
require_once("view.php");

if (isset($_POST["submit"])) {

	$inputName = $_POST["UserName"];
	$inputPsw = $_POST["Password"];	

	$userObject = new User();
	$userObject->login($inputName, $inputPsw);
}



?>

<html>
	<head>
	<meta charset="utf-8">
	<title>Laboration 2</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
	</head>

	<body>
 
	<h1>Laborationskod fh222dt</h1>
	
	<?php
	$html = new View();
	echo $html->displayForm("");
	echo $html->displayDate();
	?>

	</body>
</html>