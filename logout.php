<?php
session_start();
session_unset(); // alle variabelen vrijgeven
session_destroy(); // sessie afsluiten
?>
<title>Uitloggen</title> 
<h2>Uitloggen</h2>
<hr>
U bent nu uitgelogd. <br>
De pagina <a href="admin.php">admin.php</a> is niet langer bereikbaar.<br>
U kunt hier eventueel opnieuw <a href="frm_login.php">inloggen</a>.
