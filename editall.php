<?php
session_start();
if (!isset($_SESSION["Username"])) {
	echo "U bent niet ingelogd";
	echo "<br>";
	echo "<a href='Login.php'>Inloggen</a>";
} else 
{
	$username = $_SESSION["Username"];
	include("Datalink.php");
	$query = "SELECT * FROM users WHERE Username = '$username'";
	$result = mysqli_query($db,$query);
	if(!$result) 
	{
		echo "Er ging helaas iets mis met de db queryen.";
		die;
	}
	$user = mysqli_fetch_assoc($result);
	
	 $passwordError = $emailError = $nameError = $scndnameError = $streetError 
	= $adressnmbrError = $telError = $posError = $plaatsError = "";
	
	function test_input($input) 
	{
		$input = htmlspecialchars($input);
		$input = trim($input);
		$input = stripslashes($input);
		return $input;
	}
	
	function check_zip($input)
	{
		$input = str_replace(" ","", $input);
		$input = strtoupper($input);
		return $input;
	}
	
	function check_phone($input)
	{
		$input = str_replace(" ","", $input);
		$input = str_replace("-","", $input);
		return $input;
	}
	
	//Zelfde functies als in registratie
	
	if (isset($_POST["submit"])) 
	{
		$naam = test_input($_POST['name']);
		$pass = test_input($_POST['password']);
		$email = test_input($_POST['email']);
		$pos  = test_input($_POST['postcode']);
		$pos = check_zip($pos);
		$sten  = test_input($_POST['street_number']);
		$ste  = test_input($_POST['street']);
		$plaats = test_input($_POST['plaats']);
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{ //checkt of de e-mail geldig is
				$emailError = " Ongeldig e-mail adress";
			}
		
		if (!preg_match("/^[a-zA-Z ]*$/",$naam))
			{ //checkt of de naam alleen spaties en letters en - bevat
				$nameError = " Ongeldige voornaam";
			}
		
		if (!preg_match("/^[a-zA-Z ]*$/",$ste))
			{ // zelfde preg match als voor naam maar dan voor adres
				$streetError = "Ongeldige straatnaam";
			}
		
		if (!preg_match("/^[0-9a-zA-Z -]*$/",$sten)) 
			{ //preg match die er op checkt of het huisnummer alleen letters, nummers, spaties en - heeft
				$adressnmbrError = "Ongeldig huisnummer";
			}
		
		if (!preg_match("/^\W*[1-9]{1}[0-9]{3}\W*[a-zA-Z]{2}\W*$/",  $pos)) 
			{ // checkt of de postcode uit 4 cijfers en 2 letters bestaat
				$posError = " Ongeldige Postcode";
			}
			
		if (!preg_match("/^[a-zA-Z ]*$/",$plaats))
			{ // zelfde preg match als naam maar dan voor plaats
				$plaatsError = " Ongeldige plaatsnaam";
			}
			
		if (!empty($_POST['telefoon']))
			{ // als het telefoon veld niet leeg is
				$tel = test_input($_POST['telefoon']);
				$tel = check_phone($tel);
				//dan checkt hij of het telefoon nummer uit 10 cijfers bestaat
				if(!preg_match("/^[0-9]{10}$/", $tel))
				{ 
					$telError = " Ongeldig Telefoonnummer";
				} // als dat niet zo is geeft hij een error weer
			}
	}
?>


<table border = 1 >
<form method="post">
    <tr><td colspan="2"><h3 align="center">Bewerk uw Profiel</td></tr>
	<tr><td>Naam:</td><td> <input type="text" name="name" value = "<?php echo $user['Name']; ?>" required><?php echo $nameError; ?></td></tr>
    <tr><td>Password:</td><td> <input type="password" name="password" value = "<?php echo $user['Password']; ?>" required><?php echo $passwordError; ?></td></tr>
    <tr><td>Email:</td><td> <input type="text" name="email" value = "<?php echo $user['Email']; ?>" required><?php echo $emailError; ?></td></tr>
	<?php if ($user['Phone'] != ""){ ?>
	<tr><td>Telefoon:</td><td> <input type="text" name="telefoon" value = "0<?php echo $user['Phone']; ?>"><?php echo $telError; ?></td></tr>
	<?php }
	else { ?>
	<tr><td>Telefoon:</td><td> <input type="text" name="telefoon" value = "<?php echo $user['Phone']; ?>"><?php echo $telError; ?></td></tr>
	<?php } ?>
    <tr><td>Postcode:</td><td> <input type="text" name="postcode" value = "<?php echo $user['Postcode']; ?>" required><?php echo $posError; ?></td></tr>
    <tr><td>Street Number:</td><td> <input type="text" name="street_number" value = "<?php echo $user['Street_number']; ?>" required><?php echo $adressnmbrError; ?></td></tr>
    <tr><td>Street:</td><td> <input type="text" name="street" value = "<?php echo $user['Street']; ?>" required><?php echo $streetError; ?></td></tr>
    <tr><td>Plaats:</td><td> <input type="text" name="plaats" value = "<?php echo $user['Plaats']; ?>" required><?php echo $plaatsError; ?></td></tr>
</table><table>
    <td><input type="submit" name="submit" value="Verander"></td>
    <td><a href="Profielen.php"><input type = "button" name = 'cancel' value = 'Annuleren' ></td>
    </table>
</form>


<?php
  
  
  
  
	if (isset($_POST["submit"])) 
	{
		 if ($passwordError == "" && $emailError == "" && $nameError == "" && $scndnameError == "" && $streetError 
		== "" && $adressnmbrError == "" && $telError == "" && $posError == "" && $plaatsError == "")
		{
			
			$query = "UPDATE `users` SET `Password` = '$pass', `Name` = '$naam',
			`Email` = '$email', `Phone` = '$tel', `Postcode` = '$pos', `Street_number` = '$sten', `Street` = '$ste',
			`Plaats` = '$plaats' WHERE `Username` = '$username'";
			
			$result = mysqli_query($db, $query);

			if (!$result) {
				echo "Er ging helaas iets mis met uw gegevens bijwerken";
			} 
			else {
				mysqli_close($db);
				echo "Uw informatie is bijgewerkt.";
				header ("location:Profielen.php");
			}
		
			
		}
	}
}
?>
