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
      $resultado=$mysqli->query("SELECT nombre from padres where dni=".$_POST["dni"]);
      if($resultado->num_rows>0){
        $padre=$resultado->fetch_assoc();
        $incorrecto=false;
      }else{
        $mensaje="Tu DNI no está en nuestro listado";
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
    <div class="w3-row w3-padding-24">
      <div class="w3-container w3-quarter"></div>
      <div class="w3-containe  w3-half w3-card-4">
        <header class="w3-container w3-blue">
          <h1>Consulta del AMPA Platero y Yo</h1>
        </header>
        <div class="w3-container">
          <form class="w3-color-container" action="final.php" method="post">
            <p class="w3-khaki"><?=$padre["nombre"]?></p>
            <p>
              <label class="w3-text-grey">Quieres que el colegio adopte el nuevo horario</label>
              <br>
              <input type="radio" name="eleccion" value="si"> SI <br>
              <input type="radio" name="eleccion" value="no"> NO <br>
              <input type="hidden" name="dni" value="<?=$_POST["dni"]?>">
            </p>
            <p><input type="submit" class="w3-btn w3-padding w3-blue" value="VOTAR"></p>
          </form></p>
        </div>
      </div>
      <div class="w3-container w3-quarter"></div>
    </div>
  </body>
</html>
