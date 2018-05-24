<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consulta Horario AMPA Platero y yo</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/css/estilos.css">
  </head>
  <body>
    <div class="w3-row w3-padding-24 w3-margin-right w3-margin-left">
      <div class="w3-card-4 w3-xxxlarge">
        <header class="w3-container w3-blue w3-xxxlarge">
          <h4>Necessitem saber la vostra opinió respecte a la proposta de canvi d’horari, per part del Claustre de Professorat. Per tant, vos convoquem a que l’expresseu a través d’una consulta no vinculant, per orientar als representants dels pares/mares al Consell Escolar.</h4>
        </header>
        <header class="w3-container w3-red w3-xxlarge">
          <?php
          if(isset($_GET["m"])){
          ?>
          <h4><?=$_GET["m"]?></h4>
          <?php
          }
          ?>
        </header>
        <div class="w3-container w3-xxxlarge">
          <form class="w3-container" action="votar.php" method="post">
            <p>
              <label class="w3-text-grey">Introduce tu DNI con la letra</label>
              <input class="w3-input w3-border" type="text" required="" name="dni">
            </p>
            <p><input type="submit" class="w3-btn w3-padding w3-blue" value="SIGUIENTE"></p>
          </form></p>
        </div>
        <footer class="w3-container w3-blue w3-center">
          <img src="img/logo_ampa.jpg" alt="AMPA" width="25%">
        </footer>
      </div>
    </div>
  </body>
</html>
