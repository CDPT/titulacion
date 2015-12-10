<?php
	include ("../Scripts/conexion.php");


$nombre=$_REQUEST['nombre'];
$usuario=$_REQUEST['usuario'];
$password=$_REQUEST['password'];
 $tipo=$_REQUEST['tipo'];


$pass=md5($password);



$consultar=mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario'");
$consulta_usuario =mysql_num_rows($consultar);





if($consulta_usuario != 0){

?>
<script type="text/javascript">
	alert(" ! USUARIO No valido cambiarlo porfavor ");
		document.location.href=("index.php");
</script>

<?php

}else{

$guarda=mysql_query("INSERT INTO usuarios(usuario,password,tipo,estatus,nombre,nick) 
					 VALUES('$usuario','$pass','$tipo','1','$nombre','$usuario')")
					  or die("No se Guardo Verifique con el Administrador Por favor");

if($guarda){

?>
<script type="text/javascript">
	alert("Registro Exitoso");
		document.location.href=("../index.php");
</script>

<?php }   } ?>



