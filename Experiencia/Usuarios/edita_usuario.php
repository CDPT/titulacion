<?php session_start();
if($_SESSION['estatus']=='1'){
include("../../Scripts/conexion.php");
error_reporting(0);

$id=$_POST['id'];

$no=filter_var($_POST['nombre'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$us=filter_var($_POST['usuario'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
/*
$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$tipo=$_POST['tipo'];
*/
$nombre=$no;
$usuario=$us;
$tipo=$_POST['tipo'];
/*
$consultar=mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario'");
$consulta_usuario =mysql_num_rows($consultar);


if($consulta_usuario != '0'){ ?>

<script type="text/javascript">
	alert("!USUARIO No valido cambiarlo porfavor ");
		document.location.href=("usuarios.php");
</script>

<?php

}else{*/

$interta=mysql_query("UPDATE usuarios SET usuario='$usuario',tipo='$tipo',nombre='$nombre' WHERE id_usuario='$id' ")
					or die("No se Guardo Verifique con el Administrador Por favor"); ?>
<script type="text/javascript">
	alert("Se Guardo Correctamente");
		document.location.href=("usuarios.php");
</script>

<?php //} 
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../index.html");
  </script>
<?php } ?>