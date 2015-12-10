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





    <script language="javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="../../../Scripts/jquery-ui.min.js"></script>
    
    <script type="text/javascript">
$(document).ready(function(){
    
    $("#legend1").click(function(){
        $("#formuldatos").slideToggle(900);
    });

  $("#legend2").click(function(){
        $("#formuldatos2").slideToggle(900);
    });

  $("#legend3").click(function(){
        $("#formuldatos3").slideToggle(900);
    });

});

</script>

<script language="javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="../../../Scripts/jquery-ui.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../Estilos/jquery-ui-1.7.2.custom.css" />

<link rel="stylesheet" href="../../../Scripts/calendario/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../../../Scripts/calendario/jquery-ui.js"></script>
<script type="text/javascript" src="../../../Scripts/calendario/jquery-idioma.js"></script>

  <script>

  $(function() {
    $("#inicio").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
        $("#fin").datepicker( "option","minDate",selectedDate);
      }
    });
    $("#fin").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      changeYear: true,
      onClose: function( selectedDate ) {
        $("#inicio").datepicker("option","maxDate",selectedDate);
      }
    });
  });
  </script>



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
	width:800px;
	box-shadow: 0 5px 7px 1px #c0e2d0;
	border-radius: 5px 5px 5px 5px;
	margin-bottom:50px;
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
				<?php include ("../../../Menus/menu_administrador.php"); ?>
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


?>
			<section id="cuerpo">
            <form id="regresar" method="post" action="../index.php">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>
				<h2 align="center">Estado por periodo</h2><br>
<form method="post" action="index.php">    
<input type="hidden" value="1" name="valor">            
                <p align="center">
                Fecha Inicio:  <input type="text" name="inicio" id="inicio">    
                Fecha Fin:  <input type="text" name="fin" id="fin"><br><br>
                <input type="submit" value="Consultar"> 
                </p>
                </form>
                <br>
                
       <?php
	   if(isset($_POST['valor'])){
	   $inicio=$_POST['inicio'];
	   $fin=$_POST['fin'];
?>
<fieldset>
<legend id="legend1" class="legendform">Ingresos</legend><br>
<form id="formuldatos" method="post" style="display:none" name="formuldatos" action="#" >
<table align="center" cellspacing="10" width="780">
					<th colspan="4">INGRESOS POR PAGOS DE SERVICIOS CAT</th>
                       <tr>
                        <td width="290"><strong>Nombre</strong></td>
                        <td width="100"><strong>Fecha</strong></td>
                        <td width="100"><strong>Concepto</strong></td>
                        <td width="90"><strong>Importe</strong></td>
                       </tr>
                       <?php   
					   include("../../scripts/conexion.php");
					   $consulta="select * from pagos WHERE fecha>='$inicio' AND  fecha<='$fin' order by fecha";
						$rconsulta=mysql_query($consulta) or die ("No se puede realizar la consulta");
					   while($filaconsulta=mysql_fetch_array($rconsulta)){
									$idpago=$filaconsulta['id_pago'];
									$matricula=$filaconsulta['matricula'];
									$fecha=$filaconsulta['fecha'];
									$concepto=$filaconsulta['concepto'];
									$importe=$filaconsulta['monto_pago'];
									$total=$total+$importe;
									$connombre=mysql_query("select nombre, apepat, apemat from alumno where matricula='$matricula'") or die ("No se puede realizar la consulta");
									$fila=mysql_fetch_array($connombre);{
									$nombre=$fila['nombre'];
									$apepat=$fila['apepat'];
									$apemat=$fila['apemat'];}
						?>
                        <tr>
                        <td width="290"><?php echo $nombre." ".$apepat." ".$apemat; ?></td>
                        <td width="100"><?php echo $fecha; ?></td>
                        <td width="100"><?php echo $concepto; ?></td>
                        <td width="90">$ <?php echo number_format($importe,2); ?></td>
                       </tr>
                       <?php } ?>
                       <th colspan="4">OTROS INGRESOS</th>
                       <?php
                       $rconsulta=mysql_query("select * from ingresos WHERE fecha>='$inicio' AND  fecha<='$fin' order by fecha") or die ("No se puede realizar la consulta");
					   while($filaconsulta=mysql_fetch_array($rconsulta)){
									$nombre=$filaconsulta['nombre'];
									$fecha=$filaconsulta['fecha'];
									$concepto=$filaconsulta['concepto'];
									$importe=$filaconsulta['importe'];
									$total=$total+$importe;
						?>
                        <tr>
                        <td width="290"><?php echo $nombre ?></td>
                        <td width="100"><?php echo $fecha; ?></td>
                        <td width="100"><?php echo $concepto; ?></td>
                        <td width="90">$ <?php echo number_format($importe,2); ?></td>
                       </tr>
                       <?php } ?>
                       <tr>
                       <td width="290"></td>
                       <td width="100"></td>
                    	<td align="right" width="100"><strong>TOTAL</strong></td>
                        <td width="90"><strong>$ <?php echo number_format($total,2);  ?></strong></td>
                       </tr>
                    </table>
                    </form>
       </fieldset>
       <fieldset>
       <legend id="legend2" class="legendform">Egresos</legend><br>
<form id="formuldatos2" method="post" style="display:none" name="formuldatos2" action="#" >
					<table align="center" cellspacing="10">
                       <tr>
                        <td><strong>Nombre</strong></td>
                        <td><strong>Fecha</strong></td>
                        <td><strong>Concepto</strong></td>
                        <td><strong>Importe</strong></td>
                       </tr>
                        <?php
                        $consulta="select * from egresos WHERE fecha>='$inicio' AND  fecha<='$fin' order by fecha";
						$rconsulta=mysql_query($consulta) or die ("No se puede realizar la consulta");
					   while($filaconsulta=mysql_fetch_array($rconsulta)){
									$id_egreso=$filaconsulta['id_egreso'];
									$nombre=$filaconsulta['nombre'];
									$fecha=$filaconsulta['fecha'];
									$concepto=$filaconsulta['concepto'];
									$importe=$filaconsulta['importe'];
									$to=$to+$importe;
						?>
                        <tr>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $fecha; ?></td>
                        <td><?php echo $concepto; ?></td>
                        <td>$ <?php echo number_format($importe,2); ?></td>
                       </tr>
                       <?php } ?>
                       <tr>
                    	<td colspan="3" align="right"><strong>TOTAL</strong></td>
                        <td><strong>$ <?php echo number_format($to,2);  ?></strong></td>
                       </tr>
                    </table> 
                    </form>
          </fieldset>
          <fieldset>
         <legend id="legend3" class="legendform">Resumen</legend><br>
<form id="formuldatos3" method="post" name="formuldatos3" action="#" >
                       <table align="center" cellspacing="15">
                       <tr>
                       		<td colspan="2" align="center" style="color:#00F"><h3>RESUMEN</h3></td>
                       </tr>
                       <tr>
                       		<td><strong>TOTAL DE INGRESOS</strong></td>
                            <td>$ <?php echo number_format($total,2);  ?></td>
                       </tr>
                       <tr>
                       		<td><strong>TOTAL DE EGRESOS</strong></td>
                            <td>$ <?php echo number_format($to,2); $cap=$total-$to; ?></td>
                       </tr>
                       <tr>
                       		<td><strong>CAPITAL</strong></td>
                            <td><?php if ($cap>0){echo  '<font color="blue">$'.number_format($cap,2).'</font>';}
							if ($cap<0){echo  '<font color="red">$'.number_format($cap,2).'</font>';}
							if ($cap=0){echo  '<font color="green">$'.number_format($cap,2).'</font>';}?></td>
                       </tr>
</table>
</form>
<br>
</fieldset>
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
	<script type="text/javascript">
		document.location.href=("../../../index.html? var=0");
	</script>
<?php } ?>
</html>
