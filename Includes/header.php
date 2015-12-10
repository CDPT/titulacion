<?php if($_SESSION['estatus']=='1'){ ?>


<?php if ($sistema=='CAT') { ?>

				<header id="cabecera">
					<section id="imagenes">
						<section id="imagen_cat">
							<img src="<?php print $ruta;?>Imagenes/logocat.png" width="140px" height="150px">
						</section>

						<section id="titulocat">
							Centro de Apoyo a la Titulación
						</section>

			            <section id="imagen_uv">
			            	<img src="<?php print $ruta;?>Imagenes/Logouv.png" width="160px" height="150px">
			            </section>  
			        </section>

				</header>  

<?php }elseif ($sistema=='EXP'){ ?>				

				<header id="cabecera">
					<section id="imagenes">
						<section id="imagen_cat">
							<img src="<?php print $ruta;?>Imagenes/Logouv.png" width="160px" height="150px">
						</section>

						<section id="titulocat">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Experiencia Recepcional
						</section>

			            <section id="imagen_uv">
			            	<img src="<?php print $ruta;?>Imagenes/Logouv.png" width="160px" height="150px">
			            </section>  
			        </section>

				</header> 


<?php }elseif ($sistema=='JEFE'){  ?>
				<header id="cabecera">
					<section id="imagenes">
						<section id="imagen_cat">
							<img src="<?php print $ruta;?>Imagenes/Logouv.png" width="160px" height="150px">
						</section>

						<section id="titulocat">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Directivos
						</section>

			            <section id="imagen_uv">
			            	<img src="<?php print $ruta;?>Imagenes/Logouv.png" width="160px" height="150px">
			            </section>  
			        </section>

				</header> 

<?php } ?>


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=(<?php print $ruta; ?>"index.html");
  </script>
<?php } ?>				