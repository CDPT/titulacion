<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");
$id=$_GET['id'];
$concepto=$_POST['concepto'];



$guardar=mysql_query("UPDATE modalidad SET concepto='$concepto' WHERE id_modalidad='$id' ")or die("no se pudo realizar la consulta");

if($guardar){
?>		
<script type="text/javascript">
	alert("Se Guardo Correctamente");
	document.location.href=("listado_modalidad.php");
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