<?php 	
	session_start();
	error_reporting(0);
	header('Content-Type: text/html; charset=UTF-8');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Angel Antonio Contreras Moctezuma">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">

	<?php $sistema="CAT"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../../Scripts/FuncionesjQuery.js"></script>



    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

	<script type="text/javascript">
		function clicksalir() {
			var confirma=confirm("¿Seguro que desea salir del Sistema?");

			if(confirma==true){
				document.location.href=("../../../Scripts/cerrar_sesion.php");
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
			              	<?php include ('../../../Includes/salir.php'); ?>
						</aside>
					</asid>

			</header>

		<nav id="global_menu">
			<nav id="marco_menu">
				<ul>
					<?php include ("../../../Menus/menu_usuarios.php"); ?>
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
$grupo=$_POST['grupo'];

?>



				<form id="regresar" method="post" action="index.php">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>

<section id="titformulintro">
  Reportes Deudores
</section>
<table border="1">
	<tr>
		<td>No.</td>
		<td>Nombre</td>
		<td>Programa Educativo</td>
		<td>Deuda</td>
	</tr>
	<?php
	/*if ($periodo="" && $grupo=="") {
		$consula_matricula=mysql_query("SELECT * FROM formulario") or die ("No se puede consultar la matricula");
	}else{
		if($periodo==""){
			$consula_matricula=mysql_query("SELECT * FROM formulario_cat WHERE grupo='$grupo' ") or die ("No se puede consultar la matricula");
		}else{
			if($grupo==""){
			$consula_matricula=mysql_query("SELECT * FROM formulario WHERE periodo_tit='$periodo'") or die ("No se puede consultar la matricula");
			}else{
				$consula_matricula=mysql_query("SELECT * FROM formulario_cat inner join formulario on formulario.matricula=formulario_cat.matricula where formulario_cat.grupo='$grupo' and formulario.periodo_tit='$periodo'") or die ("No se puede consultar la matricula");
				//$consula_matricula=mysql_query("SELECT * FROM formulario, formulario_cat WHERE formulario.periodo_tit='$periodo' and formulario_cat.grupo='$grupo' ") or die ("No se puede consultar la matricula");
			}
		}
	}*/
	if ($periodo==0 && $grupo==0) {
		$consula_matricula=mysql_query("SELECT * FROM formulario_cat inner join alumno on formulario_cat.matricula=alumno.matricula order by apepat") or die ("No se puede consultar la matricula 1");
	}else{
		if($periodo==0){
			$consula_matricula=mysql_query("SELECT * FROM formulario_cat inner join alumno on formulario_cat.matricula=alumno.matricula where formulario_cat.grupo='$grupo' order by apepat") or die ("No se puede consultar la matricula 2");
		}else{
			if($grupo==0){
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where formulario.periodo_tit='$periodo' order by apepat") or die ("No se puede consultar la matricula 3");
			$con=3;
			}else{
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where formulario.periodo_tit='$periodo' and formulario_cat.grupo='$grupo'") or die ("No se puede consultar la matricula 4");
			$con=4;
			}
		}
	}

$i=1;
while($filamat=mysql_fetch_array($consula_matricula)){
$matricula=$filamat['matricula'];
$montototal=$filamat['montotot'];
if ($con==3) {
	$consu=mysql_query("SELECT * FROM formulario_cat where matricula='$matricula'") or die(mysql_error());
	$fi=mysql_fetch_array($consu);
	$montototal=$fi['montotot'];
}
$sinodal=400;
$consulta78=mysql_query("SELECT * FROM pagos_cat WHERE matricula='$matricula'") or die("No se puede ejecutar consulta");
                            $total=0;
                            while($fila78= mysql_fetch_array($consulta78)){
                                 $importe=$fila78['monto_pago'];
                                 $total=$total+$importe;
                                }
                                $tot=$montototal+$sinodal;
                                $deve=$tot-$total;
if($deve>0){
	$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_alumno);
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
$carrera=$fila['carrera'];
$nomcom=$apepat." ".$apemat." ".$nombre;
$min=strtoupper($nomcom);
$numregistro= mysql_num_rows($consula_matricula);
?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $min; ?></td>
		<td><?php echo $carrera; ?></td>
		<td><?php echo "$ ".number_format($deve,2); ?></td>
	</tr>

<?php $i=$i+1; } }?>
</table>
<br>
	<?php if($numregistro){?>
			<p align="right"><a href="lista.php?periodo=<?php echo $periodo;?>&grupo=<?php echo $grupo;?>" target="_blank"><legend class="legendform">Imprimir Lista</legend></a></p>

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
		document.location.href=("../../../index.html? var=0");
	</script>
<?php } ?>
</html>
