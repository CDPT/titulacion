<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CAT</title>
	<link href="../../../Imagenes/iconocat.ico" rel="shortcut icon" />


    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>


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
	session_start();

		

		if($_SESSION['estatus']==1){
			include("../../../Scripts/conexion.php");
		
?>
<body  oncontextmenu="return false">
<script src="ajax.js" language="javascript"></script>
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
				








<div class="input">BUSCAR
  <input type="text" size="40" class="caja" id="valor" onKeyUp="Buscar()" />

</div>
</center>
<div class="resultados" id="resultados">
</div>










			</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
	<footer id="pie">

	    <a href="index.php">Inicio</a> | <a href="">Autores</a> | <a href="">Contacto</a> </br>
	    Derechos de Autor © 2012  | Centro de Apoyo a la Titulación
    </footer>
</footer>

</body>
<?php

}else{
	session_destroy();
		print "no puedes entrar ";
		header("Location:../index.php? var=0");
}

?>

</html>

