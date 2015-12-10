<?php   
  session_start();
  error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="author" content="Víctor Javier Báez Morales">
  <meta charset="utf-8" lang="esp" http-equiv="Content-Type" content="text/html;">
  <meta name="keywords" lang="es" content="CAT, Centro, Apoyo, Titulación">
  <link href="../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>



  <?php $sistema="EXP"; include('../../Includes/ruta.php'); include('../../Includes/title.php');  ?>
  <script type="text/javascript" src="../../Scripts/FuncionesAjax.js"></script>
  <script type="text/javascript" src="../../Scripts/FuncionesjQuery.js"></script>






  <style type="text/css">
    #op7{
          background:#044b89;
          border-radius:0px 0px 10px 10px;
          border:3px solid #033663;
          font-weight: bold;
          box-shadow: 0 0 7px 1px #9dcaf1;
    }


    #cuerpo_respaldo{
      margin-right:auto;
      margin-left:auto;
      text-align:center;
    }

    .titulo{
      font-size:20px;
      color: #005baa;
      margin-bottom:50px;
    }
  </style>


</head>

<?php
  session_start();

    

    if($_SESSION['estatus']==1){
      include("../../Scripts/conexion.php");
    
?>
<body  oncontextmenu="return false">

  <section id="global">

    <header id="baner">
      <?php include ("../../Includes/header.php"); ?>

              <aside id="engloba_notificacion">
                  <aside id="notificaciones">
                        <?php include ('../../Includes/salir.php'); ?>
            </aside>
          </asid>

      </header>

    <nav id="global_menu">
      <nav id="marco_menu">
        <ul>
          <?php include ("../../Menus/menu_experiencia.php"); ?>
        </ul>
      </nav>
    </nav>



    <section id="engloba_cuerpo">


      <section id="cuerpo">




              <section id="cuerpo_respaldo">

          <section class="titulo">Respaldos Realizados Anteriormente</section>


              <?php   
              $dir = (isset($_GET['dir']))?$_GET['dir']:"/xampp/htdocs/CAT_nuevo/Respaldos";
              $directorio=opendir($dir); 
              echo "<b>Directorio actual:</b><br>$dir<br>"; 
              echo "<b>Archivos:</b><br>"; 


              while ($archivo = readdir($directorio)) { 
                if($archivo == '.')
                  echo "<a href=\"?dir=.\">$archivo</a><br>"; 
                elseif($archivo == '..'){ 
                  if($dir != '.'){ 
                    $carpetas = split("/",$dir); 
                    array_pop($carpetas); 
                    $dir2 = join("/",$carpetas); 
                    echo "<a href=\"?dir=$dir2\">$archivo</a><br>"; 
                  } 
                }
                elseif(is_dir("$dir/$archivo"))
                  echo "<a href=\"?dir=$dir/$archivo\">$archivo</a><br>"; 
                else echo "$archivo<br>"; 
              } 

              
              closedir($directorio); 
              ?>
              </section>




      </section>  
      
    
    </section>

  </section>



<footer id="pie_pagina">
<?php include ('../../Includes/pie_pagina.php'); ?>
</footer>

</body>
<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../index.html? var=0");
  </script>
<?php } ?>
</html>
