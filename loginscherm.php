<?php
	
	session_start();
	
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
	}
	
	include('datalink.php');
	if (isset($_POST["login"]))
	{
		$username = test_input($_POST['username']);
		$password = test_input($_POST['password']);
		$query = "SELECT Password FROM users WHERE Username = '$username'";
		$result = mysqli_query($db, $query);
		$loginAttempt = mysqli_fetch_assoc($result);
		if (!$loginAttempt)
		{
			echo "Deze gebruikersnaam is helaas ongeldig.";
		}
		else 
		{
			if ($loginAttempt["Password"] == $password) {
				$_SESSION["Username"] = $username;
				header ('location: bestelpagina.php');
			}
			else
			{
				echo "Dat is niet het juiste wachtwoord bij die gebruikersnaam.";
			}
		}
	}
	
?>
