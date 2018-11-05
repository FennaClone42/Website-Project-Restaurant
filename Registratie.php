<?php
	
	$usernameError = $passwordError = $emailError = $nameError = $scndnameError = $adressError 
	= $adressnmbrError = $phoneError = $zipError = $townError = ""; //Allereerst worden alle 
	//Error waarden geïnitialiseerd als lege strings
	$username = $pass1 = $pass2 = $email = $name = $scndname = $adress = $adressnmbr = $phone = 
	$zip = $town = ""; // lege waardes worden geïnitialiseerd om eerder ingevulde waarden te 
	//onthouden
	
	/* Alles na de volgende if statement moet boven de form staan, zodat als er errors voorkomen
	nadat er op de submit knop is gedrukt de errors een bijpassende waarde krijgen voordat
	ze in de form zelf geechod worden. Het is om de code te begrijpen mogelijk handiger om
	eerst de form te bekijken */
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") //als er op de submit knop wordt gedrukt:
	{
		$username = test_input($_POST['Username']); //slaat wat er in het input veld staat
													//op als $username nadat de input gechecked
													// is op X-stiching
		$pass1 = test_input($_POST['Password1']);
		$pass2 = test_input($_POST['Password2']);
		if ($pass1 == $pass2)
		{ // Als wat er in het 1ste password veld hetzelfde is als in het 2de
			$password = $pass1; 
		}
		else 
		{ // Als dit niet zo is:
			$passwordError = " Wachtwoorden komen niet overeen";
			//Dan wordt hier een error van weergeven
		}
		$email = test_input($_POST['Email']);
		$name = test_input($_POST['Name']);
		$scndname = test_input($_POST['ScndName']);
		$adress = test_input($_POST['Adress']);
		$adressnmbr = test_input($_POST['Adressnmbr']);
		if (!empty($_POST['Phone']))
		{ // als er iets is ingevuld in het telefoon veld:
			$phone = test_input($_POST['Phone']);
			$phone = check_phone($phone);
			//runt de check_phone functie over het opgeslagen telefoon nummer en slaat het
			//in opnieuw op in de $phone variabele
			if(!preg_match("/^[0-9]{10}$/", $phone))
			{ // als het telefoon nummer niet uit 10 nummers bestaat
				$phoneError = " Ongeldig Telefoonnummer";
			} // dan komt er een error om af te lezen
		}
		$zip = test_input($_POST['Zip']);
		$zip = check_zip($zip);
		// runt de check zip functie over de gegeven postcode en slaat hem op in 1 format die
		//makkelijker te checken is
		$town = test_input($_POST['Town']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{ //checkt de e-mail om te zien dat het in een goede format staat met de filter_var functie
			$emailError = " Ongeldig e-mail adress";
			// maakt $emailerror een string als de e-mail niet in een goed formaat is
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$name))
		{ //checkt of de naam alleen spaties en letters en - bevat
			$nameError = " Ongeldige voornaam";
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$scndname))
		{ // det hetzelfde voor de achternaam
			$scndnameError = "Ongeldige achternaam";
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$adress))
		{ // zelfde preg match asl voor naam maar dan voor adress
			$adressError = "Ongeldige straatnaam";
		}
		if (!preg_match("/^[0-9a-zA-Z -]*$/",$adressnmbr)) 
		{ //preg match die er op checkt of het huisnummer de conventies volgt
			$adressnmbrError = "Ongeldig huisnummer";
		}
		if (!preg_match("/^\W*[1-9]{1}[0-9]{3}\W*[a-zA-Z]{2}\W*$/",  $zip)) 
		{ // als de postcode niet uit 4 cijfers en 2 letters bestaat
			$zipError = " Ongeldige Postcode";
		} // dan komt er een error message om af te lezen
		if (!preg_match("/^[a-zA-Z ]*$/",$town))
		{ // zelfde preg match als naam maar dan voor plaats
			$townError = " Ongeldige plaatsnaam";
		}
		// vult alle pre waardes met wat er in het veld is ingevuld, zodat alle velden niet
		//gereset worden als een error voorkomt
	}


	
?>
<form method = "post"> <!-- in HTML wordt een form geïnitialiseerd die de waardes door post 
zodat ze elders in de code weer aangeroepen kunnen worden -->
<fieldset style = "width: 1px"><!-- zorgt voor een randje om het formulier heen, de style zorgt 
dat het randje binnen blijft -->
<legend><h2 align = "left"><strong>Registreren</strong></h2></legend><!--text bovenaan het veld -->
<strong> Velden met een * zijn verplicht </strong> <!--dikgedrukte tekst bovenaan het formulier-->
<br><br> <!-- 2 nieuwe regels -->
<table><!-- een html table wordt hier geïnitialiseerd zodat alles netjes op zijn plaats komt-->
<tr> <!-- nieuwe tabel kolom-->
<td align = "left">Gebruikersnaam*</td>
<!-- het woord gebruikersnaam in een table data, hij is left aligned zodat hij aan de 
linkerkant van het scherm blijft-->
</tr><tr><!-- eindig vorige kolom, begin nieuwe kolom -->
<td align = "left"><input type = "text" name = "Username" value = "<?php echo $username; ?>" 
 maxlength = "45" required></td>
 </tr><tr><td><?php echo $usernameError; ?></td>
<!--Input veld waar de bezoeker een gebruikernaam kan intypen, alweer left aligned. Hij wordt 
opgeslagen onder de naam Username zodat hij op die manier ook weer aan te roepen is. Na het veld 
wordt de $usernameError in php ge-echod zodat als er een foutmeldig is deze zichbaar is naast 
het veld, de maxlenght geeft het maximale aantal tekens weer, zodat het netjes in de database 
past, en de required paramater maakt het een verplicht veld.
Tenslotte geeft de $username value dit veld een waarde als het eerder was ingevuld, 
hetzelfde is herhaald voor alle velden -->
</tr><tr>
<td align = "left">Wachtwoord*</td>
<td align = "left">Wachtwoord herhalen*</td>
</tr><tr>
<td align = "left"><input type = "password" name = "Password1" 
value = "<?php echo $pass1; ?>" maxlength = "10" required></td>
<!-- een wachtwoord veld waar gebruikers niet kunnen zien wat ze typen (omdat het puntjes word) -->
<td align = "left"><input type = "password" name = "Password2" 
value = "<?php echo $pass2; ?>" maxlength = "10" required></td>
</tr><tr>
<td><?php echo $passwordError; ?></td>
<!-- 2de wachtwoord veld om zeker te weten dat de gebruiker zijn of haar wachtwoord wel goed 
heeft getypt, onder beide velden komt de error echo-->
</tr><tr>
<td align = "left">E-mail*</td>
</tr><tr>
<td align="left"><input type = "text" name = "Email" value = "<?php echo $email; ?>" 
maxlength = "45" required></td>
</tr><tr>
<td><?php echo $emailError; ?></td>
</tr><tr>
<td align = "left">Voornaam*</td>
<td align = "left">Achternaam*</td>
</tr><tr>
<td align="left"><input type = "text" name = "Name" value = "<?php echo $name; ?>" required></td>
<td align="left"><input type = "text" name = "ScndName" value = "<?php echo $scndname; ?>" required>
</td>
</tr><tr>
<td><?php echo $nameError; ?></td><td><?php echo $scndnameError; ?></td>
</tr><tr>
<td align = "left">Straatnaam*</td>
<td align = "left">Huisnummer*</td>
</tr><tr>
<td align="left"><input type = "text" name = "Adress" value = "<?php echo $adress; ?>" 
maxlength = "45" required>
</td>
<td align="left"><input type = "text" name = "Adressnmbr" value = "<?php echo $adressnmbr; ?>" 
required></td>
</tr><tr>
<td><?php echo $adressError; ?></td><td><?php echo $adressnmbrError; ?></td>
</tr><tr>
<td align = "left">Postcode*</td>
<td align = "left">Woonplaats*</td>
</tr><tr>
<td align="left"><input type = "text" name = "Zip" value = "<?php echo $zip; ?>" required></td>
<td align="left"><input type = "text" name = "Town" value = "<?php echo $town; ?>" 
maxlength = "10" required></td>
</tr><tr>
<td><?php echo $zipError; ?></td><td><?php echo $townError; ?></td>
</tr><tr>
<td align = "left">Telefoon</td>
</tr><tr>
<td align="left"><input type = "text" name = "Phone" value = "<?php echo $phone; ?>"></td>
</tr><tr>
<td><?php echo $phoneError; ?></td>
<!-- Telefoon is niet required, maar het veld wordt wel gecontroleerd als het wordt ingevuld-->
</tr><tr><td><br></td></tr><tr><!-- extra lege lijn-->
<td align = "left"><input type = "submit" name = "Button" value = "Account Maken"></td>
<!-- Maakt een submit knop aan het einde om alle data door te geven -->
</tr> <!-- sluit de laatste table row af -->
</table><!-- sluit de tabel af -->
</fieldset><!--sluit de fieldset af voor het randje-->
</form><!-- sluit het formulier -->

<?php
	
	function test_input($input) 
	{
		$input = htmlspecialchars($input);
		$input = trim($input);
		$input = stripslashes($input);
		return $input;
	} //Deze functie checked de input als hij ingeroepen wordt voor de veligheid om cross stitching
	//te voorkomen. Hij doet dit door alles in html characters te zetten, spaties aan het begin
	//einde van de zin weg te halen en slashes weg te halen. Daarna geeft hij de input terug
	function check_zip($input)
	{
		$input = str_replace(" ","", $input);
		$input = strtoupper($input);
		return $input;
	} // deze functie zet de postcode om in 1 format door spaties weg te halen en alle letters in
	//hoofdletters om te zetten, hierdoor kan er op 1 postcode format gecontroleerd te worden
	function check_phone($input)
	{
		$input = str_replace(" ","", $input);
		$input = str_replace("-","", $input);
		return $input;
	}// deze functie doet iets soortgelijks maar dan voor telefoon nummers, het haalt spaties 
	//en - weg zodat er opnieuw maar op 1 format gecontroleerd hoeft te worden 
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{ // als er op het submit knopje wordt gedrukt
		if ($usernameError == "" && $passwordError == "" && $emailError == "" && $nameError == ""
		&& $adressError == "" && $phoneError == "" && $zipError == "" && $townError == "")
		{ // en als er geen error messages zijn
			//DATABASE LINK HIER
			$name = $name . " " . $scndname; 
			// voor en achternaam worden samengevoegd tot 1 naam
			
			include("Datalink.php"); // connectie met de db wordt geopend
			if ($phone != "")
			{ // als telefoon is ingevuld
				$query = "INSERT INTO Users(Username, Password, Name, Email, Phone, Postcode, 
				Street_number, Street, Plaats, userrole) VALUES ('$username','$password','$name','$email',
				'$phone','$zip','$adressnmbr','$adress','$town', 'customer')";
			}  	// dan komt alles in de db, incl een customer voor userrole, die aangeeft dat 
				// de gebruiker geen admin is
			else
			{
				$query = "INSERT INTO Users(Username, Password, Name, Email, Postcode, 
				Street_number, Street, Plaats, userrole) VALUES ('$username', '$password', '$name', 
				'$email', '$zip', '$adressnmbr', '$adress', '$town' 'customer')";
			} //anders wordt tel er niet in gestopt, maar de rest wel

			$result = mysqli_query($db,$query); // de query wordt echt uitgevoerd
			if (!$result)
			{ //als er op het einde iets misgaat met de gegevens aan de db toevoegen
				die("Er ging op het einde iets mis met de gewenste gegevens toevoegen!");
			}//dan wordt het script gestopt en wordt er een error message weergegeven
			else //als er niks mis ging en de gebruiker dus is toegevoegd tot de db
			{
				header('Location: registratiesuccess.php');
				// dan gaan we op reis naar de registratie geslaagd pagina
			}
		}
	}
	
?>
