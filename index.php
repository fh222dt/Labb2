<?php 
session_start();
require_once("user.php");
require_once("view.php");

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
	$userObject = new User();
	$userObject->logout();
	$inputName ="";
	$inputPsw ="";



if (isset($_POST["submit"])) {
	$inputName = $_POST["UserName"];
	$inputPsw = $_POST["Password"];

	$userObject->login($inputName, $inputPsw);

}


	if (isset($_SESSION["login"])) {

		$userObject->verifiedUser("Admin");
	}

	/*else {
		echo $html->displayForm($userObject->login($inputName, $inputPsw));
	}*/



else {
		echo $html->displayForm($userObject->login($inputName, $inputPsw));
	}
	
echo $html->displayDate();
?>

	</body>
</html>