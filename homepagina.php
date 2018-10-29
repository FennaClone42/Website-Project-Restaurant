<!DOCTYPE html>
<html>
<head>
<center><h1>IkHebHonger.nl<center><br />
<link rel="stylesheet" href="styles.css">
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
  .footer {
     position: fixed;
     left: 0;
     bottom: 0;
     width: 100%;
     background-color: grey;
     color: white;
     text-align: center;
  }
</style>

<body>
  <center><img src="pizza.jpg" alt="pizza" style="width:600px;height:300px"; align="middle";></center><br />
<div class="btn-group">
<input type="button" class= "button" onclick="location.href='loginscherm.php';" value="Inloggen"/>
<input type="button" class= "button" onclick="location.href='registratie.php';" value="Registreren"/>
</div>
  <?php
?>

</body>
<footer>
  <center><div class = "footer"><p>Gemaakt door: Groep 5 ITV1J</p></center>
</footer>
</head>
</html>
