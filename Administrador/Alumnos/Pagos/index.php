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

<script type="text/javascript">
$(document).ready(function(){
    
    $("#legend1").click(function(){
        $("#formuldatos").slideToggle(900);
    });

  $("#legend2").click(function(){
        $("#formuldatos2").slideToggle(900);
    });

});

</script>

<?php
include("../../../Scripts/conexion.php");
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
<?php
	$matricula=$_REQUEST['matricula'];

	$consulta_matricula="SELECT * FROM formulario_cat WHERE matricula='$matricula'";
	$compara_matricula=mysql_query($consulta_matricula) or die ("no se pudo");
	$cons=mysql_num_rows($compara_matricula);
	while($filaformul=mysql_fetch_array($compara_matricula)){
		$monto=$filaformul['montotot'];
	}



	$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");
	$fila=mysql_fetch_array($consula_alumno);
	$matricula=$fila['matricula'];
	$matinterna=$fila['matricula_interna'];
	$nombre=$fila['nombre'];
	$apepat=$fila['apepat'];
	$apemat=$fila['apemat'];
?>
<style type="text/css">
#engloba_pestana{
  width:60px;
  height:50px;
  position: fixed;
  background:#a8bcfe;
  color: #fff;
  margin-top:150px;
  box-shadow: 1px 5px 5px #a4a5a6;
  text-align:center;
  border-radius: 0px 5px 5px 0px;
  padding: 5px 0px 5px 0px;
}
#engloba_pes{
  width:60px;
  height:50px;
  position: fixed;
  background:#a8bcfe;
  color: #fff;
  margin-top:220px;
  box-shadow: 1px 5px 5px #a4a5a6;
  text-align:center;
  border-radius: 0px 5px 5px 0px;
  padding: 5px 0px 5px 0px;
}
</style>

<!--/* pestañas */-->
<form method="post" action="formato_genera_pago.php">
	<input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
  <section id="engloba_pestana">
    <input type="image" src="../../../Imagenes/contabilidad/agregapago.png" title="Pago de Servicio CAT">
  </section>
</form>


		<section id="engloba_cuerpo">
			<section id="cuerpo">
<!--
				<form id="regresar" method="post" action="../panel_alumno.php? matricula=<?php print $matricula;?> & nombre=<?php print $nombre;?> & apepat=<?php print $apepat;?> & apemat=<?php print $apemat;?>">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>
-->

<form method="post" id="regresar" action="../panel_alumno.php">
  <input type="hidden" value="<?php print $matricula; ?>" name="matricula">
  <input type="hidden" value="<?php print $nombre; ?>" name="nombre">
  <input type="hidden" value="<?php print $apepat; ?>" name="apepat">
  <input type="hidden" value="<?php print $apemat; ?>" name="apemat">
  <input type="hidden" value="<?php print $carrera; ?>" name="carrera">

  <input type="image" src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
</form>

					<section id="titformulintro">
					 ADMINISTRACIÓN DE PAGOS
					</section>



			<?php

				
				$consulta_pago="SELECT * FROM pagos WHERE matricula='$matricula' order by fecha";
				$rconsulta_pago= mysql_query($consulta_pago) or die("No se puede ejecutar consulta");

				$consulta="SELECT * FROM pagos WHERE matricula='$matricula'";
				$rconsu= mysql_query($consulta) or die("No se puede ejecutar consulta");

				$consulta_alumno="SELECT nombre, apepat, apemat FROM alumno WHERE matricula='$matricula'";
				$rconsulta_alumno= mysql_query($consulta_alumno) or die("No se puede ejecutar consulta");
					{
				$fila= mysql_fetch_array($rconsulta_alumno);
				$nombre= $fila['nombre'];
				$apepat= $fila['apepat'];
				$apemat= $fila['apemat'];
				$valor=$nombre." ".$apepat." ".$apemat;
					}



				!@$total==0;
				$paquete=$monto;
				$sinodal=400;
			?>


			<section id="formulario_datos">
			<h3><?php echo $valor ?></h3><br>
			<input name="matricula" type="hidden" value="<?php echo $matricula?>">

					<fieldset id="fieldset_datos">
						<legend  id="legend1" class="legendform"><b>Administración de Pagos</b></legend>
							<form id="formuldatos" name="formuldatos" method="post" action="" >

							  <table class="tabla_form">
							    <tr>
							      <td width="263" height="30"><div align="left"><strong>Paquete CAT</strong></div></td>
							      <td width="119"><div align="center"><strong>$ <?php echo number_format($paquete,2);?></strong></div></td>
							    </tr>
							    <tr>
							      <td width="263" height="30"><div align="left"><strong>Pago Sinodales</strong></div></td>
							      <td width="119"><div align="center"><strong>$ <?php echo number_format($sinodal,2);?></strong></div></td>
							    </tr>
							    <tr>
							      <td><div align="left">Pagos </div></td>
							      <td><div align="center">$ 
							        <?php
								while($fila= mysql_fetch_array($rconsu)){
									$importe=$fila['monto_pago'];
									!@$total=$total+$importe;
									} echo number_format($total,2);?>
							      </div></td>
							    </tr>
							    <tr>
							      <td><div align="left">Adeudo</div></td>
							      <td><div align="center">
							        <?php !@$falta= ($paquete+$sinodal)-$total;if ($falta>0){echo  '<font color="red">$ '.number_format($falta,2).'</font>';}
									if ($falta<0){echo  '<font color="blue">$ '.number_format($falta,2).'</font>';}if ($falta==0){echo  '<font color="green">$ '.number_format($falta,2).'</font>';}?>
							      </div></td>
							    </tr>
							  </table>
							</form> 




								<?php
								   $avance= $total * 100 /  ($paquete+$sinodal);
								   
								 ?>
										<style type="text/css">
										.barra{
											border:1px solid #71767d;
											width:402px;
											height:32px;
											border-radius:10px;
											text-align:center;
											margin-top:30px;
											margin-bottom:30px;
											background:#aab1bb;
										}

										.avance{
											background:#72cf4a;
											margin-left:0px;
											border-radius:10px;
											height:30px;
											border:1px solid #4c8932;

										}
										.porcen{
											padding: 5px 0px 0px 0px;
											color: #485c3f;
											font-size:19px;	
											margin-top:10px;
											position: relative;
										}

										</style>
										Progreso en %
										<section class="barra">
											<?php if($paquete==""){ ?>
												<section class="avance"  style="width:0%;" >	
													<label class="porcen"><?php print number_format($avance,2)." %"; ?></label>
												</section>
											<?php }else{ ?>
												<section class="avance"  style="width:<?php print $avance; ?>%;" >	
													<label class="porcen"><?php print number_format($avance,2)." %"; ?></label>
												</section>
											<?php } ?>

										</section>



							</fieldset>
					</section>




					<fieldset id="fieldset_datos">
						<legend id="legend2" class="legendform"><b>Detalles de Pagos</b></legend>
							<form id="formuldatos2" name="formuldatos" method="post" action="" >

								 <table class="tabla_form">
							    <tr>
							      <td class="titbuscar"><div align="center"><strong>Recibo No.</strong></div></td>
							      <td class="titbuscar"><div align="center"><strong>Fecha de Pago</strong></div></td>
							      <td class="titbuscar"><div align="center"><strong>Importe</strong></div></td>
							      <td></td>
							    </tr>
							    <?php
								while($filaconsulta= mysql_fetch_array($rconsulta_pago)){
									$id_pago=$filaconsulta['id_pago'];
									$fecha=$filaconsulta['fecha'];
									$importe=$filaconsulta['monto_pago'];
								?>
							    <tr>
							      <td class="celdaform"><div align="center"><?php echo $id_pago ?></div></td>
							      <td class="celdaform"><div align="center"><?php echo $fecha ?></div></td>
							      <td class="celdaform"><div align="center">$ <?php echo number_format($importe,2); ?></div></td>
							      <td>

							      	<form method="post" action="elimina.php">
							      		  <input type="hidden" value="<?php print $matricula; ?>" name="matricula">
							      		  <input type="hidden" value="<?php print $id_pago; ?>" name="id_pago">
									<!--<a href="elimina.php?id_pago=<?php print $id_pago; ?>&matricula=<?php print $matricula; ?>">-->
										<input type="image" src="../../../Imagenes/alumnos/trash.png" title="Eliminar">
									<!--</a>-->
									</form>

							      </td>
							    </tr>
							    <?php
								}
								?>
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