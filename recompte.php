<?php
$incorrecto=true;
$mensaje="";
//Recuento
$mysqli = new mysqli("localhost", "root", "", "ampaplatero");
if ($mysqli->connect_errno) {
    $mensaje="En estos momentos no podemos almacenar tu voto. Prueba en 5 minutos";
}else{
  $resultadoSI=$mysqli->query("SELECT count(voto) as si from padres where voto='si'");
  $votoSI=$resultadoSI->fetch_assoc();
  $resultadoNO=$mysqli->query("SELECT  count(voto) as no from padres where voto='no'");
  $votoNO=$resultadoNO->fetch_assoc();
  $incorrecto=false;
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
      <h2 class="w3-bar-item w3-center">Recompte</h2>
    </header>
    <div class="w3-container" style="margin-top:120px">
      <?php
      $total=$votoSI["si"]+$votoNO["no"];
      $percSI=(100*$votoSI["si"])/$total;
      $percNO=100-$percSI;
      ?>
      <h2>SI: <?php echo "$votoSI['si'] ($percSI% dels que han opinat)";?></h2>
      <h2>NO: <?php echo "$votoNO['no'] ($percNO% dels que han opinat)";?></h2>
    </div>
    <footer class="w3-container w3-bottom w3-theme w3-margin-top w3-center">
      <img  class="" src="img/logo_ampa.jpg" alt="AMPA" width="100%">
    </footer>
  </body>
</html>
