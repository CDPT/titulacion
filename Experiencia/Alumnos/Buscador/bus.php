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
	<?php $sistema="EXP"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>


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

<script language="javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>
<script language="javascript">
$(document).ready(function() {
    $().ajaxStart(function() {
        $('#loading').show();
        $('#result').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#result').fadeIn('slow');
    });
    $('#form, #fat, #formuldatos').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result').html(data);

            }
        })
        
        return false;
    }); 
})  
</script>







	<style type="text/css">
		#op2{
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
			include("../../../Scripts/conexion.php");
		
?>
<body  oncontextmenu="return false">
<script src="ajax.js" language="javascript"></script>
	<section id="global">

		<header id="baner">
				<?php include ("../../../Includes/header.php"); ?>  

			        <aside id="engloba_notificacion">
			            <aside id="notificaciones">
			            	<label class="bienvenida"><?php print "Bienvenido: ".$_SESSION['nick']; ?></label>
						
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
				



				<section class="input">BUSCAR
				  <input type="text" size="40" class="caja" id="valor" onKeyUp="Buscar()" />
				</section>

				<section class="resultados" id="resultados"> </section>

					<?php 
						include "procesar.php";
					 ?>





			</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
	<?php include ('../../../Includes/pie_pagina.php'); ?>	
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
