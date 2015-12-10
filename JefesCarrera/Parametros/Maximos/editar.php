<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");
$id=$_POST['id'];
$maximo=$_POST['maximo'];


$editar=mysql_query("UPDATE maximo SET maximo='$maximo' WHERE id='$id' ")or die(mysql_error());

if($editar){
?>		
<script type="text/javascript">
	alert("Se Guardo Correctamente");
	document.location.href=("index.php");
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