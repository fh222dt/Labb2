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

			/*if (isset($_POST["KeepLogin"])) {

				//skapa cookie mm

				$this->verifiedStoredUser($inputName);
			}

			else {

				$this->verifiedUser($inputName);
			}*/

			//ladda om sidan så scriptet körs igen
			//header("Location: $_SERVER[PHP_SELF]");			
		}

		//felhantering av inmatad data från användaren
		else if (isset($_POST["submit"])) {		
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

			//ladda om sidan så scriptet körs igen
			//header("Location: $_SERVER[PHP_SELF]");
						
			echo "<h2> $inputName är inloggad</h2>";			
			
			$_SESSION["login"] = $_SESSION["login"]+1;

			if ($_SESSION["login"] < 4) {
				?>
				<p>Inloggningen lyckades </br></p>
				<?php
			}
		
			?>
			<a href="?logout">Logga ut</a>
			<?php
			
		}
	}

	public function verifiedStoredUser ($inputName, $inputPsw) {

		if (isset($_SESSION["login"])) {
			$hashedPsw = crypt($inputPsw); 

			setcookie("username", $inputName, strtotime( '+10 min' ));
			setcookie("password", $hashedPsw, strtotime( '+10 min' ));

			echo "<h2> $inputName är inloggad</h2>";

			$_SESSION["login"] = $_SESSION["login"]+1;

			if ($_SESSION["login"] < 4) {
				?>
				<p>Inloggningen lyckades och vi kommer ihåg dig nästa gång</br></p>
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

				setcookie("username", "ended", strtotime( '-1 min' ));
				setcookie("password", "ended", strtotime( '-1 min' ));
				
				unset($_SESSION["login"]);
				session_destroy();
			}
		}		

	}

	


}	//class