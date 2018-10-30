<?php
// session_start();
// if (isset($_SESSION['username'])) {
// $username = $_SESSION['username'];
// } else {
// echo "You have not signed in";
// }
?>
<h2>Weet u het zeker dat u uw profiel wilt verijwderen?</h2>
<input type = "button" name = "profiel" value = 'Profiel Verwijderen'>
<a href="profiel.php"><input type = "button" name = 'cancel' value = 'Annuleren' >
<?php
include ('connect.php');
if (isset($_POST["profiel"])){

	   // $sql= ("DELETE username, password, name, email, phone, postcode, street_number, street, plaats
		 // FROM users WHERE username = '$username' ");
	   // $res = mysql_query($sql);
	   echo"Uw profiel is verwijderd.";
		 echo "<a href='hoofdpagina.php'><input type = 'button' name = 'cancel' value = 'Terug naar Hoofdpagina' >";
	 }


?>
