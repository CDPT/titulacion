<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<?php include("../../../../Scripts/conexion.php");
$dir=$_GET['dir'];
	//$consulta_sin1=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula' ");
	$consulta_sinp1=mysql_query("SELECT * FROM profesor where no_personal!='$dir' order by nombre");
?>

<select class="selectopcion" name="sinprop1"  id="sinprop1">
<option></option>
<?php
                while($fil=mysql_fetch_array($consulta_sinp1)){
	               $nom=$fil['nombre'];
                 $pat=$fil['apellido_paterno'];
                 $mat=$fil['apellido_materno'];
	               $dir=$nom." ".$pat." ".$mat;
			           $nosup1=$fil['no_personal'];
              ?>
              <option id="op" value="<?php print $nosup1?>"><?php print $dir ;?>
              <?php
	              }
           //mysql_free_result($rconsulta);
            //mysql_close();
               ?>
              </option>
</select>




<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>
