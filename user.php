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

			$this->verifiedUser($inputName);

			//ladda om sidan så scriptet körs igen
			header("Location: $_SERVER[PHP_SELF]");			
		}

		//felhantering av inmatad data från användaren
		else {		
			if(empty($inputName) ) {
				return $helpText= "Användarnamn saknas";
			}

			else if(empty($inputPsw) ) {
				return $helpText= "Lösenord saknas";
			}

			else {
				return $helpText= "Felaktigt användarnamn och/eller lösenord";
			}
		}
	}

	public function verifiedUser($inputName) {

		if (isset($_SESSION["login"])) {
						
			echo "<h2> $inputName är inloggad</h2>";			
			
			$_SESSION["login"] = $_SESSION["login"]+1;

			if ($_SESSION["login"] < 5) {
				?>
				<p>Inloggningen lyckades </br></p>
				<?php
			}
		
			?>
			<a href="?logout">Logga ut</a>
			<?php
			
		}
	}

	public function logout () {

		if (isset($_GET["logout"])) {		//kolla om det finns i urlen	
		
			if(!isset($_SESSION["login"])) {
					$helpText="";
			}

			else {
				echo "<p>Du har nu loggat ut</p><br/>";
			unset($_SESSION["login"]);
			session_destroy();
			}
		}		

	}

	


}	//class