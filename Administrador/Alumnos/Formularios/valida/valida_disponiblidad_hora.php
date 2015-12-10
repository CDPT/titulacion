<?php  if($_SESSION['estatus']=='1'){ 
session_start();

include("../../../../Scripts/conexion.php");

 $mat=$_GET['mat'];
 //$fecha=$_GET['fech'];
 $hora=$_GET['hora'];
 $fecha=$_GET['fech'];
$_SESSION['fecha']=$fecha;

/*
$consultafecha=mysql_query("SELECT * FROM formulario WHERE matricula='$mat' ")or die("no se pudo");
while ($fil=mysql_fetch_array($consultafecha)) {
		$fecha=$fil['fecha'];
}
		
*/


$consulta1=mysql_query("SELECT * FROM formulario WHERE horaexam='$hora' and fechaexam='$fecha'");
	$conicidencia1=mysql_num_rows($consulta1);

	if($conicidencia1 != 0){
		//print "eviste".$conicidencia1."coincidencias";
			  include("informacion_hora.php");
?>
<section id="activa_informacion3">
	<img src="../../../Imagenes/alumnos/rojo.png" width="32" height="32" border="0"  />
		<script type="text/javascript">
			alert("Verifique fecha y hora de click sobre el circulo rojo Porfavor");
		</script>
</section>
<?php

	}else{
?>
<img src="../../../Imagenes/alumnos/verde.png" width="32" height="32" border="0"  />

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