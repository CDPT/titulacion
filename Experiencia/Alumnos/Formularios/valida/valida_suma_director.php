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
$submodalidad=$_GET['submodalidad'];
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
<?php }else{    ?>
<script>
	$("#observa").html("<input src='../../../Imagenes/alumnos/guardar.png' type='image'/>");	
	 $("#director").css({"background":"#fff","color":"#4f5baa"});	
</script>
<?php } } 
if($submodalidad=="Trabajo"){
$totTodos=0;
$periodo1=$periodo-1;
$totDirAc=0;
$totDirAn=0;
$QperAc1=mysql_query("Select * FROM periodo WHERE  estado='1' ORDER BY fecha_ini DESC  ")or die (mysql_error());

$i=0;

while ($resul1=mysql_fetch_array($QperAc1)){
	$idper=$resul1['id_periodo'];
	if($idper==45)
		$i=2;
	if($periodo==$idper OR $i==1){
		$i=$i+1;

// cuenta ER
$consulta1=mysql_query("SELECT COUNT(formulario.matricula) as er FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where formulario.director='$dir'  and formulario_er.submodalidad='Trabajo' and tit='0' and periodo_tit='$idper'" ) or die (mysql_error());
	$cuentadir=mysql_result($consulta1, 0);
	$n1=mysql_fetch_array($consulta1);

// cuenta director CAT
$consulta11=mysql_query("SELECT COUNT(formulario.matricula) as cat FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where formulario.director='$dir' and tit='0' and periodo_tit='$idper' " ) or die (mysql_error());
	$cuentadir1=mysql_result($consulta11, 0);	
	$n2=mysql_fetch_array($consulta11);

// cuenta todos ER
$consultatot=mysql_query("SELECT COUNT(formulario.matricula) as er FROM formulario inner join formulario_er on formulario.matricula=formulario_er.matricula where (formulario.director='$dir' or formulario.sinprop1='$dir' or formulario.sinprop2='$dir') and formulario_er.submodalidad='Trabajo' and tit='0' and periodo_tit='$idper'") or die (mysql_error());
	$cuentatot=mysql_result($consultatot, 0);

// cuenta todos CAT	
	$consultatot1=mysql_query("SELECT COUNT(formulario.matricula) as cat FROM formulario inner join formulario_cat on formulario.matricula=formulario_cat.matricula where (formulario.director='$dir' or formulario.sinprop1='$dir' or formulario.sinprop2='$dir') and tit='0' and periodo_tit='$idper' ") or die (mysql_error());
	$cuentatot1=mysql_result($consultatot1, 0);	


	if($idper==$periodo){
		$totDirAc=$cuentadir+$cuentadir1;
		$totTodos=$cuentatot1+$cuentatot+$totTodos;
	}
	else{
		$totDirAn=$cuentadir+$cuentadir1;
		$totDirec=$totDirAc+$totDirAn;
		break;
	}	
	}
	}
//OBETENER LO MAXIMOS PERMITIDOS
$conmaxdir=mysql_query("SELECT * FROM maximo WHERE institucion='ER' AND nombre='Director'");
$fila=mysql_fetch_array($conmaxdir);
$maxdir=$fila['maximo'];

$conmaxtot=mysql_query("SELECT * FROM maximo WHERE institucion='ER' AND nombre='Total'");
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
		$dir2=$dir."-pen";
?>
<input type="hidden" name="director" value="<?php echo $dir2; ?>" >
<section id="activa_informacion3">
	<img src="../../../Imagenes/alumnos/rojo.png" name="negativo" value="1" width="32" height="32" border="0"/>
		<script type="text/javascript">
			alert("Profesor con limite de alumnos permitidos, pendiente de autorización");
		</script>
</section>

<script type="text/javascript">
	$("#observa").css("display","block");
</script>

<?php print $totDirAc."-".$totDirAn."-".$totTodos;
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

<?php print $totDirAc."-".$totDirAn."-".$totTodos;
	}}

?>



<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>
