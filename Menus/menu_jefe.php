<?php
$opcion1="Inicio";
$opcion2="Estudiantes";
$opcion3="Maestros";
$opcion4="Autorizaciones";
$opcion9="Reportes";
$opcion6="Usuarios";
//$opcion7="Respaldos";
$opcion8="Mi Perfil";

//define ("URLRAIZ", "http://localhost/CAT_nuevo/Administrador");
$localizacion="http://localhost/Dropbox/EQUIPO_JABA/cat/JefesCarrera";
?>

					<a href="<?php echo $localizacion ?>/index.php"><li id="op1"><?php print $opcion1; ?></li></a>
					<a href="<?php echo $localizacion ?>/Alumnos/listado/index.php"><li id="op2"><?php print $opcion2; ?></li></a>
					<a href="<?php echo $localizacion ?>/Maestros/index.php"><li id="op3"><?php print $opcion3; ?></li></a>
					<a href="<?php echo $localizacion ?>/Autorizacion/index.php"><li id="op4"><?php print $opcion4; ?></li></a>
					<a href="<?php echo $localizacion ?>/Reportes/index.php"><li  id="op9"><?php print $opcion9; ?></li></a>
					<!--<a href="<?php echo $localizacion ?>/Respaldo/index.php"><li  id="op7"><?php print $opcion7; ?></li></a>-->
					<a href="<?php echo $localizacion ?>/Perfil/perfil.php"><li  id="op8"><?php print $opcion8; ?></li></a>
