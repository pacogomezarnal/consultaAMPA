<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consulta Horario AMPA Platero y yo</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/css/estilos.css">
  </head>
  <body>
    <div class="w3-row w3-padding-24">
      <div class="w3-container w3-quarter"></div>
      <div class="w3-containe  w3-half w3-card-4">
        <header class="w3-container w3-blue">
          <h1>Consulta del Nuevo Horario</h1>
        </header>
        <div class="w3-container">
          <form class="w3-container" action="votar.php" method="post">
            <?php
            if(isset($_GET["m"])){
            ?>
            <h3 class="w3-red"><?=$_GET["m"]?></h3>
            <?php
            }
            ?>
            <p>
              <label class="w3-text-grey">Introduce tu DNI con la letra</label>
              <input class="w3-input w3-border" type="text" required="" name="dni">
            </p>
            <p><input type="submit" class="w3-btn w3-padding w3-blue" value="SIGUIENTE"></p>
          </form></p>
        </div>
        <footer class="w3-container w3-blue">
          <h3>AMPA Platero y Yo</h3>
        </footer>
      </div>
      <div class="w3-container w3-quarter"></div>
    </div>
  </body>
</html>
