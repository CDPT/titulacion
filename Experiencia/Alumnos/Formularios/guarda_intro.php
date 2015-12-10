<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!-- Autor: Víctor Javier Báez Morales LSCA-->
<?php
include("../../../Scripts/conexion.php");


    date_default_timezone_set('America/Mexico_City');
  
 $fecha = date("Y/m/d"); 

$matricula=strtoupper($_GET['matricula']);
$matinterna=strtoupper($_POST['matinterna']);
$calle=strtoupper($_POST['calle']);
$colonia=strtoupper($_POST['colonia']);
$codigo=strtoupper($_POST['codigo']);
$ciudad=strtoupper($_POST['ciudad']);
$tel=strtoupper($_POST['tel']);
$cel=strtoupper($_POST['cel']);
$correo=$_POST['correo'];

$consulta=("UPDATE  alumno  SET matricula_interna='$matinterna', celular='$cel', correo='$correo', calle='$calle',colonia='$colonia',codigo_postal='$codigo',ciudad='$ciudad',tel_emergencia='$tel' WHERE matricula='$matricula'");

$con=mysql_query($consulta)or die ("no se pudo realizar consulta1");

$guardar="INSERT INTO formulario (matricula,fecha_creacion) VALUES	 ('$matricula','$fecha')";
$con2=mysql_query($guardar)or die ("no se pudo realizar consulta2");

if($con && $con2){
print '<div>';	
	print "Se guardo correctamente";
print '	<img src="../../imagenes/nombramiento-bola-cute-icono-9008-48.png" width="48" height="48" />
 </div>';
 
$consulta_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");
	$fila=mysql_fetch_array($consulta_alumno);
		$nombre=$fila['nombre'];
		$apepat=$fila['apepat'];
		$apemat=$fila['apemat'];
		$matricula=$fila['matricula'];
	 
	 	 print'<form action="../listado/index.php? mat=<?php print $matricula; ?>">
	            <input type="submit"  value="regresar" />  
			 </form> 
			  
			    <script> 
				   var id="'.$matricula.'";
				   var no="'.$nombre.'";
				   var pa="'.$apepat.'";
				   var  ma="'.$apemat.'";
					alert ("Se ha Guardado Correctamente");
			        document.location=("../Listado/index.php? id='.$matricula.' "); 
				</script>
			 ';
?>
<script>
     /*   alert("El Registro Fue Modificado con Exito");
				   var id="'.$matricula.'";
		document.location=("../listado/index.php? id='.$matricula.' "); */
</script>
<?php } ?>





<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>