<?php session_start(); if($_SESSION['estatus']=='1'){
	error_reporting(0);
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<title>Pago</title>

  <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>

		<script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){	

				 /*edit*/
				 
				 	$("#edit").slideToggle(1000);

				$("a.close").click(function(){

					//$("#edit").remove(function(){
						$(location).attr('href','../formulario_completo.php');
					//	location.href=("index.php");
					//}); 
				});
				

			});
		</script>


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
body{
	background:#000;
	background:rgba(0,0,0,0.7);



}

section, table{
		margin-right:auto;
		margin-left:auto;	
}

td{
	
}

#edit{
	
	width:410px;
	height:auto;
	display:none;
	margin-top:180px;
	margin-right:auto;
	margin-left:auto;
	box-shadow: 1px 1px 10px #000;
	border-radius:5px 5px 5px 5px;

	
}

img.btn_close {
 Position the close button

	margin: -28px -28px 0 0;
}


#cuadroedita{
	background:#dddde3;
	border-radius:5px 5px 5px 5px;
}

table{
	padding: 10px 10px 0px 0px;
}

tr{
	
}

tr, td{
	padding: 2px 10px 2px 10px;
}

.campotext{
	text-align:center;
	width:200px;
	height:25px;
}
.boton{
	width:200px;
	height:30px;
	margin-top:10px;
	margin-bottom:10px;
}

 td .lbltab{
 	text-align:right;
 }

</style>
<script language="javascript" type="text/javascript">
    function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
</script>


</head>
<?php
include("../../../Scripts/conexion.php");
$mat=$_SESSION['matricula']; 
	$_SESSION['matricula']=$mat; 
	$matricula=$_REQUEST['matricula'];
 ?>
<body  oncontextmenu="return false">
<?php

   date_default_timezone_set('America/Mexico_City');
  
	$fecha = date("Y/m/d");
	$matricula=$_REQUEST['matricula'];

!@$matricula=$_GET['matricula'];
!@$fecha_curso="Febrero-Agosto";
$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");
{
$fila=mysql_fetch_array($consula_alumno);
$matricula=$fila['matricula'];
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
$carrera=$fila['carrera'];
}
?>

<section id="edit" style="display:none;" >
	<section id="cuadroedita">
		<a href="index.php? matricula=<?php print $matricula ?>" class="close">
			<img src="../../../Imagenes/error.png" class="btn_close" title="Close Window" alt="Close" />
		</a>




			<form id="formulrecibo" name="formulrecibo" method="post" action="guardar_pago.php? matricula=<?php echo $matricula ?> & fecha=<?php echo $fecha ?> & fecha_curso=<?php echo $fecha_curso ?> & sinodal=<?php echo "1" ?>" >

			  <table class="tabla_form">
			    <tr>
			      <td><label class="lbltab">Matricula:</label></td>
			      <td><?php echo $matricula ;?></td>
			    </tr>

			    <tr>
			      <td><label class="lbltab">Nombre(s):</label></td>
			      <td><?php echo $nombre."<br>"; ?></td>
			    </tr>
			    <tr>
			      <td><label class="lbltab">Apellido Paterno:</label></td>
			      <td><?php echo $apepat."<br>"; ?></td>
			    </tr>
			    <tr>
			      <td><label class="lbltab">Apellido Materno:</label></td>
			      <td><?php echo $apemat; ?></td>
			    </tr>
			    <tr>
			      <td><label class="lbltab">Carrera:</label></td>
			      <td><?php echo $carrera; ?></td>
			    </tr>
			    <tr>
			      <td><label class="lbltab">Fecha curso:</label></td>
			      <td><?php echo $fecha_curso; ?></td>
			    </tr>
			    <tr>
			      <td><label class="lbltab">Importe:</label></td>
			      <td><label>
			        <input value="400" name="importe" type="text" id="importe" onkeyUp="return ValNumero(this);" required autofocus readonly>
			      </label></td>
			    </tr>
			    <tr>
			      <td><label class="lbltab">Concepto:</label></td>
			      <td><label>
			        <input type="text" name="concepto" id="concepto" value="Pago Sinodal" readonly>
			      </label></td>
			    </tr>
			    <tr>
			      <td><label class="lbltab">Tipo de pago:</label></td>
			      <td><select name="tipo_pago" id="tipo_pago">
			        <option value="Total">Total</option>
			      </select></td>
			    </tr>
				  <input type="hidden" name="fecha" value="<?php echo $fecha ;?>" id="fecha" readonly/>
				  <tr>
				  	<td colspan="2" align="center"><input class="boton" type="submit"/></td>
				  </tr>
				 </table> 


			</form> 






			</section>

</section>


</body>

</html>





<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>