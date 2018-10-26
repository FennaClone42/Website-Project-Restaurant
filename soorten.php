
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
		<center><h2>Pizzalijst</h2><center>
		</tr>
		<tr> <th>Product_id</th><th>Pizza</th><th>Prijs</th></tr>

<?php
		// 2. Uitvoeren query
		$query = "SELECT * "
		;
		$query .= "FROM products "
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
		while($soorten = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $soorten['id']."</td>";
		echo "<td>" . $soorten['Name'] ."</td>";
	  echo "<td>" . $soorten['Price'] ."</td>";
		echo "</tr>";
		}
		echo "</table>";

?>
