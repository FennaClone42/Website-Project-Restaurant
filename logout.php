<!DOCTYPE html>
<html>
<head>
  <h3>Weet u zeker dat u wilt uitloggen?</h3>
</head>
<body>
  <?php session_start(); ?>
  <form method = "post">
  <input type = "submit" name = "logout" value = 'Ja, ik wil uitloggen'>
  <a href="bestelpagina.php"><input type = "button" name = 'cancel' value = 'Ga terug naar Bestel Pagina' >
  <?php
  if (isset($_POST["logout"])){
session_unset();
session_destroy();
header('location: homepagina.php');
}
 ?>
</form>
</body>
</html>
