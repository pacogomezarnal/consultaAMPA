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
      $resultado=$mysqli->query("SELECT voto from padres where dni=".$_POST["dni"]);
      $voto=$resultado->fetch_assoc();
      if(strlen($voto["voto"])>0)
      {
        $mensaje="Este DNI ya ha VOTADO";
      }else{
        $resultado=$mysqli->query("UPDATE padres set voto='".$_POST["eleccion"]."' ,fecha='".date("Y-m-d H:i:s")."' where dni=".$_POST["dni"]);
        if($resultado){
          $incorrecto=false;
          $mensaje="TU VOTO HA SIDO ALMACENADO";
        }else{
          $mensaje="En estos momentos no podemos almacenar tu voto. Prueba en 5 minutos";
        }
      }
  }
}
if($incorrecto){
  //header('Location: index.php?m='.$mensaje);
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
          <h1 class="<?php echo ($incorrecto)?"w3-red":"w3-green";?>"><?=$mensaje?></h1>
        </div>
      </div>
      <div class="w3-container w3-quarter"></div>
    </div>
  </body>
</html>
