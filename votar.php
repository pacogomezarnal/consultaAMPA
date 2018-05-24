<?php
//Comprobación del campo dni
$incorrecto=true;
$mensaje="";
if(!isset($_POST["dni"])){
  $mensaje="No se ha introducido el DNI";
}else{
  //Comprobamos que el DNI está en la base de datos
  $mysqli = new mysqli("localhost", "root", "", "ampaplatero");
  if ($mysqli->connect_errno) {
      $mensaje="En estos momentos no podemos almacenar tu voto. Prueba en 5 minutos";
  }else{
      $dni=strtoupper($_POST["dni"]);
      $resultado=$mysqli->query("SELECT dni from padres where dni='".$dni."'");
      if($resultado->num_rows>0){
        $padre=$resultado->fetch_assoc();
        $incorrecto=false;
      }else{
        $mensaje="Tu DNI no está en nuestro listado. Intentalo de nuevo o vota en papel";
      }
  }
}
if($incorrecto){
  header('Location: index.php?m='.$mensaje);
}
?>
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
      <div class="w3-card-4">
        <header class="w3-container w3-blue">
          <h1>DNI: <?=$dni?></h1>
        </header>
        <div class="w3-container">
          <form class="w3-color-container w3-xlarge" action="final.php" method="post">
            <p>
              <label class="w3-text-black">Horari proposat: els matins es mantenen igual sols es modifica l’horari de les vesprades de dilluns a dijous de 15:00 a 16:30.</label>
              <br>
              <input type="radio" name="eleccion" value="si"> SI <br>
              <input type="radio" name="eleccion" value="no"> NO <br>
              <input type="hidden" name="dni" value="<?=$dni?>">
            </p>
            <p><input type="submit" class="w3-btn w3-padding w3-blue" value="VOTAR"></p>
          </form></p>
        </div>
        <footer class="w3-container w3-blue w3-center">
          <img src="img/logo_ampa.jpg" alt="AMPA" width="25%">
        </footer>
      </div>
    </div>
  </body>
</html>
