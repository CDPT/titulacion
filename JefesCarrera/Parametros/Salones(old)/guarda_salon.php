<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");

$sal=filter_var($_POST['salon'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
//$salon=$_POST['salon'];
$salon=$sal;


$guardar=mysql_query("INSERT INTO cat_salon (no_salon, estado) VALUES('$salon' , '1') ")or die("no se pudo realizar la consulta");

if($guardar){
?>		
<script type="text/javascript">
	alert("Se Guardo Correctamente");
	document.location.href=("listado_salones.php");
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