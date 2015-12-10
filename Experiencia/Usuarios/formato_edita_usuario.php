<?php 	
	session_start();
	error_reporting(0);
	include("../../Scripts/conexion.php");
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="EXP, Centro, Apoyo, Titulación">
	<title>EXP</title>

  <link href="../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>

		<script type="text/javascript" src="../../Scripts/jquery-1.7.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){	 
				 	$("#edit").slideToggle(1000);
				$("a.close").click(function(){
						$(location).attr('href','usuarios.php');
				});
				

			});
		</script>


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
.campotext{
	width:200px;
	height:25px;
	margin-bottom:5px;
}

img.btn_close {
/* Position the close button*/
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

</head>
<?php
$id=$_POST['id'];
?>
<body  oncontextmenu="return false">

<?php $s=mysql_query("SELECT * FROM usuarios WHERE id_usuario='$id' ")or die("No Se Realizo la consulta");
	$fila=mysql_fetch_array($s);	?>

<section id="edit" style="display:none;">
	<section id="cuadroedita">
		<a href="usuarios.php" class="close">
			<img src="../../Imagenes/error.png" class="btn_close" title="Close Window" alt="Close"/>
		</a>
<form id="form1" name="form1" method="post" action="edita_usuario.php">
<input type="hidden" name="id" value="<?php print $id; ?>">
<table>
		<tr id="fil">
			<td>Nombre</td>
			<td><input type="text"  class="campotext" name="nombre" maxlength="30" value="<?php print $fila['nombre']; ?>" required /></td>
		</tr>
		
		<tr id="fil">
			<td>Usuario</td>
			<td><input type="text" class="campotext" name="usuario" maxlength="15" value="<?php print $fila['usuario']; ?>" required/></td>
		</tr>

		<tr id="fil">
			<td>Tipo</td>
			<td>
				<select name="tipo" id="tipo" required>
					<option value="<?php print $fila['tipo']; ?>"><?php print $fila['tipo']; ?></option>
					<option value="Usuario">Usuario</option>
				</select>
			</td>
		</tr>

		<!--
    	<tr id="fil">
			<td>Password</td>
			<td><input type="text" class="campotext" name="pass" id="pass" maxlength="10" required/></td>
		</tr>-->

		<tr id="fil">
			<td></td>
			<td><input class="boton" type="submit" value="Guardar"/></td>
		</tr>

	</table>


</form>
</section>
</section>


</body>

</html>
