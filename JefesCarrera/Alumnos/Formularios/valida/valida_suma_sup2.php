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



if ($sup2=="") {?>
<script>
	$("#observa").html("<input src='../../../../Imagenes/alumnos/guardar.png' type='image'/>");
	 $("#sinsup2").css({"background":"#fff","color":"#4f5baa"});	
</script>	
<?php }else{
	if ($sup2==$dir || $sup2==$prop1 || $sup2==$prop2 || $sup2==$sup1){ ?>
<script>
		$("#observa").html("");	
		alert("Ya esta seleccionado elige otro porfavor");

       // $("#sinprop1").css({"background":"#ED6F6F","color":"#fff"});
       //$("#sinprop2").css({"background":"#ED6F6F","color":"#fff"});
       //  $("#sinsup1").css({"background":"#ED6F6F","color":"#fff"});
       $("#sinsup2").css({"background":"#ED6F6F","color":"#fff"});
</script>
<?php }else{ ?>
<script>
	$("#observa").html("<input src='../../../../Imagenes/alumnos/guardar.png' type='image'/>");	
	 $("#sinsup2").css({"background":"#fff","color":"#4f5baa"});	
</script>
<?php } } 

}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>