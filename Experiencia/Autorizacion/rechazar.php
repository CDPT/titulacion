<?php
session_start(); if($_SESSION['estatus']=='1'){
error_reporting(0);
include("../../Scripts/conexion.php");
echo $matricula=$_REQUEST['matricula'];
echo $puesto=$_REQUEST['puesto'];
echo $noper=$_REQUEST['noper'];

switch ($puesto) {
	case 'Director':
		$consulta="UPDATE formulario SET director='rechazado' WHERE matricula='$matricula'";
		break;
	case 'Sinodal Propietario 1':
		$consulta="UPDATE formulario SET sinprop1='rechazado' WHERE matricula='$matricula'";
		break;
	case 'Sinodal Propietario 2':
		$consulta="UPDATE formulario SET sinprop2='rechazado' WHERE matricula='$matricula'";
		break;
	case 'Sinodal Suplente 1':
		$consulta="UPDATE formulario SET sinsup1='rechazado' WHERE matricula='$matricula'";
		break;
	case 'Sinodal Suplente 2':
		$consulta="UPDATE formulario SET sinsup2='rechazado' WHERE matricula='$matricula'";
		break;
		default:
		echo "puesto mal";
		break;
}
$consu=mysql_query($consulta) or die ("No se puede");
?>
<script type="text/javascript">
alert("Profesor rechazado, comunique al CAT");
document.location.href=('index.php');
</script>
<?php
}else{ session_destroy(); ?>
	<script type="text/javascript">
		document.location.href=("../cat.html");
	</script>
<?php } ?>