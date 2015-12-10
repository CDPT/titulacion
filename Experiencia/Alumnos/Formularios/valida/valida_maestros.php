<?php session_start(); if($_SESSION['estatus']=='1'){  include("../../../../Scripts/conexion.php"); 

$dir=$_REQUEST['dir']; 
$pro1=$_REQUEST['pro1']; 
$pro2=$_REQUEST['pro2']; 
$sup1=$_REQUEST['sup1']; 
$sup2=$_REQUEST['sup2']; 
$fech=$_REQUEST['fech']; 
$hora=$_REQUEST['hora']; 
$salon=$_REQUEST['salon']; 
 
  $con_salon=mysql_query("SELECT matricula FROM formulario WHERE fechaexam='$fech' AND 
                                                         horaexam='$hora' AND 
                                                         salon='$salon' ")or die(mysql_error());


/*
  $con_dir=mysql_query("SELECT matricula FROM formulario WHERE director='$dir' AND
                                                       fechaexam='$fech' AND 
                                                       horaexam='$hora' AND 
                                                       salon='$salon' ")or die(mysql_error());*/

  $con_dir=mysql_query("SELECT matricula FROM formulario WHERE fechaexam='$fech' AND horaexam='$hora' AND
                                                              ( director='$dir' or
                                                               sinprop1='$dir' or
                                                               sinprop2='$dir' or 
                                                               sinsup1='$dir' or
                                                               sinsup2='$dir')
                                                                 ")or die(mysql_error());

/*
  $con_prop1=mysql_query("SELECT * FROM formulario WHERE sinprop1='$pro1' AND
                                                       fechaexam='$fech' AND
                                                       horaexam='$hora' AND 
                                                       salon='$salon' ")or die(mysql_error());*/


  $con_prop1=mysql_query("SELECT matricula FROM formulario WHERE fechaexam='$fech' AND horaexam='$hora' AND
                                                              ( director='$pro1' or
                                                               sinprop1='$pro1' or
                                                               sinprop2='$pro1' or 
                                                               sinsup1='$pro1' or
                                                               sinsup2='$pro1')
                                                                 ")or die(mysql_error());




/*
  $con_prop2=mysql_query("SELECT matricula FROM formulario WHERE sinprop2='$pro2' AND
                                                       fechaexam='$fech' AND
                                                       horaexam='$hora' AND 
                                                       salon='$salon' ")or die(mysql_error());*/
  $con_prop2=mysql_query("SELECT matricula FROM formulario WHERE fechaexam='$fech' AND horaexam='$hora' AND
                                                              ( director='$pro2' or
                                                               sinprop1='$pro2' or
                                                               sinprop2='$pro2' or 
                                                               sinsup1='$pro2' or
                                                               sinsup2='$pro2')
                                                                 ")or die(mysql_error());




/*
  $con_sup1=mysql_query("SELECT matricula FROM formulario WHERE sinsup1='$sup1' AND
                                                       fechaexam='$fech' AND
                                                       horaexam='$hora' AND 
                                                       salon='$salon' ")or die(mysql_error());*/


  $con_sup1=mysql_query("SELECT matricula FROM formulario WHERE fechaexam='$fech' AND horaexam='$hora' AND
                                                              ( director='$sup1' or
                                                               sinprop1='$sup1' or
                                                               sinprop2='$sup1' or 
                                                               sinsup1='$sup1' or
                                                               sinsup2='$sup1')
                                                                 ")or die(mysql_error());
/*
  $con_sup2=mysql_query("SELECT matricula FROM formulario WHERE sinsup2='$sup2' AND  
                                                       fechaexam='$fech' AND
                                                       horaexam='$hora' AND 
                                                       salon='$salon' ")or die(mysql_error());*/
  $con_sup2=mysql_query("SELECT matricula FROM formulario WHERE fechaexam='$fech' AND horaexam='$hora' AND
                                                              ( director='$sup2' or
                                                               sinprop1='$sup2' or
                                                               sinprop2='$sup2' or 
                                                               sinsup1='$sup2' or
                                                               sinsup2='$sup2')
                                                                 ")or die(mysql_error());
 

print $coincide_dir=mysql_num_rows($con_dir)or die(mysql_error());
print $coincide_prop1=mysql_num_rows($con_prop1)or die(mysql_error());
print $coincide_prop2=mysql_num_rows($con_prop2)or die(mysql_error());
print $coincide_sup1=mysql_num_rows($con_sup1)or die(mysql_error());
print $coincide_sup2=mysql_num_rows($con_sup2)or die(mysql_error());

print $coincide_salon=mysql_num_rows($con_salon)or die(mysql_error());

/**/
if ($coincide_dir != 0) {?>
<script>
     $("#valida_director").html("<img src='../../../Imagenes/error.png'>"); 
     $("#observa").css("display","none");
</script>
<?php }else{ ?>
<script>
     $("#valida_director").html("<img src='../../../Imagenes/exito.png'>");
</script>
<?php } ?>   


<?php if ($coincide_prop1 != 0) {?>
<script>$("#valida_prop1").html("<img src='../../../Imagenes/error.png'>"); $("#observa").css("display","none");</script>
<?php }else{ ?>
<script>$("#valida_prop1").html("<img src='../../../Imagenes/exito.png'>");</script>
<?php } ?> 

<?php if ($coincide_prop2 != 0) {?>
<script>$("#valida_prop2").html("<img src='../../../Imagenes/error.png'>"); $("#observa").css("display","none");</script>
<?php }else{ ?>
<script>$("#valida_prop2").html("<img src='../../../Imagenes/exito.png'>");</script>
<?php } ?> 

<?php if ($coincide_sup1 != 0) {?>
<script>$("#valida_sup1").html("<img src='../../../Imagenes/error.png'>"); $("#observa").css("display","none");</script>
<?php }else{ ?>
<script>$("#valida_sup1").html("<img src='../../../Imagenes/exito.png'>");</script>
<?php } ?> 

<?php if ($coincide_sup2 != 0) {?>
<script>$("#valida_sup2").html("<img src='../../../Imagenes/error.png'>"); $("#observa").css("display","none");</script>
<?php }else{ ?>
<script>$("#valida_sup2").html("<img src='../../../Imagenes/exito.png'>");</script>
<?php } ?> 

<?php if ($coincide_salon != 0) {?>
<script>$("#valida_salon").html("<img src='../../../Imagenes/error.png' title='Salon Ocupado'>"); $("#observa").css("display","none");</script>
<?php }else{ ?>
<script>$("#valida_salon").html("<img src='../../../Imagenes/exito.png'>");</script>
<?php } ?> 


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>