<?php session_start();  if($_SESSION['estatus']=='1'){ ?>
<style type="text/css">
#numero_disp{
	color: green;
	font-size: 20px;
	font-family: "Blackoak Std","Goudy Stout";
}
</style>

<?php
include("../../../../Scripts/conexion.php");


$mat=$_GET['mat']; 
$periodo=$_GET['periodo'];
$dir=$_REQUEST['dir']; 
$prop1=$_REQUEST['prop1']; 
$prop2=$_REQUEST['prop2'];
$sup1=$_REQUEST['sup1'];
$sup2=$_REQUEST['sup2'];

if ($prop1=="") {?>
<script>
	$("#observa").html("<input src='../../../Imagenes/alumnos/guardar.png' type='image'/>");
	 $("#sinprop1").css({"background":"#fff","color":"#4f5baa"});	
</script>	
<?php }else{
	if ($prop1==$dir || $prop1==$prop2 || $prop1==$sup1 || $prop1==$sup2){ ?>
<script>
		$("#observa").html("");	
		alert("Ya esta seleccionado elige otro porfavor");

        $("#sinprop1").css({"background":"#ED6F6F","color":"#fff"});
     /*   $("#sinprop2").css({"background":"#ED6F6F","color":"#fff"});
        $("#sinsup1").css({"background":"#ED6F6F","color":"#fff"});
</script>
<?php }else{ ?>
<script>
	$("#observa").html("<input src='../../../Imagenes/alumnos/guardar.png' type='image'/>");	
	 $("#sinprop1").css({"background":"#fff","color":"#4f5baa"});	
</script>
<?php } } 
$totTodos=0;
$totDirAc=0;
$totDirAn=0;
$i=0;
$consulta_fecha=mysql_query("SELECT * FROM periodo WHERE id_periodo='$periodo'")or die (mysql_error());
$fila_fecha=mysql_fetch_array($consulta_fecha);
$fecha_iniAC=$fila_fecha['fecha_ini'];

$QperAc1=mysql_query("SELECT * FROM periodo WHERE fecha_fin<'$fecha_iniAC' ORDER BY `fecha_ini` DESC LIMIT 1 ")or die (mysql_error());
$fila_fechaAN=mysql_fetch_array($QperAc1);
$id_perAN=$fila_fechaAN['id_periodo'];
$i=0;

while ($i<2){
	if ($i==0){
		$idper=$periodo;
		$i=1;
	}else{
		$idper=$id_perAN;
		$i=2;
	}
// cuenta director
	$consulta1=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario where (formulario.sinprop1='$prop1' or formulario.sinprop2='$prop1') and tit='0' and periodo_tit='$idper'" ) or die (mysql_error());
	$cuentadir=mysql_result($consulta1, 0);

	if($idper==$periodo){
		$totDirAc=$cuentadir;
	// cuenta todos
		$consultatot=mysql_query("SELECT COUNT(formulario.matricula) FROM formulario where (formulario.director='$prop1' or formulario.sinprop1='$prop1' or formulario.sinprop2='$prop1') and tit='0' and periodo_tit='$idper'") or die (mysql_error());
		$totTodos=mysql_result($consultatot, 0);	
	}
	else{
		$totDirAn=$cuentadir;
	}
}

//OBETENER LO MAXIMOS PERMITIDOS
$conmaxdir=mysql_query("SELECT * FROM maximo WHERE institucion='CAT' AND nombre='Sinodal'");
$fila=mysql_fetch_array($conmaxdir);
$maxdir=$fila['maximo'];

$conmaxtot=mysql_query("SELECT * FROM maximo WHERE institucion='CAT' AND nombre='Total'");
$fil=mysql_fetch_array($conmaxtot);
$maxtot=$fil['maximo'];
//-----------------------

if($totDirAc<=$maxdir && $totTodos<=$maxtot ){
?>
<section id="numero_disp">
<?php print $totDirAc."-".$totDirAn."-".$totTodos; ?>
</section>
<!--
<img src="../../Imagenes/alumnos/verde.png" width="32" value="1" height="32" border="0"/>
-->
<script type="text/javascript">
	$("#observa").css("display","block");
</script>

<?php

	}elseif(($totDirAc>$maxdir && $totDirAc<=($maxdir+2))||($totTodos>$maxtot && $totTodos<=($maxtot+2))){
$dir2=$prop1."-pen";
?>
<input type="hidden" name="sinprop1" value="<?php echo $dir2; ?>" >
<section id="activa_informacion3">
	<img src="../../../Imagenes/alumnos/rojo.png" name="negativo" value="1" width="32" height="32" border="0"/>
		<script type="text/javascript">
			alert("Profesor con limite de alumnos permitidos, pendiente autorización de Experiencia Recepcional");
		</script>
</section>

<script type="text/javascript">
	$("#observa").css("display","block");
</script>

<?php print $totDirAc."-".$totDirAn."-".$totTodos; 
	}else{ 
?>
		<input type="hidden" name="sinprop1" value="<?php echo $dir2; ?>" >
<section id="activa_informacion3">
	<img src="../../../Imagenes/alumnos/rojo.png" name="negativo" value="1" width="32" height="32" border="0"/>
		<script type="text/javascript">
			alert("Profesor con limite de alumnos permitidos");
		</script>
</section>

<script type="text/javascript">
	$("#observa").css("display","none");
</script>

<?php print $totDirAc."-".$totDirAn."-".$totTodos; 
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