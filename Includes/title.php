<?php  if($_SESSION['estatus']=='1'){ 

if ($sistema=="CAT") { ?>

	<title>.:CAT:.</title>
	<link href="<?php print $ruta;?>imagenes/iconocat.ico" rel="shortcut icon"/>

<?php }elseif($sistema=="EXP") {?>

		<title>.:Experiencia Recepcional:.</title>
	<link href="<?php print $ruta;?>imagenes/iconouv.ico" rel="shortcut icon"/>
	
<?php }elseif($sistema=="JEFE") {?>

		<title>.:Directivos:.</title>
	<link href="<?php print $ruta;?>imagenes/iconouv.ico" rel="shortcut icon"/>
<?php }

}else{ ?>
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=(<?php print $ruta; ?>"index.html");
  </script>
<?php } ?>				




