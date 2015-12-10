<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!-- Autor: Víctor Javier Báez Morales LSCA-->
<html> 

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

	<?
	header("Content-Type: text/html;charset=utf-8");
	header('Content-type: text/html; charset=utf-8' , true );


	?>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="JEFE, Centro, Apoyo, Titulación">
</head>

<body  oncontextmenu="return false"> 
<center>
<?php 
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET utf8"); 

header("Content-Type: text/html;charset=utf-8");
header('Content-type: text/html; charset=utf-8' , true );


include "../../../Scripts/conexion.php";
 

	   	$clave = $_POST['clave'];

	  	$query=mysql_query("SELECT * FROM profesor WHERE nombre LIKE '%$clave%' order by nombre ");
       	if(mysql_num_rows($query)<=0){
?> 



		<section id="mensajebusca">
			<img src="../../../Imagenes/alerta.png"/>
			   "No Se Encontro Ningun Resultado<br>
				   Intentelo de Nuevo"
		</section>

	    	<?php
	       		}else{ 
	        ?>
	
		<section id="tablabuscar"> 
			
				<table  border="0">
			            <tr>
						   <th class="titbuscar">NO. PERSONAL</th>
						   <th class="titbuscar">NOMBRE</th>
						   <th class="titbuscar">APELLIDO PATERNO</th>
						   <th class="titbuscar">APELLIDO MATERNO</th>
			            </tr>
			    
						<?php
						   while($row=mysql_fetch_array($query)){
						?>
						   	<tbody align="center" class="cont_tabla">
						   	<form method="post" action="../Formularios/formulario_intro.php">
							   	<tr> 
									<td><input class="textfiltab" type="text" name="no_personal" size="9" value= "<?php print $row['no_personal']; ?>" readonly="readonly" /></td>
									<td><input class="textfiltab" type="text" name="nombre"  value= "<?php print $row['nombre']; ?>" readonly="readonly" /></td>
									<td><input class="textfiltab" type="text" name="apepat" size="9" value= "<?php print $row['apellido_paterno']; ?>" readonly="readonly" /></td>
									<td><input class="textfiltab" type="text" name="apemat" size="9"  value= "<?php print $row['apellido_materno']; ?>" readonly="readonly" /></td>
						    	</tr>
						    </form>
						    </tbody>
						   
						<?php } ?>
				</table> 
			</form>
		</section>
		<?php } ?>

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