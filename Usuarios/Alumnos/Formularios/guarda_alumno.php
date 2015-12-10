<?php session_start(); if($_SESSION['estatus']=='1'){ 
include("../../../Scripts/conexion.php");

date_default_timezone_set('America/Mexico_City');
 $fecha = date("Y/m/d"); 



$matricula=$_POST['matricula'];

$consulta_matricula="SELECT * FROM formulario WHERE matricula='$matricula'";
$compara_matricula=mysql_query($consulta_matricula) or die ("no se pudo");
$cons=mysql_num_rows($compara_matricula);

?>
<form method="post" id="formenvia" name="formenvia" action="../Listado/index.php">
	<input type="hidden" value="<?php print $matricula ?>" name="id"/>
</form>

<?php
if($cons){
	  $consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");
$fila=mysql_fetch_array($consula_alumno);
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
?>



      
			    <script> 
				   var id="<?php print $matricula ?>";
				   var no="<?php print $nombre ?>";
				   var pa="<?php print $apepat ?>";
				   var ma="<?php print $apemat ?>";
			        alert( no+" "+pa+" "+ma+" ya ha sido registrada anteriormente busquel@ en LISTADO DE ALUMNOS  ");
			       // document.location.href=("../Listado/index.php"); 

  					document.formenvia.submit();
 
				</script>
<?php			 	 
}else{


$guardar="INSERT INTO formulario (matricula,fecha_creacion,tipo) VALUES ('$matricula','$fecha','CAT')";
$con2=mysql_query($guardar)or die ("no se pudo realizar consulta2");

$guardar2="INSERT INTO formulario_er (matricula) VALUES ('$matricula')";
$con21=mysql_query($guardar2)or die ("no se pudo realizar consulta21");

$guardar3="INSERT INTO formulario_cat (matricula) VALUES ('$matricula')";
$con22=mysql_query($guardar3)or die ("no se pudo realizar consulta22");
?>
			    <script> 
			    	alert("Se Guardo Correctamente..");
			          //document.location.href=("../Listado/index.php? id=<?php print $matricula ?>"); 
			          document.formenvia.submit();
				</script>

<?php } ?>				



<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html");
  </script>
<?php } ?>