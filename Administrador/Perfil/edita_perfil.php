<?php 	session_start();
 if($_SESSION['estatus']=='1'){

include("../../Scripts/conexion.php");

				$id=$_POST['id'];
				//$usuario=$_REQUEST['usuario'];
				//$password=$_REQUEST['password'];
				//$nombre=$_REQUEST['nombre'];
				$ni=filter_var($_POST['nick'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
				//$nick=$_POST['nick'];
				$nick=$ni;
	/*
$edita=mysql_query("UPDATE usuarios_cat 
				     SET  usuario='$usuario', password='$password', nombre='$nombre', nick='$nick'
				     WHERE id_usuario='$id' ")or die("No se puedo editar");*/

$edita=mysql_query("UPDATE usuarios
				     SET nick='$nick'
				     WHERE id_usuario='$id' ")or die("No se puedo editar");

if($edita){ ?>
<script type="text/javascript">
	alert("Tu Perfil Se Guardo Correctamente");
	//document.location.href=("perfil.php");
</script>
<?php }else{ ?>
<script type="text/javascript">
	alert("Ocurrio un error Comuniquese con el Administrador Por Favor");
	//document.location.href=("perfil.php");
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