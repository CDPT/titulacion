<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");
 $id=$_POST['id'];
 $concepto=$_POST['concepto'];
 $monto=$_POST['monto'];

$editar=mysql_query("UPDATE cuotas SET concepto='$concepto' , monto='$monto' WHERE id_cuota='$id'")or die("no se pudo realizar la consulta");

if($editar){
?>		
<script type="text/javascript">
	document.location.href=("listado_cuotas.php");
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