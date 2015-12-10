<?php 	
	session_start();
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="es" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<title>Usuario CAT</title>
	<link href="../../../Imagenes/iconocat.ico" rel="shortcut icon" />
<script src="ajax.js" language="javascript"></script>


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

<script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>


<?php
include("../../../Scripts/conexion.php");


$RegistrosAMostrar=10;

//estos valores los recibo por GET
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
	
}



if(isset($_REQUEST['bus'])){
		
	$bus=$_REQUEST['busca'];

	$consul="SELECT * FROM profesor WHERE nombre LIKE '%$bus%' ORDER BY nombre ";
}else{
	$consul="SELECT * FROM profesor ORDER BY nombre LIMIT $RegistrosAEmpezar, $RegistrosAMostrar ";	
}



$resul=mysql_query($consul)or die ("no se pudo realizar la consulta");
$numregistro=mysql_num_rows($resul);


?>


	<style type="text/css">
		#op3{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
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
			<?php include ("../../../Menus/menu_administrador.php"); ?>
				</ul>
			</nav>
		</nav>



		<section id="engloba_cuerpo">


			<section id="cuerpo">
				





<section id="titformulintro">
LISTADO DE MAESTROS DE LA UV
</section>


	
				<form method="post" id="formuldatos" name="formuldatos" action="INDEX.php? bus=1"> 
					<label id="lbltitbusca">Buscar Maestro :</label>

					<input id="textfilbusca" type="text" id="clave" name="busca" size="20" placeholder="Introduzca Nombre" autofocus="autofocus" maxlength="15" required />
					<input src="../../Imagenes/alumnos/iconbuscar.png" type="image"/>
				</form>  
	<section id="ta">  

  <?php

echo "REGISTROS TOTALES ENCONTRADOS: " .$numregistro;

if ($numregistro == 0) {
?>
		<section id="mensajebusca">
			<img src="../../../Imagenes/alerta.png"/>
			   "No Se Encontro Ningun Resultado<br>
				   Intentelo de Nuevo"
		</section>
<?php
}else{

?>

<table class="tablesorter">
  <thead>
  <tr>
       <th class="titbuscar">NO_PERSONAL</th>
       <th class="titbuscar">NOMBRE</th>
       <th class="titbuscar">APELLIDO PATERNO</th>
       <th class="titbuscar">APELLIDO MATERNO</th>
       <th class="titbuscar">E-MAIL</th>
       <th class="titbuscar">TELEFONO</th>
    </tr> 
   </thead>

   <tbody class="cont_tabla">
<?php
	//mysqul_fectch_array me permite obtener los registros de el resultado de las consulta, y a travez de filaconsulta se puede acceder a los elementos de la tabla 
	while ($filaconsulta=mysql_fetch_array($resul)){
	$no_personal=$filaconsulta['no_personal'];
	$nombre=$filaconsulta['nombre'];
	$apepat=$filaconsulta['apellido_paterno'];
	$apemat=$filaconsulta['apellido_materno'];
	$correo=$filaconsulta['email'];
	$telefono=$filaconsulta['telefono'];

?>

    <tr>
      <td class="celdaform"><? echo $no_personal ;?></td>
      <td class="celdaform"><? echo $nombre ; ?></td>
      <td class="celdaform"><? echo $apepat; ?></td>
      <td class="celdaform"><? echo $apemat ;?></td>
      <td class="celdaform"><? echo $correo ;?></td>
      <td class="celdaform"><? echo $telefono ;?></td>


    </tr>

	    <?php
			  }

$NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM profesor"));
$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevará decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
echo "<a onclick=\"Pagina('1')\">Primero</a> ";
if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\">Anterior</a> ";
echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">Siguiente</a> ";
echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";



			}


			  //con mysql_free_result se libera la memoria que ocupa dicha consulta en el servidor 
			  mysql_free_result($resul);
			  //se utiliza parac ortare laconsulta 
			  mysql_close();
		  ?>
  </tbody>

</table>

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
