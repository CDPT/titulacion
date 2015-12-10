<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!-- Autor: Víctor Javier Báez Morales LSCA-->
<?php
include("../../../Scripts/conexion.php");
/*
$matricula=strtoupper($_POST['matricula']);
 $matinterna=strtoupper($_POST['matinterna']);
 $nombre=strtoupper($_POST['nombre']);
 $apepat=strtoupper($_POST['apepat']);
 $apemat=strtoupper($_POST['apemat']);
 $carrera=strtoupper($_POST['carrera']);
 $calle=strtoupper($_POST['calle']);
 $colonia=strtoupper($_POST['colonia']);
 $codigo=strtoupper($_POST['codigo']);
 $ciudad=strtoupper($_POST['ciudad']);
 $tel=strtoupper($_POST['tel']);
 $cel=strtoupper($_POST['cel']);
 $correo=$_POST['correo'];
*/

$ma=filter_var($_POST['matricula'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $matin=filter_var($_POST['matinterna'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $nom=filter_var($_POST['nombre'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $apep=filter_var($_POST['apepat'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $apem=filter_var($_POST['apemat'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $carr=filter_var($_POST['carrera'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $call=filter_var($_POST['calle'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $col=filter_var($_POST['colonia'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $cod=filter_var($_POST['codigo'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $ciu=filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $te=filter_var($_POST['tel'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $ce=filter_var($_POST['cel'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
 $corr=filter_var($_POST['correo'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);


$matricula=strtoupper($ma);
 $matinterna=strtoupper($matin);
 $nombre=strtoupper($nom);
 $apepat=strtoupper($apep);
 $apemat=strtoupper($apem);
 $carrera=strtoupper($carr);
 $calle=strtoupper($call);
 $colonia=strtoupper($col);
 $codigo=strtoupper($cod);
 $ciudad=strtoupper($ciu);
 $tel=strtoupper($te);
 $cel=strtoupper($ce);
 $correo=$corr;

    date_default_timezone_set('America/Mexico_City');
  
 $fecha = date("Y/m/d"); 


$consulta=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
$coincidencia=mysql_num_rows($consulta);

if($coincidencia != '0'){

?>
<script type="text/javascript">
	alert(" ! Esta Duplicando un Alumno ya Existente ¡ ");

	//	var mat="<?php print $matricula ?>";

		 document.location=("../listado/index.php? id=<?php print $matricula  ?> ");
</script>

<?php

}else{


$inserta_alumno=mysql_query("
INSERT INTO alumno (
matricula ,
nombre ,
apepat ,
apemat ,
carrera ,
calle ,
colonia ,
ciudad ,
codigo_postal ,
tel_emergencia ,
matricula_interna ,
celular ,
correo
)
VALUES (
'$matricula', '$nombre', '$apepat', '$apemat', '$carrera', '$calle' , '$colonia', '$ciudad', '$codigo', '$tel', '$matinterna','$cel', '$correo'
)")or die("No se pudo Realizar la Consulta".mysql_error());

$guarda_alumno=mysql_query("INSERT INTO formulario (matricula,fecha_creacion,tipo) VALUES ('$matricula','$fecha','ER')");
$guarda_alumno2=mysql_query("INSERT INTO formulario_er (matricula) VALUES ('$matricula')");


if($inserta_alumno && $guarda_alumno){
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
<?php }} ?>






<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>