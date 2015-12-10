<?php 	session_start();
 if($_SESSION['estatus']=='1'){

include("../../../Scripts/conexion.php");
$concepto=$_POST['concepto'];
$monto=$_POST['monto'];

$guardar=mysql_query("INSERT INTO cuotas (concepto, monto, estado) VALUES('$concepto' , '$monto', '1') ")or die("no se pudo realizar la consulta");

if($guardar){
?>		
<script type="text/javascript">
	alert("Se Guardo Correctamente");
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