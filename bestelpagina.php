<DOCTYPE! html>
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
        border-right: none; /* Hiermee voorkom je dubbele randen*/
    }
    .btn-group .button:hover {
        background-color: #555555; /*Indien je met de muis over de knop beweegt wordt deze de kleur grijs*/
    }

  </style>

<center><h1>Bestelpagina</h1><center>

<body>
<form method ="post" attribute="post" action="bestel2.php">
  <fieldset>
  <table>
    Pizza Pepperoni:<input type="number" max="99" name="pizza1" required> <br />
    <!-- Invoerveld voor het opgeven van de gewenste aantal pizza's Pepperoni -->
    Pizza Hawaii:<input type="number" max="99" name="pizza2" required> <p>
    <!-- Invoerveld voor het opgeven van de gewenste aantal pizza's Hawaii -->
  </table>
    <input type = "submit" name="submit" value="Bestel">
    <!-- Bevestigingsknop voor het bestellen van de opgegeven pizza's -->
      </form>

    <div class="btn-group"><br />
      <!-- Het aanmaken van een button groep die naast elkaar wordt weergegeven -->
<input type="button" class= "button" onclick="location.href='admin.php';" value="Naar de Admin Pagina"/>
<!-- Met deze knop wordt er doorverwezen naar de admin pagina -->
<input type="button" class= "button" onclick="location.href='profielen.php';" value="Naar de Profielen Pagina"/>
<!-- Met deze knop wordt er doorverwezen naar de profielen pagina -->
  <input type="button" class= "button" onclick="logout.php';" value="Uitloggen"/>
  <!-- Met deze knop wordt er doorverwezen naar de uitlog pagina -->
</div>
</body>

</html>
