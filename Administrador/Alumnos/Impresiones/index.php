<?php 	
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	
	<?php $sistema="CAT"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../../Scripts/FuncionesjQuery.js"></script>



    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

</style>



<script src="../../../Scripts/ajax.js" language="javascript"></script>
<script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../../../Scripts/jconfirmaction.jquery.js">
</script>
      <script type="text/javascript">	
	  /* preguntar si desea eliminarlo  */	
			$(document).ready(function() {
				$('.ask-custom').jConfirmAction({question : "¿Dese   Eliminarlo?", yesAnswer : "Si", cancelAnswer : "Cancelar"});
				$('.ask').jConfirmAction();
			});	
		</script>

<?php

include("../../../Scripts/conexion.php");
$consul="SELECT * FROM alumno INNER JOIN formulario ON alumno.matricula=formulario.matricula";
$resul=mysql_query($consul)or die ("no se pudo realizar la consulta");
$numregistro=mysql_num_rows($resul);

?>





	<style type="text/css">
		#op2{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
		}


		#regresar{
		  float: left;
		}

	.borde{
			border: 1px solid #00ab4f;
			padding: 5px 10px 0px 10px;
			border-radius:5px 5px 0px 0px;
		}

		table{
			text-align:center;
		}

		td{
			padding: 0px 30px 0px 30px;
		}

		a{
			text-decoration:none;
		}

		.subtit{
			width:auto;
			height:auto;
			background:#005baa;
			color: #fff;
			border-radius:5px 5px 5px 5px;
			
			box-shadow:0px 0px 6px 2px #83aed3;
		}

		#regresar{
			float:left;
		}

		.cuadro{
			
			padding: 0px 0px 40px 0px;
		}
	</style>


</head>

<?php
		if($_SESSION['estatus']==1){	
?>
<body  oncontextmenu="return false">

	<section id="global">

		<header id="baner">
			<?php include ("../../../Includes/header.php"); ?> 

			        <aside id="engloba_notificacion">
			            <aside id="notificaciones">
			            		<?php include ('../../../Includes/salir.php'); ?>
						</aside>
					</asid>

			</header>

		<nav id="global_menu">
			<nav id="marco_menu">
				<ul>
					<?php include ("../../../Menus/menu_administrador.php"); ?>
				</ul>
			</nav>
		</nav>


		<section id="engloba_cuerpo">
			<section id="cuerpo">


<?php

$matricula=$_REQUEST['matricula'];

$consulta_matricula="SELECT * FROM formulario WHERE matricula='$matricula'";
$compara_matricula=mysql_query($consulta_matricula) or die ("no se pudo");
$fila=mysql_fetch_array($compara_matricula);
$director=$fila['director'];

$consulta_grupo="SELECT * FROM formulario_cat WHERE matricula='$matricula'";
$compara_grupo=mysql_query($consulta_grupo) or die ("no se pudo");
$filagru=mysql_fetch_array($compara_grupo);
$grupo=$filagru['grupo'];

$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_alumno);
$matricula=$fila['matricula'];
$matricula_interna=$fila['matricula_interna'];
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
$carrera=$fila['carrera'];
$calle=$fila['calle'];
$no_externo=$fila['no_externo'];
$colonia=$fila['colonia'];
$ciudad=$fila['ciudad'];
$codigo_postal=$fila['codigo_postal'];
$tel_emergencia=$fila['tel_emergencia'];
$celular=$fila['celular'];
$correo=$fila['correo'];
$consula_dir=mysql_query("SELECT * FROM profesor WHERE no_personal='$director' ");

$filadir=mysql_fetch_array($consula_dir);
$nombredir=$filadir['nombre'];
$apellido_paterno=$filadir['apellido_paterno'];
$apellido_materno=$filadir['apellido_materno'];
$director=$nombredir." ".$apellido_paterno." ".$apellido_materno;
?>


<form id="regresar" method="post" action="../panel_alumno.php">
<!--<form id="regresar" method="post" action="../panel_alumno.php? matricula=<?php print $matricula;?> & nombre=<?php print $nombre;?> & apepat=<?php print $apepat;?> & apemat=<?php print $apemat;?>">-->
	  <input type="hidden" value="<?php print $matricula; ?>" name="matricula">
  <input type="hidden" value="<?php print $nombre; ?>" name="nombre">
  <input type="hidden" value="<?php print $apepat; ?>" name="apepat">
  <input type="hidden" value="<?php print $apemat; ?>" name="apemat">			
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
</form>

<section id="titformulintro">
  FOMATOS PARA IMPRESION
</section>








<table>

	<tr>

		<td class="cuadro"> 
			<a href="../../../pdf/datos.php? matricula=<?php print $matricula; ?> & matricula_interna=<?php print $matricula_interna; ?> & nombre=<?php print $nombre; ?> & apepat=<?php print $apepat; ?> & apemat=<?php print $apemat; ?> & carrera=<?php echo $carrera;?> & calle=<?php print $calle; ?> & no_externo=<?php print $no_externo; ?> & colonia=<?php print $colonia; ?> & ciudad=<?php print $ciudad; ?> & codigo_postal=<?php print $codigo_postal; ?> & tel_emergencia=<?php print $tel_emergencia; ?> & celular=<?php print $celular; ?> & correo=<?php print $correo; ?> & grupo=<?php print $grupo;?> & director=<?php echo $director;?>" target="_blank">
				<section class="borde">
					<img src="../../../Imagenes/alumnos/impresora3.png" alt="" width="125" height="125"/>
				</section>
				<section class="subtit">Formatos de Inscripción</section>
			</a>
		</td>
	</tr>
<?php 
	if($matricula<S03000000){
		?>
		
<tr>
		<td class="cuadro">
			<a href="../../../pdf/solicitud_ins.php? matricula=<?php print $matricula; ?> & nombre=<?php print $nombre; ?> & apepat=<?php print $apepat; ?> & apemat=<?php print $apemat; ?> & carrera=<?php print $carrera; ?>" target="_blank">
				<section class="borde">
			   		<img src="../../../Imagenes/alumnos/impresora.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit">Formato de Anexo de Documento</section>
		   	</a>
		</td>
	</tr>

	<?php
		}
	?>

</table>

				


			</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
<?php include ('../../../Includes/pie_pagina.php'); ?>	
</footer>

</body>
<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../../../index.html? var=0");
	</script>
<?php } ?>
</html>
