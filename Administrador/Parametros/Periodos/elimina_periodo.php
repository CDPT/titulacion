<?php 	session_start();
 if($_SESSION['estatus']=='1'){
include("../../../Scripts/conexion.php");
$id=$_POST['id'];


$elimina=mysql_query("DELETE FROM periodo WHERE id_periodo='$id'")or die('Nos e Puede Eliminar Consulte al Administrador del sistema');
?>
<script type="text/javascript">
	document.location.href=("listado_periodos.php");
</script>

<?php

}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../../index.html? var=0");
	</script>
<?php }  ?>