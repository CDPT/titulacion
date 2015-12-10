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
	<title>Contabilidad</title>
	<link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../../Imagenes/iconocat.ico" rel="shortcut icon" />


	<?php $sistema="CAT"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../../Scripts/FuncionesjQuery.js"></script>



	<script language="javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="../../../Scripts/jquery-ui.min.js"></script>


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









<link rel="stylesheet" type="text/css" href="../../Estilos/jquery-ui-1.7.2.custom.css" />

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
		.selectopcion{
	text-align:center;
	width:300px;
	height:25px;
	color: #005baa;
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
			<section id="cuerpo">
            <form id="regresar" method="post" action="index.php">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>
                
                <form method="post" action="egresos.php? valor=<?php echo "1";?>">                
                <p align="center">
                Fecha Inicio:  <input type="text" name="inicio" id="inicio">    
                Fecha Fin:  <input type="text" name="fin" id="fin"><br><br>
                Concepto:
                <select class="selectopcion" name="opcion">
                	<option></option>
                    <?php 
					include("../../scripts/conexion.php");
					   $consulta="select DISTINCT (concepto) from egresos";
						$rconsulta=mysql_query($consulta) or die ("No se puede realizar la consulta");
					   while($filaconsulta=mysql_fetch_array($rconsulta)){
									$concepto=$filaconsulta['concepto'];
					?>
                    <option value="<?php echo $concepto; ?>"><?php echo $concepto; ?></option>
                    <?php } ?>
                </select><br><br>
                <input type="submit" value="Consultar"> 
                </p>
                </form>
                <br>
                
       <?php
	   if(isset($_REQUEST['valor'])){
	   $opcion=$_POST['opcion'];
	   $inicio=$_POST['inicio'];
	   $fin=$_POST['fin'];
	   if($opcion==""){
	   		$consulta="select * FROM egresos WHERE fecha>='$inicio' AND  fecha<='$fin'";
		}else{
			if($inicio=="" && $fin==""){
					$consulta="select * from egresos where concepto='$opcion'";
			}else{
					$consulta="select * from egresos where concepto='$opcion' and fecha>='$inicio' and fecha<='$fin'";
			}
		}
	   ?>         
<fieldset>
<legend class="legendform">Egresos</legend><br>
<table border="0" cellspacing="10">
	<tr>
		<td width="220"><strong>FECHA</strong></td>
        <td width="290"><strong>NOMBRE</strong></td>
        <td width="100"><strong>GRUPO</strong></td>
        <td width="80"><strong>CONCEPTO</strong></td>
        <td width="10"><strong>IMPORTE</strong></td>
	</tr>
    <?php
    $rconsulta=mysql_query($consulta) or die ("No se puede realizar la consulta");
					   while($filaconsulta=mysql_fetch_array($rconsulta)){
						   			$fecha=$filaconsulta['fecha'];
									$nombre=$filaconsulta['nombre'];
									$grupo=$filaconsulta['grupo'];
									$concepto=$filaconsulta['concepto'];
									$importe=$filaconsulta['importe']; 
									$total=$total+$importe;
	?>
    <tr>
    	<td width="220"><?php echo $fecha; ?></td>
        <td width="290"><?php echo $nombre; ?></td>
        <td width="100"><?php echo $grupo; ?></td>
        <td width="80"><?php echo $concepto; ?></td>
        <td width="10">$ <?php echo number_format($importe,2); ?></td>
    </tr>    
    <?php } ?>
    <tr>
    	<td width="220"></td>
        <td width="290"></td>
        <td width="100"></td>
    	<td width="80" align="right"><strong>TOTAL</strong></td>
        <td width="10"><strong>$ <?php echo number_format($total,2); ?></strong></td>
    </tr>
</table>
<br>
</fieldset>

			</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
<?php include ('../../../Includes/pie_pagina.php'); ?>	
</footer>

</body>
<?php
	   }
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../../../index.html? var=0");
	</script>
<?php } ?>
</html>
