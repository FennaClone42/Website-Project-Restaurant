<?php
	
	session_start(); //opent de sessie
	$user = $_SESSION["Username"]; //username wordt uit de sessie gehaald en in de $user variabele opgeslagen
	include("Datalink.php"); //link met de db
	$query = "SELECT * FROM Users WHERE Username = '$user'"; //selecteerd alle info uit de users kolom waar de gebruikersnaam die van de gebruiker is
	$result = mysqli_query($db, $query); //voert de query uit als $result
	if (!$result) { //als $result leeg is en de query dus mis ging:
		echo "Er ging helaas iets mis tijdens de verbinding met onze database"; //dan is alleen deze error message zichtbaar
	}
	function hidepass ($input) { // functie die het wachtwoord omzet tot sterretjes
		$input = str_replace("a-zA-Z0-9","*",$input);
		return $input;
	}
	while ($profiel = mysqli_fetch_assoc($result)) { //zolang er nog data is in de $result query (die hier opnieuw wordt opgeslagen als $profiel)
		echo "<table border = 1>"; //tabel met randje
		echo "<tr>"; //nieuwe tabel rij
		echo "<td>Naam: </td>";
		echo "<td>"$profiel['Naam']."</td>"; //1 rij met eerst een cel met "Naam:" er in en een cel met de naam van de gebruiker, uit de DB gehaald
		echo "</tr>"; //tabel rij wordt afgesloten
		echo "<tr>"; //nieuwe tabel rij, vanaf dit punt wordt alles wat hierboven staat simpelweg herhaald, maar dan voor de andere waardes in de profiel DB
		echo "<td>Profielnaam: </td>";
		echo "<td>"$profiel['Profielnaam']."</td>";
		echo "</tr>";
		echo "<tr>"; 
		echo "<td>Wachtwoord: </td>";
		echo "<td>"hidepass($profiel['Wachtwoord'])."</td>"; //wachtwoord word weeregeven als sterretjes
		echo "</tr>";
		echo "<tr>"; 
		echo "<td>E-mail: </td>";
		echo "<td>"$profiel['Email']."</td>";
		echo "</tr>";
		echo "<tr>"; 
		echo "<td>Adres: </td>";
		echo "<td>"$profiel['Adres']."</td>";
		echo "</tr>";
		echo "<tr>"; 
		echo "<td>Postcode: </td>";
		echo "<td>"$profiel['Zip']."</td>";
		echo "</tr>";
		echo "<tr>"; 
		echo "<td>Woonplaats: </td>";
		echo "<td>"$profiel['town']."</td>";
		echo "</tr>";
		echo "<form method = 'post' action = 'Profiel bewerken.php'>"; //opent een post form waar als je op submit drukt je naar de profiel bewerk pagina gaat
		echo "<tr>"; //nieuwe tabel rij
		echo "<td><input type = 'submit' value = 'Profiel Bewerken'></td>"; //submit knopje waar Profiel Bewerken op staat
		echo "<input type = 'hidden' value = '".$profiel['Profielnaam']."'>" // een verbogen veld die de gebruiker niet ziet, deze stuurt de profiel naam waarde mee naar de account bewerken pagina zodat deze makkelijker geselecteerd kan worden
		echo "</form><form method = 'post' action = 'Profiel verwijderen.php'>"; //oude form wordt afgesloten, nieuwe form wordt geopent waar je naar de profiel verwijderen pagina gaat als je op submit drukt
		echo "<input type = 'hidden' value = '".$profiel['Profielnaam']."'>" // zelfde hidden veld als hiervoor maar deze gaat naar de profiel berwijderen pagina
		echo "<td><input type = 'submit' value = 'Profiel Verwijderen'></td>";//submit knopje waardoor je naar de profiel verwijderen pagina gaat
		echo "</form>"; //form wordt afgesloten
		echo "</table>"; //table wordt afgesloten
	}


?>