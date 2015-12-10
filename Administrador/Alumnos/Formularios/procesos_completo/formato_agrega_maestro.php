<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<?php 	
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<title>Agregar Profesor</title>

  <link href="../../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>

		<script type="text/javascript" src="../../../../Scripts/jquery-1.7.1.min.js"></script>
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
	float: right;
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
	float:right;
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
 $matricula=$_SESSION['matricula']; 
	$_SESSION['matricula']=$mat; 
	 $matricula=$_POST['matricula'];
 ?>
<body  oncontextmenu="return false">
<?php
	/*$codigo=$_REQUEST['codigo']; 
	$tipo=$_REQUEST['tipo'];
	$naturaleza=$_REQUEST['naturaleza'];
	$nombre= $_REQUEST['nombre']; 
	$id=$_REQUEST['id'];*/
?>

<section id="edit" style="display:none;" >
	<section id="cuadroedita">
		<a href="../formulario_completo.php" class="close">
			<img src="../../../../Imagenes/error.png" class="btn_close" title="Close Window" alt="Close" />
		</a>
<form id="form1" name="form1" method="post" action="agrega_maestro.php">
	<input type="hidden" name="matricula" id="matricula" value="<?php print $matricula; ?>"/>

	<table>

		<tr>
			<td>No. Personal</td>
			<td><input class="campotext" onkeyUp="return ValNumero(this);" maxlength="5" name="nopersonal" type="text"/></td>
		</tr>

		<tr>
			<td>Nombre</td>
			<td><input class="campotext" maxlength="30" name="nombre" type="text" required/></td>
		</tr>

		<tr>
			<td>Apellido Paterno</td>
			<td><input class="campotext" maxlength="20" name="apepat" type="text" required/></td>
		</tr>

		<tr>
			<td>Apellido Materno</td>
			<td><input class="campotext" maxlength="20" name="apemat" type="text"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input class="boton" type="submit" value="Guardar"/></td>
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