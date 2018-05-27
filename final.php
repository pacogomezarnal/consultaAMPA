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
          $mensaje="La teua opinió ha sigut computada";
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue.css">
    <link rel="stylesheet" href="/css/estilos.css">
  </head>
  <body>
    <header class="w3-top w3-bar w3-theme w3-center">
      <h2 class="w3-bar-item w3-center <?php echo ($incorrecto)?"w3-red":"w3-green";?>"><?=$mensaje?></h2>
    </header>
    <div class="w3-container" style="margin-top:120px">
      <h2>DNI: <?=$_POST["dni"]?></h2>
      <h2>OPINIÓ: <?=$_POST["eleccion"]?></h2>
      <h2>DATA: <?=date("Y-m-d H:i:s")?></h2>
    </div>
    <footer class="w3-container w3-bottom w3-theme w3-margin-top w3-center">
      <img  class="" src="img/logo_ampa.jpg" alt="AMPA" width="100%">
    </footer>
  </body>
</html>
