<!DOCTYPE html>
<html>
<head>
	<style> /*Hiermee kan je div mee bewerken soort css*/
  .btn-group .button {
        background-color: #008CBA; /*Achtergrond kleur van button*/
        border: 1px solid blue; /*Breedte, stijl en kleur van de rand van een element opgeven*/
        color: white; /*Tekst kleur in de button*/
        padding: 15px 32px; /*Opvullingseigenschap boven- en ondervulling zijn 15px en de linker- en rechterpadding zijn 5 px*/
        text-align: center; /*Positie tekst in midden van de button*/
        display: inline-block; /*Geen regelovergang na het element, zodat het element naast andere elementen kan zitten.*/
        font-size: 16px; /*Tekengrootte*/
        cursor: pointer; /*Hiermee heeft de muissymbool een handje als vorm*/
        float: center; /*Positie buttons in  het midden van de pagina*/
    }
    .btn-group .button:not(:last-child) {
        border-right: none; /* Hiermee voorkom je dubbele borders*/
    }
    .btn-group .button:hover {
        background-color: #555555; /*Indien je met de muis over de knop beweegt wordt deze de kleur grijs*/
    }
		</style>
</head>
<center><h1>Administrator pagina</h1><center><br />

<body>
	<div class="btn-group">
	<!-- Het aanmaken van een button groep die naast elkaar wordt weergegeven -->
<tr>
<input type="button" class= "button" onclick="location.href='soorten.php';" value="Pizzalijst" />
<!-- Met deze knop wordt er informatie uit de database gehaald (Pizzalijst) -->
<input type="button" class= "button" onclick="location.href='gebruikers.php';" value="Gebruikergegevens" />
<!-- Met deze knop wordt er informatie uit de database gehaald (Gebruikergegevens)-->
</tr>
</div>
</body>

</head>
</html>
