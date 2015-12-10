<?php
$opcion1="Inicio";
$opcion2="Estudiantes";
$opcion3="Maestros";
$opcion4="Contabilidad";
$opcion5="Parámetros";
$opcion9="Reportes";
$opcion6="Usuarios";
$opcion7="Respaldo";
$opcion8="Mi Perfil";
$opcion10="Autorizaciones";

if ($sistema=='CAT') {
	$dir='Administrador';
?>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/index.php"><li id="op1"><?php print $opcion1; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Alumnos/index.php"><li id="op2"><?php print $opcion2; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Maestros/index.php"><li id="op3"><?php print $opcion3; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Contabilidad/index.php"><li id="op4"><?php print $opcion4; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Parametros/index.php"><li id="op5"><?php print $opcion5; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Reportes/index.php"><li  id="op9"><?php print $opcion9; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Usuarios/usuarios.php"><li id="op6"><?php print $opcion6; ?></li></a>
	<!--<a href="<?php echo $ruta ?><?php print $dir; ?>/Respaldo/index.php"><li  id="op7"><?php print $opcion7; ?></li></a>-->
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Perfil/perfil.php"><li  id="op8"><?php print $opcion8; ?></li></a>

<?php }elseif ($sistema=='EXP'){ $dir='Experiencia';?>

	<a href="<?php echo $ruta ?><?php print $dir; ?>/index.php"><li id="op1"><?php print $opcion1; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Alumnos/index.php"><li id="op2"><?php print $opcion2; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Maestros/index.php"><li id="op3"><?php print $opcion3; ?></li></a>
	<!--<a href="<?php echo $ruta ?><?php print $dir; ?>/Autorizacion/index.php"><li id="op10"><?php print $opcion10; ?></li></a>-->
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Parametros/index.php"><li id="op5"><?php print $opcion5; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Reportes/index.php"><li  id="op9"><?php print $opcion9; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Usuarios/usuarios.php"><li id="op6"><?php print $opcion6; ?></li></a>
	<!--<a href="<?php echo $ruta ?><?php print $dir; ?>/Respaldo/index.php"><li  id="op7"><?php print $opcion7; ?></li></a>-->
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Perfil/perfil.php"><li  id="op8"><?php print $opcion8; ?></li></a>

<?php }elseif ($sistema=='JEFE'){ $dir='JefesCarrera'; ?>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/index.php"><li id="op1"><?php print $opcion1; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Alumnos/index.php"><li id="op2"><?php print $opcion2; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Maestros/index.php"><li id="op3"><?php print $opcion3; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Autorizacion/index.php"><li id="op10"><?php print $opcion10; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Parametros/index.php"><li id="op5"><?php print $opcion5; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Reportes/index.php"><li  id="op9"><?php print $opcion9; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Usuarios/usuarios.php"><li id="op6"><?php print $opcion6; ?></li></a>
	<a href="<?php echo $ruta ?><?php print $dir; ?>/Perfil/perfil.php"><li  id="op8"><?php print $opcion8; ?></li></a>


<?php } ?>
