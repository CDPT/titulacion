<?php session_start();  if($_SESSION['estatus']=='1'){
	include("../../../../Scripts/conexion.php");

	$dir=$_REQUEST['dir']; 
	$op=$_REQUEST['op'];

$sel=mysql_query("SELECT id_ca FROM profesor WHERE no_personal='$dir' ") or die("Existe un error"); 
$num=mysql_fetch_array($sel);
$n=$num['id_ca'];

if ($n!='0' && $n!=' ') {

$co=mysql_query("SELECT * FROM profesor WHERE id_ca='$n' "); ?>

<script type="text/javascript">
    if (confirm('¿Desea elegir los Docentes del mismo Cuerpo Académico?')) {

        $('#tipoca').html("<input type='text' id='ca' name='ca' value='1'>");
        $('#eleccion').show();
        $('#sica').hide();
        $('#tit1').html("Codirector");
        $('#tit2').html("Sinodal Propietario 1");

	}else{

        $('#eleccion').show();
        $('#sica').show();
        $('#tipoca').html("<input type='text' id='ca' value='0'>");
        $('#tit1').html("Sinodal Propietario 1");
        $('#tit2').html("Sinodal Propietario 2");
    }
</script>

<?php

}else{ ?>
<script type="text/javascript">
    $('#eleccion').show();
    $('#sica').show();
    $('#tipoca').html("<input type='text' id='ca' value='0'>");
    $('#tit1').html("Sinodal Propietario 1");
    $('#tit2').html("Sinodal Propietario 2");
</script>

<?php }


}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.php");

  </script>
<?php } ?>
