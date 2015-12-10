<?php session_start();  if($_SESSION['estatus']=='1'){?>
<style type="text/css">
#numero_disp{
	color: green;
	font-size: 20px;
	font-family: "Blackoak Std","Goudy Stout";
}
</style>

<?php include("../../../../Scripts/conexion.php");

$mat=$_GET['mat']; 
$periodo=$_GET['periodo'];
$dir=$_REQUEST['dir']; 
$prop1=$_REQUEST['prop1']; 
$prop2=$_REQUEST['prop2'];
$sup1=$_REQUEST['sup1'];
$sup2=$_REQUEST['sup2'];

if ($dir=="") {?>
<script>
	$("#observa").html("<input src='../../../Imagenes/alumnos/guardar.png' type='image'/>");
	 $("#director").css({"background":"#fff","color":"#4f5baa"});	
</script>	
<?php }else{
	if ($dir==$prop1 || $dir==$prop2 || $dir==$sup1 || $dir==$sup2){ ?>
<script>
		$("#observa").html("");	
		alert("Ya esta seleccionado elige otro porfavor");

        $("#director").css({"background":"#ED6F6F","color":"#fff"});

</script>
<?php }else{ ?>
<script>
	$("#observa").html("<input src='../../../Imagenes/alumnos/guardar.png' type='image'/>");	
	 $("#director").css({"background":"#fff","color":"#4f5baa"});	
</script>
<?php } } 

$consulta1=mysql_query("SELECT COUNT(director) FROM formulario WHERE director='$dir' and periodo_tit='$periodo'  ");
	$fila=mysql_fetch_array($consulta1);
		$cuenta=$fila['COUNT(director)'];

		if($cuenta < 6 ){

			 // include("informacion_hora.php");	  
?>

<section id="numero_disp">
<?php print $cuenta; ?>
</section>
<!--
<img src="../../Imagenes/alumnos/verde.png" width="32" value="1" height="32" border="0"/>
-->
<script type="text/javascript">
	$("#observa").css("display","block");
</script>

<?php

	}elseif($cuenta>=6 && $cuenta<=8){
		$dir2=$dir."-pen";
?>
<input type="hidden" name="director" value="<?php echo $dir2; ?>" >
<section id="activa_informacion3">
	<img src="../../../Imagenes/alumnos/rojo.png" name="negativo" value="1" width="32" height="32" border="0"/>
		<script type="text/javascript">
			alert("Profesor con limite de alumnos permitidos, pendiente autorización de Experiencia Recepcional");
		</script>
</section>

<script type="text/javascript">
	//$("#observa").css("display","none");
</script>

<?php print $cuenta;
	}else{ 
?>
		<input type="hidden" name="director" value="<?php echo $dir2; ?>" >
<section id="activa_informacion3">
	<img src="../../../Imagenes/alumnos/rojo.png" name="negativo" value="1" width="32" height="32" border="0"/>
		<script type="text/javascript">
			alert("Profesor con limite de alumnos permitidos");
		</script>
</section>

<script type="text/javascript">
	$("#observa").css("display","none");
</script>

<?php print $cuenta;
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
