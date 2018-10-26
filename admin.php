<body bgcolor = "#E0FFFF">

<?php session_start(); // sessie beginnen
if (isset($_SESSION["gebruiker"])){
echo("<h2> Welkom " . $_SESSION["gebruiker"] ." </h2>");
echo ("U bent nu in het beveiligde gedeelte van de ADMIN beland.");
echo("<br>De ze link kan gebruikt worden om <a href=\"logout.php\"> uit te loggen</a><br>");
}

else{
	echo("U hebt zich nog niet aangemeld;<br>u kunt zich <a 	href=\"frm_registreer.php\">hier registreren</a><br> ");
  echo("U hebt zich nog niet aangemeld;<br>u kunt hier proberen <a 	href=\"frm_login.php\">opnieuw in te loggen</a>");
  	}
    ?>
