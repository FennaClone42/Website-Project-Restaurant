<form  method="post">
<?php
session_start();
if (!isset($_SESSION["Admin"])) {
	echo "U bent niet ingelogd";
	echo "<br>";
	echo "<a href='Login.php'>Inloggen</a>";
}
$admin = $_SESSION["Admin"];
if ($admin != 'admin') {
	echo "U hebt geen admin rechten";
	echo "<br>";
	echo "<a href='Bestelpagina.php'>Terug naar de bestelpagina</a>";
} else {
	
	include 'Datalink.php';
	$gebruikersnaam = $_GET['user'];
	echo "Gebruiker $gebruikersnaam verwijderen, weet u het zeker?";
	echo "<input type='submit' name='delete' value='Ja'>";
	echo "</form><form action='admingebruikers.php'>";
	echo "<input type='submit' name='cancel' value='Nee'>";
	if(isset($_POST['delete']))
	{
		$sql= "DELETE FROM users WHERE Username = '$gebruikersnaam'";
		echo $sql;
		$result = mysqli_query($db, $sql);
		if (!$result) 
		{
			echo "Er ging iets fout met met de db verbinden";
			die;
		}
		else
		{
			header("location:admingebruiker.php");
		}
	 }
}
?>
</form>
