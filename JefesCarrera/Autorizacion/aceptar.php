<?php session_start(); if($_SESSION['estatus']=='1'){
error_reporting(0);
include("../../Scripts/conexion.php");
$matricula=$_REQUEST['matricula'];
$puesto=$_REQUEST['puesto'];
$noper=$_REQUEST['noper'];

switch ($puesto) {
	case 'Director':
		$consulta1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where formulario.director='$noper' and formulario.periodo_tit='$periodo' and formulario_er.submodalidad='Trabajo'") or die (mysql_error());
			$cuentadir=mysql_result($consulta1, 0);
		$consultatot=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$noper' or formulario.sinprop1='$noper' or formulario.sinprop2='$noper') and formulario.periodo_tit='$periodo' and formulario_er.submodalidad='Trabajo'") or die (mysql_error());
			$cuentatot=mysql_result($consultatot, 0);
		//OBETENER LO MAXIMOS PERMITIDOS
		$conmaxdir=mysql_query("SELECT * FROM maximo WHERE institucion='JEFE' AND nombre='Director'");
		$fila=mysql_fetch_array($conmaxdir);
		$maxdir=$fila['maximo'];
		$conmaxtot=mysql_query("SELECT * FROM maximo WHERE institucion='JEFE' AND nombre='Total'");
		$fil=mysql_fetch_array($conmaxtot);
		$maxtot=$fil['maximo'];
		//-----------------------
		if($cuentadir<=$maxdir && $cuentatot<=$maxtot ){
			$consulta="UPDATE formulario SET director='$noper' WHERE matricula='$matricula'";
		}else{
			$consulta="UPDATE formulario SET director='rechazado' WHERE matricula='$matricula'";?>
			<script type="text/javascript">
				alert("Profesor Rechazado por limite alumnos permitidos");
				document.location.href=('index.php');
			</script>
		<?php 
		}
		break;
	case 'Sinodal Propietario 1':
			$consulta1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.sinprop1='$noper' or formulario.sinprop2='$noper') and formulario.periodo_tit='$periodo' and formulario_er.submodalidad='Trabajo'") or die (mysql_error());
				$cuentadir=mysql_result($consulta1, 0);
			$consultatot=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$noper' or formulario.sinprop1='$noper' or formulario.sinprop2='$noper') and formulario.periodo_tit='$periodo' and formulario_er.submodalidad='Trabajo'") or die (mysql_error());
				$cuentatot=mysql_result($consultatot, 0);
			//OBETENER LO MAXIMOS PERMITIDOS
			$conmaxdir=mysql_query("SELECT * FROM maximo WHERE institucion='JEFE' AND nombre='Sinodal'");
			$fila=mysql_fetch_array($conmaxdir);
			$maxdir=$fila['maximo'];
			$conmaxtot=mysql_query("SELECT * FROM maximo WHERE institucion='JEFE' AND nombre='Total'");
			$fil=mysql_fetch_array($conmaxtot);
			$maxtot=$fil['maximo'];
			//-----------------------
			if($cuentadir<=$maxdir && $cuentatot<=$maxtot ){
				$consulta="UPDATE formulario SET sinprop1='$noper' WHERE matricula='$matricula'";
			}else{
				$consulta="UPDATE formulario SET sinprop1='rechazado' WHERE matricula='$matricula'";?>
				<script type="text/javascript">
					alert("Profesor Rechazado por limite alumnos permitidos");
					document.location.href=('index.php');
				</script>
		<?php 
			}
		break;
	case 'Sinodal Propietario 2':
			$consulta1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.sinprop1='$noper' or formulario.sinprop2='$noper') and formulario.periodo_tit='$periodo' and formulario_er.submodalidad='Trabajo'") or die (mysql_error());
				$cuentadir=mysql_result($consulta1, 0);
			$consultatot=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$noper' or formulario.sinprop1='$noper' or formulario.sinprop2='$noper') and formulario.periodo_tit='$periodo' and formulario_er.submodalidad='Trabajo'") or die (mysql_error());
				$cuentatot=mysql_result($consultatot, 0);
			//OBETENER LO MAXIMOS PERMITIDOS
			$conmaxdir=mysql_query("SELECT * FROM maximo WHERE institucion='JEFE' AND nombre='Sinodal'");
			$fila=mysql_fetch_array($conmaxdir);
			$maxdir=$fila['maximo'];
			$conmaxtot=mysql_query("SELECT * FROM maximo WHERE institucion='JEFE' AND nombre='Total'");
			$fil=mysql_fetch_array($conmaxtot);
			$maxtot=$fil['maximo'];
			//-----------------------
			if($cuentadir<=$maxdir && $cuentatot<=$maxtot ){
				$consulta="UPDATE formulario SET sinprop2='$noper' WHERE matricula='$matricula'";
			}else{
				$consulta="UPDATE formulario SET sinprop2='rechazado' WHERE matricula='$matricula'";?>
				<script type="text/javascript">
					alert("Profesor Rechazado por limite alumnos permitidos");
					document.location.href=('index.php');
				</script>
		<?php }
		break;
	case 'Sinodal Suplente 1':
		$consulta="UPDATE formulario SET sinsup1='$noper' WHERE matricula='$matricula'";
		break;
	case 'Sinodal Suplente 2':
		$consulta="UPDATE formulario SET sinsup2='$noper' WHERE matricula='$matricula'";
		break;
		default:
		echo "puesto mal";
		break;
}
$consu=mysql_query($consulta) or die (mysql_error());
?>
<script type="text/javascript">
alert("Profesor autorizado");
document.location.href=('index.php');
</script>
<?php
}else{ session_destroy(); ?>
	<script type="text/javascript">
		document.location.href=("../cat.html");
	</script>
<?php } ?>