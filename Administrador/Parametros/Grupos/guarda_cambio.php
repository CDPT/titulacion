<?php 	session_start();
if($_SESSION['estatus']=='1'){
	include("../../../Scripts/conexion.php");
	$id=$_POST['id'];
	$capacidad=$_POST['capacidad'];

	$guardar=mysql_query("UPDATE grupos SET capacidad='$capacidad' where id_grupo='$id'")or die("no se pudo realizar la consulta");

	if($guardar){
		?>		
		<script type="text/javascript">
		alert("Se Guardo Correctamente");
		document.location.href=("listado_grupos.php");
		</script>
		<?php } ?>


		<?php
	}else{
		session_destroy();
		?>
		<script type="text/javascript">
		document.location.href=("../../index.html? var=0");
		</script>
		<?php }  ?>