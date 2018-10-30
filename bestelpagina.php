<DOCTYPE! html>
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

<center><h1>Bestelpagina</h1><center>

<body>
<form method ="post" attribute="post" action="bestel2.php">
  <fieldset>
  <table>
    Pizza Pepperoni:<input type="number" max="99" name="pizza1" required> <br />
    Pizza Hawaii:<input type="number" max="99" name="pizza2" required> <p>
  </table>
    <input type = "submit" name="submit" value="Bestel">
      </form>

    <div class="btn-group"><br />
<input type="button" class= "button" onclick="location.href='admin.php';" value="Naar de Admin Pagina"/>
<input type="button" class= "button" onclick="location.href='profielen.php';" value="Naar de Profielen Pagina"/>
  <input type="button" class= "button" onclick="logout.php';" value="Uitloggen"/>
</div>
</body>

</html>
