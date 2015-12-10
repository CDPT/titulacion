<?php
session_start();
error_reporting(0);
function Connect($host,$user,$passwd)
     {  
      if(!($link=mysql_connect($host,$user,$passwd)))
       {
        echo "Error connecting to DDBB.";
        exit();
       }
       return $link;
     }
$link=Connect('localhost','root','12345');//

if($_POST['submit'])
 { 
     $db="cat3";
    $output=shell_exec("c:/xampp/MySQL/bin/mysqldump.exe -u root -p 12345 ".$db); // ejemplo windows
    //$output=shell_exec("/usr/bin/mysqldump -u root -proot ".$db); // ejemplo linux
    //
    //fijo el date de hoy
$date_month = date('m');
$date_year = date('Y');
$date_day = date('d');
$Date = "$date_year-$date_month-$date_day";
//Archivo
$filename = "bdcat_$Date";
    if(trim($output)==NULL)
     {
         echo "Error creando el backup de la DB: ".$db;
         exit();
     }
    header('Content-type: text/plain');
    header('Content-Disposition: attachment; filename="'.$filename.'.sql"');
    echo $output;
    exit();
 }    
$select="show databases";
$select=mysql_query($select); 	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="author" content="Víctor Javier Báez Morales">
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
	<link href="../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<?php $sistema="CAT"; include('../../Includes/ruta.php'); include('../../Includes/title.php');  ?>
	<script type="text/javascript" src="../../Scripts/FuncionesAjax.js"></script>
	<script type="text/javascript" src="../../Scripts/FuncionesjQuery.js"></script>
	<style type="text/css">
		#op7{
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
		.resp{
			background-image:url(../../Imagenes/respaldo/archivo.png);	
			width:125px;
			height:125px;
		}
	</style>


</head>

<?php
if($_SESSION['estatus']==1){
			include("../../Scripts/conexion.php");	
?>
<body  oncontextmenu="return false">

	<section id="global">
		<header id="baner">
		<?php include ("../../Includes/header.php"); ?>

			        <aside id="engloba_notificacion">
			            <aside id="notificaciones">
			            	<?php include ('../../Includes/salir.php'); ?>
						</aside>
					</asid>

			</header>

		<nav id="global_menu">
			<nav id="marco_menu">
				<ul>
					<?php include ("../../Menus/menu_usuarios.php"); ?>
				</ul>
			</nav>
		</nav>



		<section id="engloba_cuerpo">


			<section id="cuerpo">







<table>
	<tr>

		<td> 
				<section class="borde">
                <form action="" method="post">
				<input type="submit" name="submit" class="resp" value=""/>
				</form>
                </section>
				<section class="subtit">Realizar Respaldo</section>
		</td>


<!--
		<td>
			<a href="visualiza_respaldos.php">
				<section class="borde">
			   		<img src="../../Imagenes/respaldo/respaldos.png" alt="" width="125" height="125"/> 
			   	</section>
			   	<section class="subtit" >Respaldos Anteriores</section>
		   	</a>
		</td>


-->
	</tr>

</table>










			</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
<?php include ('../../Includes/pie_pagina.php'); ?>
</footer>

</body>
<?php
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../index.html? var=0");
	</script>
<?php } ?>
</html>
