<form  method="post">
<?php
	include 'Datalink.php';
	$gebruikersnaam = $_GET['user'];
	echo "Gebruiker $gebruikersnaam verwijderen, weet u het zeker?";
	echo "<input type='submit' name='delete' value='Ja'>";
	echo "</form><form action='admin.php'>";
	echo "<input type='submit' name='cancel' value='Nee'>";
	if(isset($_POST['delete']))
	{
		echo "HEY JE DRUKT ER OP";
		// $sql= "DELETE FROM users WHERE Username = '$gebruikersnaam'";
		// $result = mysqli_query($db, $sql);
		// if (!$result) 
		// {
			// echo "Er ging iets fout met de db verbinden";
			// die;
		// }
	 }
?>
</form>