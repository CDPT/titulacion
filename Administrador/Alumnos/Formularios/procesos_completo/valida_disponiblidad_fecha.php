<?php session_start(); if($_SESSION['estatus']=='1'){ 

include("../../../../Scripts/conexion.php");

 $mat=$_GET['mat'];
 $fecha=$_GET['fech'];
 //print $hora=$_GET['hora'];



$consulta1=mysql_query("SELECT * FROM formulario WHERE fechaexam='$fecha'");
	$conicidencia1=mysql_num_rows($consulta1);

	if($conicidencia1 != 0){
		//print "eviste".$conicidencia1."coincidencias";
?>
<a href="procesos_completo/vista_disponibilidad.php">
<img src="../../../Imagenes/alumnos/rojo.png" width="32" height="32" border="0" align="absbottom" />
</a>
<?php
	}else{
		//print "disponible";
?>
<img src="../../../Imagenes/alumnos/verde.png" width="32" height="32" border="0" align="absbottom" />

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