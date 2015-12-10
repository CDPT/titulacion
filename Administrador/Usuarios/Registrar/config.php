<style type="text/css">

  .mensaje_error{
    background:#fe6d66;
    margin-top:-10px;
    padding: -5px 0px 40px 0px;
  }

  .mensaje_acepta{
    background:#43f743;
    margin-top:-10px;
  }
  .mensaje_error .texto{
    color: #fff;
  }


</style>

<?php
include("../Scripts/conexion.php");


class Buscador{
    function Conectar(){
     }
	 
    function Buscar($q){		
		//$query=mysql_query("SELECT * FROM estudiantes WHERE matricula LIKE '%$q%'");

    $consulta=mysql_query("SELECT usuario FROM usuarios WHERE usuario='$q' ");
    $coincidencia=mysql_num_rows($consulta);

    if($coincidencia != 0){
?>

  <section class="mensaje_error">
      <label class="texto">Probar con otro Usuario</label>
      <img src="../Imagenes/error.png">
  </section>

<?php      
    }else{
      ?>

 <section class="mensaje_acepta">
  <label class="texto">Usuario Disponible</label> 
  <img src="../Imagenes/exito.png">
 </section>

  <?php
    }


      }
}

?>
