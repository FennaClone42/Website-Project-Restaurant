<?php
session_start();
$user = $_SESSION["Username"];
?>
<h2>Weet u het zeker dat u uw profiel wilt verwijderen?</h2>
<form method = "post">
<input type = "submit" name = "profiel" value = 'Profiel Verwijderen'>
<a href="profielen.php"><input type = "button" name = 'cancel' value = 'Annuleren' >

<?php
include ('datalink.php');
if (isset($_POST["profiel"])){

	   $sql= "DELETE FROM users WHERE username = '$user'";
	   $result = mysqli_query($db, $sql);
		if (!$result) {
		   echo "Er ging iets fout met de db verbinden";
		   die;
		  }

			if($result){
 			 session_unset();
 				session_destroy();
 				header('Location: homepagina.php');
 					}
				}

?>
</form>
