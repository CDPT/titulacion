<?php 	
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Angel Antonio Contreras Moctezuma">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<?php $sistema="CAT"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>


    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

	<script type="text/javascript">
		function clicksalir() {
			var confirma=confirm("¿Seguro que desea salir del Sistema?");

			if(confirma==true){
				document.location.href=("<?php print $ruta; ?>/Scripts/cerrar_sesion.php?sistema=<?php print $sistema; ?>");
			}else{ 
			}

		}
	</script>
	



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
?>

<script>



function ocultarColumna(num,ver) {
  dis= ver ? '' : 'none';
  fila=document.getElementById('tabla').getElementsByTagName('tr');
  for(i=0;i<fila.length;i++)
    fila[i].getElementsByTagName('td')[num].style.display=dis;
}

</script>



	<style type="text/css">
		#op9{
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
			            	<label class="bienvenida"><?php print "Bienvenido Administrador: ".$_SESSION['nick']; ?></label>
							<a class="salir" onClick="clicksalir()" >Salir</a> 
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

<style type="text/css">



#result_pagado{
  background:#4ce71c;
}

#result_deudor{
  background:#f41b20;
  color: #fff;
}


</style>

<!--/* pestañas */-->


		<section id="engloba_cuerpo">
			<section id="cuerpo">




<?php

$periodo=$_POST['periodo'];

?>



				<form id="regresar" method="post" action="index.php">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>

<section id="titformulintro">
  Relación por Periodos 
</section>
<table border="1">
	<tr>
		<td><b>No.</b></td>
		<td><b>Matricula</b></td>
		<td><b>Nombre</b></td>
		<td><b>Programa Educativo</b></td>
		<td><b>Director</b></td>
		<td><b>Titulo del Trabajo</b></td>
		<td><b>Modalidad</b></td>
	</tr>
	<?php
	if($periodo==""){
		$consula_matricula=mysql_query("SELECT * FROM formulario_cat inner join formulario on formulario_cat.matricula=formulario.matricula inner join alumno on alumno.matricula=formulario_cat.matricula order by carrera,apepat");
	}else{
		$consula_matricula=mysql_query("SELECT * FROM alumno inner join formulario on alumno.matricula=formulario.matricula inner join formulario_cat on alumno.matricula=formulario_cat.matricula WHERE formulario.periodo_tit='$periodo' order by carrera,apepat");
	}
$i=1;
while($filamat=mysql_fetch_array($consula_matricula)){
$matricula=$filamat['matricula'];
$grup=$filamat['grupo'];
$direct=$filamat['director'];
$nomtrab=$filamat['titulotrab'];
$modalida=$filamat['modalidad'];

	$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_alumno);
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
$carrer=$fila['carrera'];
$numregistro= mysql_num_rows($consula_matricula);

	$consula_director=mysql_query("SELECT * from profesor where no_personal='$direct'");

$filadir=mysql_fetch_array($consula_director);
$nombredir=$filadir['nombre'];
$apepatdir=$filadir['apellido_paterno'];
$apematdir=$filadir['apellido_materno'];
?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $matricula; ?></td>
		<td><?php echo $apepat." ".$apemat." ".$nombre; ?></td>
		<td><?php echo $carrer; ?></td>
		<td><?php echo $apepatdir." ".$apematdir." ".$nombredir; ?></td>
		<td><?php echo $nomtrab; ?></td>
		<td><?php echo $modalida; ?></td>
	</tr>

<?php $i=$i+1; } ?>
</table>
		<br>	
<?php if($numregistro){?>
			<p align="right"><a href="lista.php?periodo=<?php echo $periodo;?>" target="_blank"><legend class="legendform">Imprimir Lista</legend></a></p>
<?php } ?>

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

<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>



	<script type="text/javascript">
		document.location.href=("../index.php? var=0");
	</script>
<?php } ?>
</html>
