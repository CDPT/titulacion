<?php session_start();
if($_SESSION['estatus']==1){
include("../../Scripts/conexion.php");
error_reporting(0);

 $permiso=$_REQUEST['permiso'];
 $id=$_REQUEST['id'];


if($permiso=="activo"){

	$edita1=mysql_query("UPDATE usuarios SET permiso='0' WHERE id_usuario='$id' ")or die("No se puedo editar");
}else{

	$edita2=mysql_query("UPDATE usuarios SET permiso= '1' WHERE id_usuario='$id' ")or die("No se puedo editar");
}


?>
<script type="text/javascript">
	alert("Se edito El Permiso");
	document.location.href=("usuarios.php");
</script>
<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../../index.html? var=0");
	</script>
<?php } ?>