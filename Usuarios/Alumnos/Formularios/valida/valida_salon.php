<?php session_start(); if($_SESSION['estatus']=='1'){  include("../../../../Scripts/conexion.php"); 
/*print $fechapeticion=$_REQUEST['hora'];  
print "dir ".$dir=$_REQUEST['dir']."<br>"; 
print "prop1 ".$pro1=$_REQUEST['pro1']."<br>"; 
print "prop2 ".$pro2=$_REQUEST['pro2']."<br>"; 
print "sup1 ".$sup1=$_REQUEST['sup1']."<br>"; 
print "sup2 ".$sup2=$_REQUEST['sup2']."<br>"; 
print "fecha ".$fech=$_REQUEST['fech']."<br>"; 
print "hora ".$hora=$_REQUEST['hora']."<br>"; 

//print $matricula=$_REQUEST['matricula'];  

  $consulta_salo=mysql_query("SELECT * FROM formulario WHERE matricula='$matricula'")or die(mysql_error());*/
$consulta_salon=mysql_query("SELECT * FROM cat_salon WHERE estado='1'") or die(mysql_error());
?>     

                <select class="selectopcion" name="salon" id="salon">
                  <option></option>
                    <?php
                      while($fila_salon=mysql_fetch_array($consulta_salon)){ 
                          $id=$fila_salon['id_salon'];
                          $no_salon=$fila_salon['no_salon'];
                        ?>
                      <option value="<?php print $no_salon; ?>"><?php print $no_salon; ?>
                  </option>
                  <?php } ?>

                  

<!--valida_director,valida_prop1,valida_prop2,valida_sup1,valida_sup2-->

<script type="text/javascript">
  $(document).ready(function(){
     
    $("#salon").change(function(event){    
     var salon= $("#salon").find(':selected').val();
/*
      $("#valida_director").html("<img src='../../Imagenes/disponible.png'>");
      $("#valida_prop1").html("<img src='../../Imagenes/disponible.png'>");
      $("#valida_prop2").html("<img src='../../Imagenes/disponible.png'>");
      $("#valida_sup1").html("<img src='../../Imagenes/disponible.png'>");
      $("#valida_sup2").html("<img src='../../Imagenes/disponible.png'>");
*/
    if (salon==""){
        $("#observa").css("display","none");
        //alert("vacio"+salon);
    }else{
      $("#observa").css("display","block");
      //alert("llevo"+salon);
    }
    });
  });
</script>     


<script type="text/javascript">
  $(document).ready(function(){
    $("#salon").change(function(event){    
      var dir = $("#director").find(':selected').val();
      var pro1= $("#sinprop1").find(':selected').val();
      var pro2= $("#sinprop2").find(':selected').val();
      var sup1= $("#sinsup1").find(':selected').val();
      var sup2= $("#sinsup2").find(':selected').val();
      var fech= $("#fechaexam").val();
      var hora= $("#horaexam").find(':selected').val();
      var salon= $("#salon").find(':selected').val();
$("#verif_disp").load("valida/valida_maestros.php?dir="+dir+"&pro1="+pro1+"&pro2="+pro2+"&sup1="+sup1+"&sup2="+sup2+"&fech="+fech+"&hora="+hora+"&salon="+salon);
    });
  });
</script>
          
          
<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>