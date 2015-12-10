<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");
print $id=$_GET['id'];

$abr=filter_var($_POST['abreviatura'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
$com=filter_var($_POST['completo'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

print $abreviatura=strtoupper($abr);
print $completo=$com;
/*
print $abreviatura=strtoupper($_POST['abreviatura']);
print $completo=$_POST['completo'];
*/



$editar=mysql_query("UPDATE licenciaturas SET abreviatura='$abreviatura' , completo='$completo' WHERE id_licenciatura='$id'")or die("no se pudo realizar la consulta");

if($editar){
?>		
<script type="text/javascript">
	document.location.href=("listado_licenciaturas.php");
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