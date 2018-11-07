<?php
session_start();
$user = $_SESSION["Username"];
?>
<table border = 1 >
<form method="post">
    <tr><td colspan="2"><h3 align="center">Bewerk uw Profiel</td></tr>
    <tr><td>Password:</td><td> <input type="text" name="password"></td></tr>
    <tr><td>Email:</td><td> <input type="text" name="email"></td></tr>
    <tr><td>Postcode:</td><td> <input type="text" name="postcode"></td></tr>
    <tr><td>Street Number:</td><td> <input type="text" name="street_number"></td></tr>
    <tr><td>Street:</td><td> <input type="text" name="street"></td></tr>
    <tr><td>Plaats:</td><td> <input type="text" name="plaats"></td></tr>
</table><table>
    <td><input type="submit" name="submit" value="Verander"></td>
    <td><a href="Profielen.php"><input type = "button" name = 'cancel' value = 'Annuleren' ></td>
    </table>
</form>


<?php
  include("Datalink.php");
  if ($db->connect_error) {
     die("Connection failed: " . $db->connect_error);
  }
  
  
  
  
  
 if (isset($_POST["submit"])) {
    $pass = $_POST['password'];
		$pass = test_input($_POST['Password1']);
    $email = $_POST['email'];
	$email = test_input($_POST['Email']);
    $pos  = $_POST['postcode'];
    $sten  = $_POST['street_number'];
	$sten = test_input($_POST['street_number']);
    $ste  = $_POST['street'];
	$ste = test_input($_POST['street']);
    $plaats = $_POST['plaats'];

    $query = "UPDATE `users` SET `Password` = '$pass',
    `Email` = '$email', `Postcode` = '$pos', `Street_number` = '$sten', `Street` = '$ste',
    `Plaats` = '$plaats' WHERE `Username` = '$user'";

    $result = mysqli_query($db, $query);

  if ($db->query($query) === TRUE) {
      echo "Uw informatie is bijgewerkt.";
      header('location: Profielen.php');
    } else {
        echo "Error: " . $query . "<br>" . $db->error;
    }
$db->close();
}
?>
