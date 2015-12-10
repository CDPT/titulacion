<?php session_start(); if($_SESSION['estatus']=='1'){ 
include("../../Scripts/conexion.php");

$nom=filter_var($_POST['nombre'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$usu=filter_var($_POST['usuario'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$clave=filter_var($_POST["pass"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

$nombre=$nom;
$usuario=$usu;
//$pass=$_POST['pass'];
$tipo=$_POST['tipo'];
/*
$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
$tipo=$_POST['tipo'];
*/
$consultar=mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario' AND tipoinstitucion='CAT'");
$consulta_usuario =mysql_num_rows($consultar);


if($consulta_usuario != '0'){ ?>

<script type="text/javascript">
	alert(" ! USUARIO No valido cambiarlo porfavor ");
		document.location.href=("usuarios.php");
</script>

<?php

}else{


$var=sha1('aezakmi');
$passmd5=sha1("{$clave}:{sha1($var)}").":".sha1(base64_encode($var))."";


$interta=mysql_query("INSERT INTO usuarios (usuario,password,tipo,estatus,permiso,nombre,nick,tipoinstitucion)
					values('$usuario','$passmd5','$tipo','1','1','$nombre','$usuario','CAT')")
					or die("No se Guardo Verifique con el Administrador Por favor"); ?>
<script type="text/javascript">
	alert("Se Guardo Correctamente");
		document.location.href=("usuarios.php");
</script>

<?php } 
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../index.html");
  </script>
<?php } ?>