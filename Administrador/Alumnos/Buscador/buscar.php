<?php 	
	session_start();
	error_reporting(0);

if($_SESSION['estatus']==1){		

 ?>
<html> 
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

	<?php
	header("Content-Type: text/html;charset=utf-8");
	header('Content-type: text/html; charset=utf-8' , true );
	?>
	<meta http-equiv="Content-Type" content="text/html" />
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
	  	$query=mysql_query("SELECT * FROM alumno WHERE matricula LIKE '%$clave%' order by matricula ");
	  	$query2=mysql_query("SELECT * FROM formulario WHERE matricula LIKE '%$clave%' order by matricula ");
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
				<form method="post" action="../Formularios/guarda_alumno.php"> 			
				<table  border="0">
			            <tr>
						   <th class="titbuscar">MATRICULA</th>
						   <th class="titbuscar">NOMBRE</th>
						   <th class="titbuscar">APELLIDO PATERNO</th>
						   <th class="titbuscar">APELLIDO MATERNO</th>
						   <th class="titbuscar">CARRERA</th>
						   <th class="titbuscar">TIPO</th>
			            </tr>
						<?php
						   while($row=mysql_fetch_array($query)){
						   	$row2=mysql_fetch_array($query2);
						?>
						   	<tbody align="center" class="cont_tabla">
						   	
							   	<tr> 
									<td><input class="textfiltab" type="text" name="matricula" size="9" value="<?php print $row['matricula']; ?>" readonly="readonly" /></td>
									<td><input class="textfiltab" type="text" name="nombre"  value= "<?php print $row['nombre']; ?>" readonly="readonly" /></td>
									<td><input class="textfiltab" type="text" name="apepat" size="9" value= "<?php print $row['apepat']; ?>" readonly="readonly" /></td>
									<td><input class="textfiltab" type="text" name="apemat" size="9"  value= "<?php print $row['apemat']; ?>" readonly="readonly" /></td>
									<td><input class="textfiltab" type="text" name="carrera" size="6" value= "<?php print $row['carrera']; ?>" readonly="readonly" /></td>
									<td><input class="textfiltab" type="text" name="tipo" size="6" value= "<?php print $row2['tipo']; ?>" readonly="readonly" /></td>
			                        <td>
							      		<input type="image" src="../../../Imagenes/alumnos/registrar.png">
							      	</td>
						    	</tr>
						    </tbody>
						   
						<?php } ?>
				</table>
				</form>
 
		</section>
		<?php } 
		mysql_free_result($query);
		mysql_close();
		?>
</body> 
</html> 
<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../index.php? var=0");
	</script>
<?php } ?>