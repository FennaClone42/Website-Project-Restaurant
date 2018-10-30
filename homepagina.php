<!DOCTYPE html>
<html>
<head>
<center><h1>IkHebHonger.nl<center><br />
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
  .footer { /*Onderaan de pagina een onderstuk met tekst*/
     position: fixed; /*De voettekst wordt onderaan de pagina geplaatst.*/
     left: 0; /*Het onderstuk begint van helemaal links*/
     bottom: 0; /*Het onderstuk begint van helemaal onderin*/
     width: 100%; /*Het onderstuk van links tot rechts*/
     background-color: grey; /*Achtergrond kleur footer*/
     color: white; /*Tekstkleur in de footer*/
     text-align: center; /*Tekstpositie in het midden van de footer*/
  }
</style>

<body>
  <center><img src="pizza.jpg" alt="pizza" style="width:600px;height:300px"; align="middle";></center><br />
  <!-- Het weergeven van een foto die wij hebben gekozen -->
<div class="btn-group">
  <!-- Het aanmaken van een button groep die naast elkaar wordt weergegeven -->
<input type="button" class= "button" onclick="location.href='loginscherm.php';" value="Inloggen"/>
<!-- Knop die doorverwijst naar loginscherm.php -->
<input type="button" class= "button" onclick="location.href='registratie.php';" value="Registreren"/>
<!-- Knop die doorverwijst naar registratie.php -->
</div>
</body>

<footer><!-- Onderaan de pagina een onderstuk met tekst -->
  <center><div class = "footer"><p>Gemaakt door: Groep 5 ITV1J</p></center>
</footer>
</head>
</html>
