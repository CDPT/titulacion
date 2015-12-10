<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<!-- Autor: Víctor Javier Báez Morales LSCA-->	
<section id="limpiar" name="limpiar">
	<head>

<style type="text/css">
	#resultado_positivo{
		background:#bbfd6c;
		color: #46780a;
		padding: 0px 0px 10px 0px;
		font-size:19px;
	}
</style>
</head>

<?php
include("../../../../Scripts/conexion.php");

$matricula=strtoupper($_REQUEST['matricula']);
$matinterna=strtoupper($_POST['matinterna']);
$calle=strtoupper($_POST['calle']);
$colonia=strtoupper($_POST['colonia']);
$codigo=strtoupper($_POST['codigo']);
$ciudad=strtoupper($_POST['ciudad']);
$tel=strtoupper($_POST['tel']);
$cel=strtoupper($_POST['cel']);
$correo=$_POST['correo'];
//$tramites=$_POST['tramites'];

$consulta=("UPDATE  alumno  SET matricula_interna='$matinterna', celular='$cel', correo='$correo', calle='$calle',colonia='$colonia',codigo_postal='$codigo',ciudad='$ciudad',tel_emergencia='$tel' WHERE matricula='$matricula'");

$con=mysql_query($consulta)or die ("no se pudo realizar consulta1");

//$consulta1=mysql_query("UPDATE  formulario SET tipo='$tramites' WHERE matricula='$matricula'")or die ("no se pudo realizar consulta2");


if($con){
	?>
       <section id="resultado_positivo">
	       Se guardo correctamente
          <img src="../../../Imagenes/exito.png" />
       </section>
 <?php
$consulta_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");
	$fila=mysql_fetch_array($consulta_alumno);
		$nombre=$fila['nombre'];
		$apepat=$fila['apepat'];
		$apemat=$fila['apemat'];
		$matricula=$fila['matricula'];
	}
?>
</section>




<script>
	function r() { 
		document.getElementById("limpiar").innerHTML=" ";
	}
		setTimeout ("r()", 2000); //Parametro de timpo.
</script>





<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>