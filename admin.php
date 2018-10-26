<<!DOCTYPE html>
<html>
<head>
	<style>
	.btn-group .button {
	    background-color: #008CBA; /* Blauw */
	    border: 1px solid blue;
	    color: white;
	    padding: 15px 32px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-size: 16px;
	    cursor: pointer;
	    float: center;
	}
	.btn-group .button:not(:last-child) {
	    border-right: none; /* Prevent double borders */
	}
	.btn-group .button:hover {
	    background-color: #555555;
	}
	</style>
</head>
<center><h1>Administrator pagina<center><br />

<body>
	<div class="btn-group">
<tr>
<input type="button" class= "button" onclick="location.href='soorten.php';" value="Pizzalijst" />
<input type="button" class= "button" onclick="location.href='gebruikers.php';" value="Gebruikergegevens" />
</tr>
</div>
<?php


?>

</body>

</head>
</html>
