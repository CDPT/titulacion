<?php  if($_SESSION['estatus']=='1'){ 
session_start();
?>
<script language="javascript" src="../../../../Scripts/jquery-1.7.1.min.js"></script>

<?php
include("../../../../Scripts/conexion.php");

 $mat=$_GET['mat'];
 $fecha=$_GET['fech'];
 //print $hora=$_GET['hora'];

$_SESSION['fecha']=$fecha;

$consulta1=mysql_query("SELECT * FROM formulario WHERE fechaexam='$fecha'");
	$conicidencia1=mysql_num_rows($consulta1);

	if($conicidencia1 != 0){
		//print "eviste".$conicidencia1."coincidencias";
?>
<!--<a href="procesos_completo/vista_disponibilidad.php">-->
	<?php  include("informacion_fecha.php"); ?>

<section id="activa_informacion">
	<img src="../../../../Imagenes/alumnos/rojo.png" width="32" height="32" border="0" />
<script type="text/javascript">
	alert("Verifique fecha y hora de click sobre el circulo rojo Porfavor");
</script>
</section>
<!--</a>-->
<?php
	}else{
		//print "disponible";
?>
<img src="../../../../Imagenes/alumnos/verde.png" width="32" height="32" border="0" />

<?php
	}

?>






<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>