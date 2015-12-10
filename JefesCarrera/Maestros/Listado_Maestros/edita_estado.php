<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");

$id=$_POST['id'];
$estado=$_POST['estado'];

switch ($estado) {
	case '1':
		$edita_estado=mysql_query("UPDATE profesor SET activo='0' WHERE no_personal='$id' ") or die("No se Pudo realizar la consulta ");
			if($edita_estado){
		?>
		<script type="text/javascript">
			document.location.href=("index.php");
		</script>
		<?php
			}
		break;


	case '0':
		$edita_estado=mysql_query("UPDATE profesor SET activo='1' WHERE no_personal='$id' ") or die("No se Pudo realizar la consulta ");
			if($edita_estado){
		?>
		<script type="text/javascript">
			document.location.href=("index.php");
		</script>
		<?php
			}
		break;		
	
	default:
		# code...
		break;
} ?>

<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../../index.html? var=0");
	</script>
<?php }  ?>