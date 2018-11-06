<form  method="post">
<?php
<<<<<<< HEAD
include 'Datalink.php';
$gebruikersnaam = $_GET['user'];
echo "Gebruiker $gebruikersnaam verwijderen, weet u het zeker?";
 $sql= "DELETE FROM `users` WHERE `Username` = '$gebruikersnaam'";
echo "<input type='submit' name='delete' value='Ja'>";
echo "</form><form action='admin.php'>";
echo "<input type='submit' name='cancel' value='Nee'>";
 if(isset($_POST['delete'])){
   $result = mysqli_query($db, $sql);
  if (!$result) {
     echo "Er ging iets fout met de db verbinden";
     die;
    }
 }
=======
	include 'Datalink.php';
	$gebruikersnaam = $_GET['user'];
	echo "Gebruiker $gebruikersnaam verwijderen, weet u het zeker?";
	echo "<input type='submit' name='delete' value='Ja'>";
	echo "</form><form action='admin.php'>";
	echo "<input type='submit' name='cancel' value='Nee'>";
	if(isset($_POST['delete']))
	{
		$sql= "DELETE FROM users WHERE Username = '$gebruikersnaam'";
		$result = mysqli_query($db, $sql);
		if (!$result) 
		{
			echo "Er ging iets fout met de db verbinden";
			die;
		}
	 }
>>>>>>> 3a075e2a72e85cb5bd304661e588dfa30f123c05
?>
</form>
