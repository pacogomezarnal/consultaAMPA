<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consulta Horario AMPA Platero y yo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
  </head>
  <body>
    <header class="w3-top w3-bar w3-theme w3-center">

      <?php
      if(isset($_GET["m"])){
      ?>
      <h2 class="w3-bar-item w3-center w3-red"><?=$_GET["m"]?></h2>
      <?php
      }else{
      ?>
      <h2 class="w3-bar-item w3-center">Consulta no vinculant</h2>
      <?php
      }
      ?>
    </header>
    <div class="w3-container w3-center" style="margin-top:90px">
      <p>Necessitem saber la vostra opinió respecte a la proposta de canvi d’horari, per part del Claustre de Professorat. Per tant, vos convoquem a que l’expresseu a través d’una consulta no vinculant, per orientar als representants dels pares/mares al Consell Escolar.</p>
    </div>
    <div class="w3-container" style="margin-top:90px">
      <form  action="votar.php" method="post">
        <p>
          <label class="w3-text-grey">Introduïx el teu DNI amb la lletra</label>
          <input class="w3-input w3-border" type="text" required="" name="dni">
        </p>
        <p><input type="submit" class="w3-btn w3-padding w3-blue" value="SEGÜENT"></p>
      </form>
    </div>
    <footer class="w3-container w3-bottom w3-theme w3-margin-top w3-center">
      <img  class="" src="img/logo_ampa.jpg" alt="AMPA" width="100%">
    </footer>
  </body>
</html>
