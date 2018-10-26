
<?php session_start(); // sessie beginnen
if (isset($_SESSION["gebruiker"])){
echo("<h2> Welkom " . $_SESSION["gebruiker"] ." </h2>");
echo ("U bent nu in het beveiligde gedeelte van de ADMIN beland.");
echo("<br>De ze link kan gebruikt worden om <a href=\"logout.php\"> uit te loggen</a><br>");
}

else{
  	}
    ?>
<br />
		<?php
		// 1. Koppeling naar database regelen door code in te voegen
		include 'database.php';
		?>
		<table border="1" width="50%" align="center">
		<tr>
		<center><h2>Overzicht klanten</h2><center>
		</tr>
		<tr> <th>Gebruikersnaam</th><th>Klantnaam</th><th>Email</th><th>Telefoonnummer</th><th>Postcode</th><th>Huisnummer</th>
			<th>Straat</th><th>Plaats</th> </tr>

<?php
		// 2. Uitvoeren query
		$query = "SELECT * "
		;
		$query .= "FROM users "
		;
		$result
		= mysqli_query
		($db
		, $query);
		if (!$result
		)
		{
		die
		("Database query mislukt.");
		}


		// 3. Gegevens tonen
		while($klant = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $klant['Username']."</td>";
		echo "<td>" . $klant['Name'] ."</td>";
		echo "<td>" . $klant['Email'] . "</td>";
		echo "<td>" . $klant['Phone'] . "</td>";
		echo "<td>" . $klant['Postcode'] . "</td>";
		echo "<td>" . $klant['Street_number'] . "</td>";
		echo "<td>" . $klant['Street'] . "</td>";
		echo "<td>" . $klant['Plaats'] . "</td>";
		echo "</tr>";
		}
		echo "</table>";

?>
