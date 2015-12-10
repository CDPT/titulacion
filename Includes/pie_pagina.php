<?php if($_SESSION['estatus']=='1'){ 

if ($sistema=="CAT") { ?>
<footer id="pie">
	<section id="pie_centro">
		<a href="<?php print $ruta; ?>Administrador/index.php">Inicio</a> |
		<a href="http://www.uv.mx/">Universidad Veracruzana</a> |
		<a href="">CDPT</a>
		<br>
		Derechos de Autor © 2013 Universidad Veracruzana | Centro de Desarrollo y Producción Tecnológica
	</section>
</footer>
<?php }if($sistema=="EXP"){ ?>
	<footer id="pie">
	<section id="pie_centro">
		<a href="<?php print $ruta; ?>Experiencia/index.php">Inicio</a> |
		<a href="http://www.uv.mx/">Universidad Veracruzana</a> |
		<a href="">CDPT</a>
		<br>
		Derechos de Autor © 2013 Universidad Veracruzana | Centro de Desarrollo y Producción Tecnológica
	</section>
</footer>
<?php
}if($sistema=="JEFE"){ ?>
	<footer id="pie">
	<section id="pie_centro">
		<a href="<?php print $ruta; ?>JefesCarrera/index.php">Inicio</a> |
		<a href="http://www.uv.mx/">Universidad Veracruzana</a> |
		<a href="">CDPT</a>
		<br>
		Derechos de Autor © 2013 Universidad Veracruzana | Centro de Desarrollo y Producción Tecnológica
	</section>
</footer>
<?php }

}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=(<?php print $ruta; ?>"index.html");
  </script>
<?php } ?>				