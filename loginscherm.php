<?php
	
	session_start();
	//sessie wordt geintinaliseerd, hieronder wordt een simpele form gemaakt
?>
<html>
<head>
<title> Login Scherm </title>
</head>
<body>
<center><h1>Login Scherm</h1><center>
<table>
<form method="POST">
<tr>
<td> Gebruikersnaam:</td>
<td><input type="text" name="username" required></td>
</tr>

<tr>
<td> Wachtwoord:</td>
<td><input type="password" name="password" required></td>
<tr>
<td><input id="buttonlogin" type="submit" name="login" value="Log in"></td>


</form>

<form action="registratie.php">

<td><input id="buttonregister" type="submit" value="Registreren"></td>

</form>
</table>
</body>
</html>

<?php
	function test_input($input) 
	{
		$input = htmlspecialchars($input);
		$input = trim($input);
		$input = stripslashes($input);
		return $input;
	} // functie om de input veilig te maken
	
	include('datalink.php'); //verbinding met de DB
	if (isset($_POST["login"])) // Als op login wordt gedrukt:
	{
		$username = test_input($_POST['username']);
		$password = test_input($_POST['password']); // username en pass worden opgehaald
		$query = "SELECT Password FROM users WHERE Username = '$username'";
		//selecteerd het wachtwoord die bij de ingevoerde gebruikersnaam hoort
		$result = mysqli_query($db, $query); // haalt het resultaat op
		$loginAttempt = mysqli_fetch_assoc($result); 
		//zet het resultaat in een array die $Loginattempt heet
		if (!$loginAttempt)
		{ //als de array leeg is (en dus een ongeldige gebruikersnaam is ingevuld)
			echo "Deze gebruikersnaam is helaas ongeldig.";
			die; //dan wordt een foutmelding weergegeven en stopt het script
		}
		else //als het array niet leeg is en er dus een gedlige gebruikersnaam is ingevuld:
		{
			if ($loginAttempt["Password"] == $password) 
			{ // als het ingevulde wachtwoord bij de gebruikersnaam hoort:
				$_SESSION["Username"] = $username; 
				//dan wordt de gebruikersnaam in een sessie opgeslagen
				$query = "SELECT Admin FROM users WHERE Username = '$username'";
				$result = mysqli_query($db, $query);
				$adminrechten = mysqli_fetch_assoc($result);
				$_SESSION['Admin'] = $adminrechten['Admin'];
				//hierboven vindt nog een 2de query plaats die de adminrechten van de
				//gebruiker controleerd en deze in de Admin sessie variabele opslaat
				header ('location: bestelpagina.php');
				// daarna gaat de gebruiker naar de besteplagina
			}
			else
			{ //als het wachtwoord verkeerd is
				echo "Dat is niet het juiste wachtwoord bij die gebruikersnaam.";
				die; //dan wordt een foutmelding weergegeven en stopt het script
			}
		}
	}
	
?>
