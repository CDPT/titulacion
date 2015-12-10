<?php 	
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="EXP, Centro, Apoyo, Titulación">
	<title>EXP</title>

  <link href="../../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>

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



#edit{
	
	width:540px;
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
$id=$_POST['id'];
$abreviatura=$_POST['abreviatura'];
$completo=$_POST['completo'];
?>
<body  oncontextmenu="return false">


<section id="edit" style="display:none;" >
	<section id="cuadroedita">
		<a href="listado_licenciaturas.php" class="close">
			<img src="../../../Imagenes/error.png" class="btn_close" title="Close Window" alt="Close" />
		</a>
<form id="form1" name="form1" method="post" action="edita_licenciaturas.php">
	<input type="hidden" id="id" name="id" value="<?php print $id; ?>"/>

	<table>
		<tr>
			<td>abreviatura</td>
			<td><input type="text" class="campotext1" name="abreviatura" value="<?php print $abreviatura; ?>" maxlength="5"/></td>
		</tr>

		<tr>
			<td>Completo</td>
			<td><input type="text" class="campotext2" name="completo" value="<?php print $completo; ?>"  maxlength="30"/></td>
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
