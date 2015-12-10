<?php 	
	session_start();
	error_reporting(0);
	include("../../../Scripts/conexion.php");
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="JEFE, Centro, Apoyo, Titulación">
	<title>JEFE</title>

  <link href="../../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>

		<script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){	

				 /*edit*/
				 
				 	$("#edit").slideToggle(1000);

				$("a.close").click(function(){

					//$("#edit").remove(function(){
						$(location).attr('href','index.php');
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
	
	width:540px;
	height:auto;
	display:none;
	margin-top:100px;
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
	float:left;
}

tr, td{
	padding: 2px 10px 2px 10px;
}

.campotext1{
	text-align:center;
	width:100px;
	height:25px;
	margin-bottom:10px;
}

.campotext2{
	text-align:center;
	width:400px;
	height:25px;
	margin-bottom:10px;
}

.boton{
	width:200px;
	height:30px;
	margin-top:10px;
	margin-bottom:10px;
}

input{
	text-align:center;
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
$id=$_POST['id_per'];

$cons=mysql_query("SELECT * FROM profesor WHERE no_personal='$id' ")or die("No se puede");
$fil=mysql_fetch_array($cons);
?>
<body  oncontextmenu="return false">


<section id="edit" style="display:none;" >
	<section id="cuadroedita">
		<a href="index.php" class="close">
			<img src="../../../Imagenes/error.png" class="btn_close" title="Close Window" alt="Close" />
		</a>
<form id="form1" name="form1" method="post" action="edita_maestro.php">
	<input type="hidden" id="id" name="id" value="<?php print $id; ?>"/>

	<table>
		<tr>
			<td>No de Personal</td>
			<td><input type="number" class="campotext1" name="no" value="<?php print $fil['no_personal']; ?>" maxlength="5" required/></td>
		</tr>

		<tr>
			<td>Nombre</td>
			<td><input type="text" class="campotext2" name="nombre" value="<?php print $fil['nombre']; ?>"  maxlength="30" required/></td>
		</tr>

		<tr>
			<td>Apellido Paterno</td>
			<td><input type="text" class="campotext2" name="apepat" value="<?php print $fil['apellido_paterno']; ?>"  maxlength="30"/></td>
		</tr>

		<tr>
			<td>Apellido Materno</td>
			<td><input type="text" class="campotext2" name="apemat" value="<?php print $fil['apellido_materno']; ?>"  maxlength="30"/></td>
		</tr>		

		<tr>
			<td>E-mail</td>
			<td><input type="email" class="campotext2" name="mail" value="<?php print $fil['email']; ?>"  maxlength="30"/></td>
		</tr>

		<tr>
			<td>Telefono</td>
			<td><input type="number" class="campotext2" name="telefono" value="<?php print $fil['telefono']; ?>"  maxlength="30"/></td>
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
