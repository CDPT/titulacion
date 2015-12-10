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
$nuper=$_GET['nuper']; 
//$periodo=$_GET['periodo'];

$se=mysql_query("SELECT periodo_tit FROM formulario WHERE matricula='$mat'") or die('hay un error');
$pe=mysql_fetch_array($se);
$s=$pe['periodo_tit'];

if ($s!=false || $s!=0 || $s!='') { ?>
	<!--print "hay algo";-->
<script type="text/javascript">
var num=<?php print $nuper; ?>;
	if (confirm("¿Deseas Cambiar de periodo? \n Ya que tendras que elegir de nuevo a todos los Docentes")) {
		

		document.getElementById('sinprop1').selectedIndex =0;
		document.getElementById('sinprop2').selectedIndex=0;
		document.getElementById('sinsup1').selectedIndex=0;
		document.getElementById('sinsup2').selectedIndex=0;
		document.getElementById('fechaexam').value='';
		document.getElementById('horaexam').selectedIndex=0;
		document.getElementById('horaexam').value='';
		document.getElementById('salon').selectedIndex=0;
		document.getElementById('salon').value='';
		document.getElementById('seccion_salon').style.display='none';

		document.getElementById('valida_sum_dir').innerHTML="";
		document.getElementById('valida_director').innerHTML="";

		document.getElementById('valida_sum_prop1').innerHTML="";
		document.getElementById('valida_prop1').innerHTML="";

		document.getElementById('valida_sum_prop2').innerHTML="";
		document.getElementById('valida_prop2').innerHTML="";

		document.getElementById('valida_sum_sup1').innerHTML="";
		document.getElementById('valida_sup1').innerHTML="";

		document.getElementById('valida_sum_sup2').innerHTML="";
		document.getElementById('valida_sup2').innerHTML="";	

		document.getElementById('valida_salon').innerHTML="";	
		
	}else{ 
		document.getElementById('periodo_tit').selectedIndex=num;
	
	}
</script>	
<?php }else{?>
	<!--print "nada";-->
<?php } ?>




<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>
