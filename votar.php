<?php
//Comprobación del campo dni
$incorrecto=true;
$mensaje="";
if(!isset($_POST["dni"])){
  $mensaje="No se ha instroduit el DNI";
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
        $mensaje="Tu DNI no està a la nostra llista. Prova de nou o  utilitza la papereta";
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
  </head>
  <body>
    <header class="w3-top w3-bar w3-theme w3-center">
      <h2 class="w3-bar-item w3-center w3-red">DNI: <?=$dni?></h2>
    </header>
    <div class="w3-container w3-center" style="margin-top:90px">
      <p>Necessitem saber la vostra opinió respecte a la proposta de canvi d’horari, per part del Claustre de Professorat. Per tant, vos convoquem a que l’expresseu a través d’una consulta no vinculant, per orientar als representants dels pares/mares al Consell Escolar.</p>
    </div>
    <div class="w3-container">
      <form  action="final.php" method="post">
        <p>
          <label class="w3-text-black">Horari proposat: els matins es mantenen igual sols es modifica l’horari de les vesprades de dilluns a dijous de 15:00 a 16:30.</label>
          <br>
          <input type="radio" name="eleccion" value="si"> SI <br>
          <input type="radio" name="eleccion" value="no"> NO <br>
          <input type="hidden" name="dni" value="<?=$dni?>">
        </p>
        <p><input type="submit" class="w3-btn w3-padding w3-blue" value="OPINAR"></p>
      </form>
    </div>
    <footer class="w3-container w3-bottom w3-theme w3-margin-top w3-center">
      <img  class="" src="img/logo_ampa.jpg" alt="AMPA" width="100%">
    </footer>
  </body>
</html>
