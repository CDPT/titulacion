<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!-- Autor: Víctor Javier Báez Morales LSCA-->
<!DOCTYPE html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
<title>:: ELIMINAR ::</title>
<style type="text/css">
body {
	background-image: url(images/contenido.jpg);
}
p {
	font-size: 36px;
}
</style>
</head>

<body>
  <?php
  include("../../../Scripts/conexion.php");
  

$matricula=$_POST['matricula'];


$eliminar=" DELETE FROM  formulario WHERE matricula='$matricula'";

/*
$eliminar=" DELETE FROM  datos WHERE NumIdentif='$num' and Nombre='$nombre' and ApePat='$apellidopat' and ApeMat='$apellidomat'
and Edad='$edad' and Sexo='$sexo' and Calle='$calle' and Colonia='$colonia' and CP='$cp' and Estado='$estado' and Municipio='$municipio' and Congregacion='$congreg' and ConcepDeten='$concepto'";
*/
$eliminar=mysql_query($eliminar) or die ("NO SE PUEDE ELIMINAR");

$eliminar2=" DELETE FROM  formulario_er WHERE matricula='$matricula'";

$eliminar2=mysql_query($eliminar2) or die ("NO SE PUEDE ELIMINAR");

$eliminar3=" DELETE FROM  formulario_cat WHERE matricula='$matricula'";

$eliminar3=mysql_query($eliminar3) or die ("NO SE PUEDE ELIMINAR");

//echo "SE HA ELIMINADO $eliminar";
?>
<script>
alert("el registro fue eliminado......");
document.location=("index.php");
</script>
</p>
<p>
REGISTRO ELIMINADO SATISFACTORIAMENTE </body>
</html>




<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html");
  </script>
<?php } ?>