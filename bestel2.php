<?php

session_start();
if (!isset($_SESSION["Username"])) 
{
	echo "U bent niet ingelogd";
	echo "<br>";
	echo "<a href='Login.php'>Inloggen</a>";
} 
else 
{
	$user = $_SESSION["Username"];

	if (isset($_POST['submit']))
	{
		$pizza1 = $_POST['pizza1'];
		$pizza2 = $_POST['pizza2'];


	include 'datalink.php';
	$query = "SELECT `postcode` , `Street_number` , `street` , `plaats` FROM `users` WHERE `username` = '$user';";
	$result = mysqli_query($db, $query);
		if (!$result) {
			die("Database query mislukt.");
		}

		echo("De volgende artikelen zijn besteld:<br />");
		echo("Aantal Pizza Pepperoni : $pizza1 <br>");
		echo("Aantal Pizza Hawaii: $pizza2 <br><br>");
		echo("<hr>");

		echo("U heeft de artikelen besteld naar: <br>");

	while($row = mysqli_fetch_assoc($result)) {
	  echo "<td>" .$row['street'].' '. $row['Street_number']."</td><br>";
	  echo "<td>" .$row['postcode']."</td><br>";
	  echo "<td>" .$row['plaats']."</td><br>";
	}

	  mysqli_close($db);
	?> <a href="bestelpagina.php"><input type="button" name="cancel" id="cancel" value="Ga terug naar bestelpagina"></a> <?php

	} else {
	  echo("U heeft niks ingevoerd.");
	}
}

?>
