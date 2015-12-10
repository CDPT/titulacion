<?php 	session_start();
 if($_SESSION['estatus']=='1'){

include("../../../Scripts/conexion.php");

$con=filter_var($_POST['concepto'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$concepto=$con;


//$concepto=$_POST['concepto'];

$guardar=mysql_query("INSERT INTO modalidad (concepto, estado) VALUES('$concepto' , '1') ")or die("no se pudo realizar la consulta");

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