<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");

$abr=filter_var($_POST['abreviatura'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$com=filter_var($_POST['completo'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

$abreviatura=strtoupper($abr);
$completo=$com;

/*
$abreviatura=strtoupper($_POST['abreviatura']);
$completo=$_POST['completo'];
*/

$guardar=mysql_query("INSERT INTO licenciaturas (abreviatura, completo, estado) VALUES('$abreviatura' , '$completo', '1') ")or die("no se pudo realizar la consulta");

if($guardar){
?>		
<script type="text/javascript">
	alert("Se Guardo Correctamente");
	document.location.href=("listado_licenciaturas.php");
</script>
<?php
}
?>

<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../../index.html? var=0");
	</script>
<?php }  ?>