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
	<title>CAT</title>
	<link href="../../../Imagenes/iconocat.ico" rel="shortcut icon" />


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
		#op5{
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
				<header id="cabecera">
					<section id="imagenes">
						<section id="imagen_cat">
							<img src="../../../Imagenes/logocat.png" width="140px" height="150px">
						</section>

						<section id="titulocat">
							Centro de Apoyo a la Titulación
						</section>

			            <section id="imagen_uv">
			            	<img src="../../../Imagenes/Logouv.png" width="160px" height="150px">
			            </section>  
			        </section>

				</header>  

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
					<?php include ("menu_admin.php"); ?>
				</ul>
			</nav>
		</nav>


		<section id="engloba_cuerpo">
			<section id="cuerpo">


<?php

$matricula=$_REQUEST['matricula'];

$consulta_matricula="SELECT * FROM formulario WHERE matricula='$matricula'";
$compara_matricula=mysql_query($consulta_matricula) or die ("no se pudo");
$cons=mysql_num_rows($compara_matricula);

$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_alumno);
$matricula=$fila['matricula'];
$matinterna=$fila['matricula_interna'];
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
?>



				<form id="regresar" method="post" action="index.php? matricula=<?php print $matricula;?> & nombre=<?php print $nombre;?> & apepat=<?php print $apepat;?> & apemat=<?php print $apemat;?>">
				  <input src="../../../Imagenes/regresar.png" type="image" value="Regresar"/>
				</form>

<section id="titformulintro">
  AGREGA UN NUEVO PERIDO
</section>




</br>
<section id="formul">
 <form id="form1" name="form1" method="post" action="guardar_periodo.php">

 	<table>
 		<tr>

 			<td>
				Fecha de inicio
			</td>

			<td>
			  <select name="fechaini" id="fechaini">
			    <option value="ENERO">ENERO</option>
			    <option value="FEBRERO">FEBRERO</option>
			    <option value="MARZO">MARZO</option>
			    <option value="ABRIL">ABRIL</option>
			    <option value="MAYO">MAYO</option>
			    <option value="JUNIO">JUNIO</option>
			    <option value="JULIO">JULIO</option>
			    <option value="AGOSTO">AGOSTO</option>
			    <option value="SEPTIEMBRE">SEPTIEMBRE</option>
			    <option value="OCTUBRE">OCTUBRE</option>
			    <option value="NOVIEMBRE">NOVIEMBRE</option>
			    <option value="DICIEMBRE">DICIEMBRE</option>
			  </select>
			</td>

			<td>
			  <input type="text" name="aa" id="aa" size="5" maxlength="4" class="required" onkeyUp="return ValNumero(this);"/>	
			</td>
		</tr>
		
		<tr> 
			<td>
				Fecha  de Fin
			</td>

			<td>
			  <select name="fechafin" id="fechafin">
			    <option value="ENERO">ENERO</option>
			    <option value="FEBRERO">FEBRERO</option>
			    <option value="MARZO">MARZO</option>
			    <option value="ABRIL">ABRIL</option>
			    <option value="MAYO">MAYO</option>
			    <option value="JUNIO">JUNIO</option>
			    <option value="JULIO">JULIO</option>
			    <option value="AGOSTO">AGOSTO</option>
			    <option value="SEPTIEMBRE">SEPTIEMBRE</option>
			    <option value="OCTUBRE">OCTUBRE</option>
			    <option value="NOVIEMBRE">NOVIEMBRE</option>
			    <option value="DICIEMBRE">DICIEMBRE</option>
			  </select>
		    </td>

		    <td>
		  		<input type="text" name="aaa" id="aaa" size="5" maxlength="4" class="required" onkeyUp="return ValNumero(this);"/>
		  	</td>
		</tr>  
		<tr>
			<td>
		  		<input type="submit" name="button" id="button" value="Guardar" />
		  	</td>
		</tr>
  </table>
</form>
</section>
				


			</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
	<footer id="pie">
	    <a href="../../index.php">Inicio</a> | <a href="../../Autores/index.php">Autores</a> | <a href="">Contacto</a> </br>
	    Derechos de Autor © 2012  | Centro de Apoyo a la Titulación
    </footer>
</footer>

</body>
<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../index.php? var=0");
	</script>
<?php } ?>
</html>
