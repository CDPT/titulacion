<html>
<head>
	<meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
	<script language="Javascript"> 
if (window.print) window.print() 
else alert("Para imprimir presione Crtl+P."); 
</script>


<SCRIPT LANGUAGE="JavaScript">
if (window.print)
window.print()
else
alert("Disculpe, su navegador no soporta esta opción.");
</SCRIPT>

<style type="text/css">
	body{
		margin-left: 50px;
		margin-right: 50px;
		width: 33.5cm;
		font-size:16px;
		padding-top: 0px;
	}
	table{
		font-size: 9pt;
		text-align: center;
	}
	#imagen{
	position:absolute;
	width:50px;
	height:50px;
	top:30px;
	left:1000px;
	color:#fff;
}
#imagen2{
	position:absolute;
	width:50px;
	height:50px;
	top:20px;
	left:50px;
	color:#fff;
}
#contenido{
	position:relative;
	height:90%;
	width:100%;
	text-align: justify;
}
</style>
</head>
<body>
	<?php
	$periodo=$_GET['periodo'];
	$carrera=$_GET['carrera'];
	$tramite=$_GET['tramite'];
?>
<?php 
	date_default_timezone_set('America/Mexico_City' ) ; 
	$tiempo = localtime(time(), true); 
	$dia = $tiempo["tm_mday"]; 
	$mes = $tiempo["tm_mon"]+1; 
	$year = $tiempo["tm_year"]+1900; 

	switch($mes){ 
	case "1": $mes_nombre="Enero"; break; 
	case "2": $mes_nombre="Febrero"; break; 
	case "3": $mes_nombre="Marzo"; break; 
	case "4": $mes_nombre="Abril"; break; 
	case "5": $mes_nombre="Mayo"; break; 
	case "6": $mes_nombre="Junio"; break; 
	case "7": $mes_nombre="Julio"; break; 
	case "8": $mes_nombre="Agosto"; break; 
	case "9": $mes_nombre="Septiembre"; break; 
	case "10": $mes_nombre="Octubre"; break; 
	case "11": $mes_nombre="Noviembre"; break; 
	case "12": $mes_nombre="Diciembre"; break; 
	} 

	include("../../../Scripts/conexion.php");

	if ($periodo==" "){
		$nombre_periodo="Todos";
	}else{
		$consultaperiodo=mysql_query("SELECT periodo FROM periodo where id_periodo=$periodo");
			$fi=mysql_fetch_array($consultaperiodo);
		$nombre_periodo=$fi['periodo'];
	}

	if($carrera==" "){$nombre_carrera="Todas";} else{$nombre_carrera=$carrera;}

	if ($tramite==""){$nombre_tramite="todos";} else {$nombre_tramite=$tramite;}
?>


<div id="imagen">
   <img src="../../../pdf/logocat.png" width="110px" height="80px"/>
	</div>
	<div id="imagen2">
   <img src="../../../pdf/uv.jpg"  width="100px" height="100px"/>
	</div>
	<div id="contenido">
		<br>
		<p align="center"><b>UNIVERSIDAD VERACRUZANA</br>
	FACULTAD DE CONTADURÍA Y ADMINISTRACIÓN</b></p></br>
	<p align="Center"><b>REPORTE GENERAL</b></br></p>
	<p align="right">Xalapa, Ver a<?php echo $dia." de ".$mes_nombre." del ".$year;?></p></br>

	<p align="rigjt"><b style="text-transform:uppercase;">PERIODO: <?php echo $nombre_periodo ?></br>
		<b style="text-transform:uppercase;">CARRERA: <?php echo $nombre_carrera ?></br>
		<b style="text-transform:uppercase;">TRAMITE: <?php echo $nombre_tramite ?></br>	
	<table border="1" cellspacing="0">
	<tr>
		<td><b>Matricula</b></td>
		<td><b>Nombre</b></td>
		<?php if ($periodo==" "){echo "<td><b>Periodo</b></td>";}?>
		<?php if ($carrera==" "){echo "<td><b>Carrera</b></td>";}?>
		<td><b>No. de Ins.</b></td>
		<td><b>Modalidad</b></td>
		<td><b>Director</b></td>
		<td><b>Titulo de Trabajo</b></td>
		<td><b>Submodalidad</b></td>
		<td><b>Sinodal 1</b></td>
		<td><b>Sinodal 2</b></td>
		<td><b>Suplente 1</b></td>
		<td><b>Suplente 2</b></td>
		<td><b>ER-1</b></td>
		<td><b>Protocolo/ Fecha Examen</b></td>
		<td><b>ER-2</b></td>
		<td><b>ER-2-2</b></td>
		<td><b>ER-3</b></td>
		<td><b>ER-4 Sinodal 1</b></td>
		<td><b>ER-4 Sinodal 2</b></td>
		<td><b>ER-5 Fecha de Examen</b></td>
		<td><b>ER-6</b></td>
		<td><b>Calif</b></td>
		<?php if ($tramite==""){echo "<td><b>Tramites</b></td>";}?>
		

	</tr>

		<?php
		if($periodo==" " && $carrera==" " && $tramite==""){
			//todos
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula order by carrera, apepat") or die ("No se puede consultar la matricula");
		}elseif ($periodo==" " && $carrera==" " && $tramite!="") {
			//por tramite
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where formulario.tipo='$tramite' order by carrera, apepat") or die ("No se puede consultar la matricula");
		}elseif($periodo==" " && $carrera!=" " && $tramite==""){
			//por carrera
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where alumno.carrera='$carrera' order by apepat") or die ("No se puede consultar la matricula");
		}elseif ($periodo==" " && $carrera!=" " && $tramite!="") {
			//por carrera y tramite
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where alumno.carrera='$carrera' and formulario.tipo='$tramite' order by apepat") or die ("No se puede consultar la matricula");
		}elseif ($periodo!=" " && $carrera==" " && $tramite=="") {
			//por periodo
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where formulario.periodo_tit='$periodo' order by carrera, apepat") or die ("No se puede consultar la matricula");
		}elseif($periodo!=" " && $carrera!=" " && $tramite=="") {
			//por periodo y carrera
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where formulario.periodo_tit='$periodo' and alumno.carrera='$carrera' order by carrera, apepat") or die ("No se puede consultar la matricula");
		}elseif ($periodo!=" " && $carrera==" " && $tramite!="") {
			//por periodo y tramite
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where formulario.periodo_tit='$periodo' and formulario.tipo='$tramite' order by carrera, apepat") or die ("No se puede consultar la matricula");
		}else{
			//por perido, carrera y tramite
			$consula_matricula=mysql_query("SELECT * FROM formulario inner join alumno on formulario.matricula=alumno.matricula where formulario.periodo_tit='$periodo' and alumno.carrera='$carrera' and formulario.tipo='$tramite' order by carrera, apepat") or die ("No se puede consultar la matricula");
		}
		?>
<?php
$i=1;
$adm=0;
$cont=0;
$sis=0;
$ges=0;
$trab=0;
$cen=0;
$eer1=0;
$ep=0;
$eer2=0;
$eer22=0;
$eer3=0;
$vsp1=0;
$vsp2=0;

while($filamat=mysql_fetch_array($consula_matricula)){
$matricula=$filamat['matricula'];
$tipo=$filamat['tipo'];
$director=$filamat['director'];
$sinprop1=$filamat['sinprop1'];
$sinprop2=$filamat['sinprop2'];
$sinsup1=$filamat['sinsup1'];
$sinsup2=$filamat['sinsup2'];
$titulotrab=$filamat['titulotrab'];
$modalidad=$filamat['modalidad'];
$nombre=$filamat['nombre'];
$apepat=$filamat['apepat'];
$apemat=$filamat['apemat'];
$carrera_alu=$filamat['carrera'];
$id_pe=$filamat['periodo_tit'];


if ($carrera=="LA"){$adm=$adm+1;}
elseif ($carrera=="LC"){$cont=$cont+1;}
elseif ($carrera=="LS"){$sis=$sis+1;}
elseif ($carrera=="LN"){$ges=$ges+1;}


                        $consudir=mysql_query("SELECT * FROM profesor WHERE no_personal='$director' ");
                          $di=mysql_fetch_array($consudir);
                          $nomb=$di['nombre'];
                          $pate=$di['apellido_paterno'];
                          $mate=$di['apellido_materno'];
                          $noper=$di['no_personal'];
                          $director_nom=$nomb." ".$pate." ".$mate;
                        $co=mysql_query("SELECT * FROM profesor WHERE no_personal='$sinprop1'");
                          $con=mysql_fetch_array($co);
                          $no=$con['nombre'];
                          $ap=$con['apellido_paterno'];
                          $ma=$con['apellido_materno'];
                          $sinprop1_nom=$no." ".$ap." ".$ma;
                        $co2=mysql_query("SELECT * FROM profesor WHERE no_personal='$sinprop2'");
                          $con2=mysql_fetch_array($co2);
                          $no2=$con2['nombre'];
                          $ap2=$con2['apellido_paterno'];
                          $ma2=$con2['apellido_materno'];
                          $sinprop2_nom=$no2." ".$ap2." ".$ma2;
						$co3=mysql_query("SELECT * FROM profesor WHERE no_personal='$sinsup1'");
                          $con3=mysql_fetch_array($co3);
                          $no3=$con3['nombre'];
                          $ap3=$con3['apellido_paterno'];
                          $ma3=$con3['apellido_materno'];
                          if ($no3==""){ $sinsup1_nom="-";}
                          else{
                          	$sinsup1_nom=$no3." ".$ap3." ".$ma3;}
                        $co4=mysql_query("SELECT * FROM profesor WHERE no_personal='$sinsup2'");
                          $con4=mysql_fetch_array($co4);
                          $no4=$con4['nombre'];
                          $ap4=$con4['apellido_paterno'];
                          $ma4=$con4['apellido_materno'];
                          $sinsup2_nom=$no4." ".$ap4." ".$ma4;
                        $consuper=mysql_query("SELECT * FROM periodo WHERE id_periodo='$id_pe'");
                          $pec=mysql_fetch_array($consuper);
                          $nom_pe=$pec['periodo'];
                          if($nom_pe==""){$nom_pe="-";}

$con=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula'");
$f1=mysql_fetch_array($con);
$submodalidad=$f1['submodalidad'];
$inscripcion=$f1['inscripcion'];
$er1=$f1['er1'];
$protocolo=$f1['protocolo'];
$er2=$f1['er2'];
$er22=$f1['er22'];
$er3=$f1['er3'];
$er4=$f1['er4'];
$er41=$f1['er41'];
$er5=$f1['er5'];
$er6=$f1['er6'];
$calificacion=$f1['calificacion'];

if ($submodalidad=="Trabajo"){$trab=$trab+1;}
elseif ($submodalidad=="Ceneval"){$cen=$cen+1;}


if ($er1=='0000-00-00' or $er1==""){$er1="-";} else{$eer1=$eer1+1;}
if ($protocolo=='0000-00-00' or $protocolo==""){$protocolo="-";} else{$ep=$ep+1;}
if ($er2=='0000-00-00' or $er2==""){$er2="-";} else{$eer2=$eer2+1;}
if ($er22=='0000-00-00' or $er22==""){$er22="-";} else{$eer22=$eer22+1;}
if ($er3=='0000-00-00' or $er3==""){$er3="-";} else{$eer3=$eer3+1;}
if ($er4=='0000-00-00' or $er4==""){$er4="-";} else{$vsp1=$vsp1+1;}
if ($er41=='0000-00-00' or $er41==""){$er41="-";} else{$vsp2=$vsp2+1;}
if ($er5=='0000-00-00' or $er5==""){$er5="-";}

if ($inscripcion==""){$inscripcion="-";}
if ($modalidad==""){$modalidad="-";}
if ($director_nom=="  "){$director_nom="-";} 
if ($titulotrab==""){$titulotrab="-";}
if ($submodalidad==""){$submodalidad="-";}
if ($sinprop1_nom=="  "){$sinprop1_nom="-";}
if ($sinprop2_nom=="  "){$sinprop2_nom="-";}
if ($sinsup2_nom=="  "){$sinsup2_nom="-";}
if ($er6==""){$er6="-";}
if ($calificacion==""){$calificacion="-";}
if ($tipo==""){$tipo="-";}

	$numregistro= mysql_num_rows($consula_matricula);
?>

	<tr>
		<td><?php echo $matricula; ?></td>
		<td ><?php echo $apepat." ".$apemat." ".$nombre; ?></td>
		<?php if ($periodo==" "){echo "<td ><br>".$nom_pe."<br></td>";}?>
		<?php if ($carrera==" "){echo "<td ><br>".$carrera_alu."<br></td>";}?>
		<td ><?php echo $inscripcion; ?></td>
		<td ><?php echo $modalidad; ?></td>
		<td ><?php echo $director_nom; ?></td>
		<td ><?php echo $titulotrab; ?></td>
		<td ><?php echo $submodalidad; ?></td>
		<td ><?php echo $sinprop1_nom; ?></td>
		<td ><?php echo $sinprop2_nom; ?></td>
		<td ><?php echo $sinsup1_nom; ?></td>
		<td ><?php echo $sinsup2_nom; ?></td>
		<td ><?php echo $er1; ?></td>
		<td ><?php echo $protocolo; ?></td>
		<td ><?php echo $er2; ?></td>
		<td ><?php echo $er22; ?></td>
		<td ><?php echo $er3; ?></td>
		<td ><?php echo $er4;  ?></td>
		<td ><?php echo $er41; ?></td>
		<td ><?php echo $er5; ?></td>
		<td ><?php echo $er6; ?></td>
		<td ><?php echo $calificacion; ?></td>
		<?php if ($tramite==""){echo "<td ><br>".$tipo."<br></td>";}?>
	</tr>

<?php $i=$i+1; } ?>
</table>

<?php 
	echo "<br><strong>TOTAL DE INSCRITOS EN ESTE PERIODO: </strong>".$numregistro."<br>";
	if ($carrera=="0"){
		echo "<br><strong>Total de incritos de la carrera de Administración: </strong>".$adm."<br>";
		echo "<strong>Total de incritos de la carrera de Contaduría: </strong>".$cont."<br>";
		echo "<strong>Total de incritos de la carrera de Sistemas: </strong>".$sis."<br>";
		echo "<strong>Total de incritos de la carrera de Gestión: </strong>".$ges."<br>";
	}
	echo "<br><strong>Total de alumnos que realizan Trabajo: </strong>".$trab."<br>";
	echo "<strong>Total de alumnos que realizan Ceneval: </strong>".$cen."<br>";
	echo "<br><strong>Total de alumnos que entregaron ER1: </strong>".$eer1."<br>";
	echo "<strong>Total de alumnos que entregaron Protocolo: </strong>".$ep."<br>";
	echo "<strong>Total de alumnos que entregaron ER2: </strong>".$eer2."<br>";
	echo "<strong>Total de alumnos que entregaron ER2-2: </strong>".$eer22."<br>";
	echo "<strong>Total de alumnos que entregaron ER3: </strong>".$eer3."<br>";
	echo "<strong>Total de alumnos que entregaron Voto Sinodal Propietario 1: </strong>".$vsp1."<br>";
	echo "<strong>Total de alumnos que entregaron Voto Sinodal Propietario 2: </strong>".$vsp2."<br>";
?>
</div>
</body>
</html>
