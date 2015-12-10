<?php session_start();
if($_SESSION['estatus']==1){
include("../../Scripts/conexion.php");
$id=$_POST['id'];

	$elimina=mysql_query("DELETE FROM usuarios WHERE id_usuario='$id' ")or die("No se pudo eliminar");

if($elimina){ ?>

<script type="text/javascript">
	alert("El Usuario Fue Eliminado Correctamente ");
	document.location.href=("usuarios.php");
</script>

<?php } 


}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../../index.html? var=0");
	</script>
<?php } ?>