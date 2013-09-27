<?php 
session_start();
require_once("user.php");

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
	<form method="post" action="index.php" class="form-inline">
		<fieldset>
			<legend>Login - Skriv in användarnamn och lösenord</legend>

			<?php echo $helpText; ?>

			<label for="UserName">Användarnamn</label>
			<input id="UserName" name="UserName" type="text" size="15" 
			value="<?php echo isset($_POST['UserName']) ? $_POST['UserName'] : '' ?>">		<!--value anv för att behålla inmatad text -->

			<label for="Password">Lösenord</label>
			<input id="Password" name="Password" type="password" size="15">

			<label for="KeepLogin" class="checkbox"> 
			<input id="KeepLogin" type="checkbox"> Håll mig inloggad</label>

			<input type="submit" name="submit" value="Logga in" class="btn">
		</fieldset>
	</form>
	</body>
</html>