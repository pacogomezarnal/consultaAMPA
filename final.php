<?php
//Comprobación del campo dni
$incorrecto=true;
$mensaje="";
if(!isset($_POST["dni"])){
  $mensaje="No se ha introducido el DNI";
}else{
  $mysqli = new mysqli("localhost", "root", "", "ampaplatero");
  if ($mysqli->connect_errno) {
      $mensaje="En estos momentos no podemos almacenar tu voto. Prueba en 5 minutos";
  }else{
      //Comprobamos que el DNI no haya votado
      $resultado=$mysqli->query("SELECT voto from padres where dni='".$_POST["dni"]."'");
      $voto=$resultado->fetch_assoc();
      if(strlen($voto["voto"])>0)
      {
        $mensaje="Aquest DNI ja ha opinat";
      }else{
        $resultado=$mysqli->query("UPDATE padres set voto='".$_POST["eleccion"]."' ,fecha='".date("Y-m-d H:i:s")."' where dni='".$_POST["dni"]."'");
        if($resultado){
          $incorrecto=false;
          $mensaje="LA TEUA OPINIÓ HA SIGUT COMPUTADA";
        }else{
          $mensaje="En estos momentos no podemos almacenar tu voto. Prueba en 5 minutos";
        }
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
        <header class="w3-container <?php echo ($incorrecto)?"w3-red":"w3-green";?>">
          <h1 w3-xxxlarge><?=$mensaje?></h1>
        </header>
        <div class="w3-container w3-xxxlarge">
          <h1>DNI: <?=$_POST["dni"]?></h1>
          <h1>OPINIÓ: <?=$_POST["eleccion"]?></h1>
          <h1>DATA: <?=date("Y-m-d H:i:s")?></h1>
        </div>
      </div>
      <footer class="w3-container w3-blue w3-center">
        <img src="img/logo_ampa.jpg" alt="AMPA" width="25%">
      </footer>
    </div>
  </body>
</html>
