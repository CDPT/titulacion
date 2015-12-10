<?php session_start(); if($_SESSION['estatus']=='1'){ 
include("../../../Scripts/conexion.php");

	$inicio=$_POST['fechaini'];
	$fin=$_POST['fechafin'];
	$a=$_POST['aa'];
	$a2=$_POST['aaa'];

	$fecha_ini=$inicio.$a;
	$fecha_fin=$fin.$a2;

$perio=$fecha_ini."-".$fecha_fin;

  //print $fecha_ini."-".$fecha_fin;
 
 
 $val="SELECT * FROM periodo WHERE periodo='$perio'";

 	 $vali=mysql_query($val);

     $coin=mysql_num_rows($vali);
 
		 if($coin){
				// print "no pudes guardar porque ya existe";
		}else{
		   // print "si esta disponible";
			
		    $consulta=("INSERT INTO periodo (periodo,estatus) VALUES('$perio','1')");
		    $insert=mysql_query($consulta)or die ("NO SE REALIZO LA CONSULTA");;
			 if($insert){
				 // print 'SE GURDO CON EXITO';
				?> 
					 <script>
						alert("SE GUARDO EXITOSAMENTE");
						//document.location=("../Cursos/index.php");
						document.location.href=("listado_periodos.php");
					</script>
 
				  <?php
				  
			 }else{
				//  print "NO SE PUDO REALIZAR LA CONSULTA INTENTELO DE NUEVO";
			}
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