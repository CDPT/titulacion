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

	<link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<?php $sistema="CAT"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../../Scripts/FuncionesjQuery.js"></script>




    <script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
    <SCRIPT language=Javascript>
<!--
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}
//-->
</SCRIPT>
    
	<style type="text/css">
		#op4{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
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
		fieldset{
			border:3px solid #00ab4f;
	width:500px;
	box-shadow: 0 5px 7px 1px #c0e2d0;
	border-radius: 5px 5px 5px 5px;
	margin-bottom:100px;
		}
		.legendform{
	font-weight: bold;
	background:#005baa;
	color: #fff;
	border-radius:5px 5px 5px 5px;
	padding: 5px 10px 5px 10px;
	margin-left:20px;
	box-shadow: 0 5px 7px 1px #9dcaf1;
	border:3px solid #044f91;
	cursor: pointer;
}
.titform{
	text-align:right;
	padding: 0px 10px 0px 0px;
	font-size:18px;
	color: #005baa;

}

.textform{
	width:300px;
	height:25px;
	text-transform:uppercase;
}
#regresar{
		  float: left;
		}
	</style>

</head>

<?php
if($_SESSION['estatus']==1){
			include("../../../Scripts/conexion.php");
		
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



		<section id="engloba_cuerpo">
<?php
$fecha = date("Y/m/d");
date_default_timezone_set('Mexico/General' ) ; 
$tiempo = getdate(time()); 
$dia = $tiempo['wday']; 
$dia_mes=$tiempo['mday']; 
$mes = $tiempo['mon']; 
$year = $tiempo['year']; 
$hora= $tiempo['hours']; 
$minutos = $tiempo['minutes']; 
$segundos = $tiempo['seconds'];

switch ($dia){ 
case "1": $dia_nombre="Lunes"; break; 
case "2": $dia_nombre="Martes"; break; 
case "3": $dia_nombre="Mi&eacute;rcoles"; break; 
case "4": $dia_nombre="Jueves"; break; 
case "5": $dia_nombre="Viernes"; break; 
case "6": $dia_nombre="S&aacute;bado"; break; 
case "0": $dia_nombre="Domingo"; break; 
} 

switch($mes){ 
case "1": $mes_nombre="Enero"; break; 
case "2": $mes_nombre="Febrero"; break; 
case "3": $mes_nombre="Marzo"; break; 
case "4": $mes_nombre="Abril"; break; 
case "5": $mes_nombre="Mayo"; break; 
case "6": $mes_nombre="Junio"; break; 
case "7": $mes_nombre="Julio"; break; 
case "8": $mes_nombre="Agosto"; break; 
case "9": $mes_nombre="Septiembre"; break; 
case "10": $mes_nombre="Octubre"; break; 
case "11": $mes_nombre="Noviembre"; break; 
case "12": $mes_nombre="Diciembre"; break; 
} 

//pendiente consulta de fecha del curso

?>
			<section id="cuerpo">
            <form id="regresar" method="post" action="../index.php">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>
<fieldset>
<legend class="legendform">Reposición de Gastos</legend><br>
<form action="guardar.php" method="post">
	<input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
<table border="0" cellspacing="30px">
	<tr>
		<td class="titform">Fecha:</td>
        <td style="font-size:16px; color: #005baa;"><?php echo $dia_nombre.", ".$dia_mes." de ".$mes_nombre." de ".$year?></td>
	</tr>
    <tr>
		<td class="titform">Nombre:</td>
        <td><input class="textform" type="text" name="nombre" maxlength="30" autofocus required></td>
	</tr>
    <tr>
		<td class="titform">Concepto:</td>
        <td><input type="text" class="textform" name="concepto" maxlength="30" style="color:#005baa;" required></td>
	</tr>
    <tr>
		<td class="titform">Importe:</td>
        <td><input class="textform" type="text" name="importe" maxlength="10" onkeyUp="return ValNumero(this);" required></td>
	</tr>
    <tr>
		<td colspan="2" align="center"><input src="../../../Imagenes/disquete-icono-9411-32.png" type="image"/></td>
	</tr>
</table>
</form>

</fieldset>



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
