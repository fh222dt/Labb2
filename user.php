<?php

class User {

	public function login($inputName, $inputPsw) {

		$username = "Admin";
		$password = "Password";
		$helpText = "";

		//vid en lyckad inloggning	
		if ($inputName == $username && $inputPsw == $password) {		
			//starta en session 
			$_SESSION["login"] = 1;

			//ladda om sidan så scriptet körs igen
			header("Location: $_SERVER[PHP_SELF]");
		}

		//felhantering av inmatad data från användaren
		//TODO: fixa $helptext
		else {		
			if(empty($inputName) ) {
				//$helpText= "<p>Användarnamn saknas</p><br/>";
				echo "<p>Användarnamn saknas</p><br/>";
			}

			else if(empty($inputPsw) ) {
				//$helpText= "<p>Lösenord saknas</p><br/>";
				echo "<p>Lösenord saknas</p><br/>";
			}

			else {
				//$helpText= "<p>Felaktigt användarnamn och/eller lösenord</p><br/>";
				echo "<p>Felaktigt användarnamn och/eller lösenord</p><br/>";
			}
		}
	}

	public function verifiedUser() {
		
	}

	


}