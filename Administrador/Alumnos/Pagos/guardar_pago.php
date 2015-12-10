<?php   
  session_start();
  error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="../../../Imagenes/iconocat.ico" rel="shortcut icon" />


    <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
  <link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

</style>



<script src="../../../Scripts/ajax.js" language="javascript"></script>
<script type="text/javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    
    $("#legend1").click(function(){
        $("#formuldatos").slideToggle(900);
    });

  $("#legend2").click(function(){
        $("#formuldatos2").slideToggle(900);
    });

});

</script>

<?php
include("../../../Scripts/conexion.php");
?>

  <style type="text/css">
    #op2{
          background:#044b89;
          border-radius:0px 0px 10px 10px;
          border:3px solid #033663;
          font-weight: bold;
          box-shadow: 0 0 7px 1px #9dcaf1;
    }


    #regresar{
      float: left;
    }
fieldset{
			border:3px solid #00ab4f;
	width:400px;
	box-shadow: 0 5px 7px 1px #c0e2d0;
	border-radius: 5px 5px 5px 5px;
	margin-bottom:100px;
		}
		.legendform{
	font-weight: bold;
	background:#005baa;
	color: #fff;
	border-radius:5px 5px 5px 5px;
	padding: 5px 10px 5px 10px;
	margin-left:20px;
	box-shadow: 0 5px 7px 1px #9dcaf1;
	border:3px solid #044f91;
	cursor: pointer;
}
  </style>


</head>

<?php
    if($_SESSION['estatus']=='1'){  
?>


<body>

  <section id="global">

    <header id="baner">
        <header id="cabecera">
          <section id="imagenes">
            <section id="imagen_cat">
              <img src="../../../Imagenes/logocat.png" width="140px" height="150px">
            </section>

            <section id="titulocat">
              Centro de Apoyo a la Titulación
            </section>

                  <section id="imagen_uv">
                    <img src="../../../Imagenes/Logouv.png" width="160px" height="150px">
                  </section>  
              </section>

        </header>  

              <aside id="engloba_notificacion">
                  <aside id="notificaciones">
                    <label class="bienvenida"><?php print "Bienvenido Administrador: ".$_SESSION['nick']; ?></label>
              <a class="salir" onClick="clicksalir()" >Salir</a> 
            </aside>
          </asid>

      </header>

    <nav id="global_menu">
      <nav id="marco_menu">
        <ul>
          <?php include ("menu_admin.php"); ?>
        </ul>
      </nav>
    </nav>

    <section id="engloba_cuerpo">
      <section id="cuerpo">
                  
                    <?php
                       date_default_timezone_set('America/Mexico_City');
                  include("../../../Scripts/conexion.php");
                  !@$matricula=$_POST['matricula'];

                  $consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");
                  {
                  $fila=mysql_fetch_array($consula_alumno);
                  !@$nombre=$fila['nombre'];
                  !@$apepat=$fila['apepat'];
                  !@$apemat=$fila['apemat'];
                  }
                  !@$fecha=$_POST['fecha'];
				  !@$sinodal=$_POST['sinodal'];
                  $tipo_pago=$_POST['tipo_pago'];
                 $importe=$_POST['importe'];
                  $concepto=$_POST['concepto'];
                  $periodo=$_POST['periodo'];
                  !@$fecha_curso=$_POST['fecha_curso'];
					$consulta="SELECT * FROM pagos WHERE matricula='$matricula'";
				$rconsu= mysql_query($consulta) or die("No se puede ejecutar consulta");
				while($fila= mysql_fetch_array($rconsu)){
									$monto_pago=$fila['monto_pago'];
									!@$total=$total+$monto_pago;
									}
$consulta_matricula="SELECT * FROM formulario_cat WHERE matricula='$matricula'";
	$compara_matricula=mysql_query($consulta_matricula) or die ("no se pudo");
	$cons=mysql_num_rows($compara_matricula);
	$filaformul=mysql_fetch_array($compara_matricula);
		$monto=$filaformul['montotot'];
	$sinodal=400;

	$falta=($monto+$sinodal)-$total;
                  $numero=$importe;
                  require "conversor.php";
                  if ($numero)
                  {
                  $resultado = convertir($numero);}
				  
					  
				  if($importe<$falta||$importe==$falta){
					  
                  $consulta="INSERT INTO pagos(matricula,fecha,tipo_pago,monto_pago,concepto)
                  VALUES
                  ('$matricula','$fecha','$tipo_pago','$importe','$concepto')";



                  $con=mysql_query($consulta)or die ("No se pudo realizar la consulta".mysql_error());
                  if($con){?>
                  <h4 align="center" style="color:#339900">SE GUARDO CORRECTAMENTE EL PAGO<br>PROCEDA A IMPRIMIR EL RECIBO</h4>

                    <?php 
                  	}
                  ?>	
                  </p>
                  <fieldset>
                  <table width="359" height="194" border="0" align="center">
                    <tr>
                      <td width="134"><strong>Matricula:</strong></td>
                      <td width="165"><?php echo $matricula;?></td>
                    </tr>
                    <tr>
                      <td><strong>Nombre:</strong></td>
                      <td><?php echo $nombre;?></td>
                    </tr>
                    <tr>
                      <td><strong>Apellido Peterno:</strong></td>
                      <td><?php echo $apepat;?></td>
                    </tr>
                    <tr>
                      <td><strong>Apellidos Materno:</strong></td>
                      <td><?php echo $apemat;?></td>
                    </tr>
                    <tr>
                      <td><strong>Grupo:</strong></td>
                      <td><?php echo $fecha_curso;?></td>
                    </tr>
                    <tr>
                      <td><strong>Periodo:</strong></td>
                      <td><?php echo $periodo;?></td>
                    </tr>
                    <tr>
                      <td><strong>Importe:</strong></td>
                      <td>$<?php echo number_format($importe);?>.00</td>
                    </tr>
                    <tr>
                      <td><strong>Tipo de Pago:</strong></td>
                      <td><?php echo $tipo_pago;?></td>
                    </tr>
                  </table>
                  <?php if($concepto=="Pago de sinodales") { ?> 
                  <p align="center">  <a target="_blank" href="../../../pdf/recibo_sinodal.php? nombre=<?php echo $nombre?> & apepat=<?php echo $apepat?> & apemat=<?php echo $apemat?> & fecha_curso=<?php echo $fecha_curso?> & tipo_pago=<?php echo $tipo_pago?> & resultado=<?php echo $resultado?> & importe=<?php echo $importe?> & matricula=<?php echo $matricula?> & periodo=<?php echo $periodo?> ">
                    <input src="../../../Imagenes/alumnos/impresora.png" type="image"/></a>
                    </p>
                    <?php }else{ ?>
                    <p align="center">  <a target="_blank" href="../../../pdf/recibo.php? nombre=<?php echo $nombre?> & apepat=<?php echo $apepat?> & apemat=<?php echo $apemat?> & fecha_curso=<?php echo $fecha_curso?> & tipo_pago=<?php echo $tipo_pago?> & resultado=<?php echo $resultado?> & importe=<?php echo $importe?>  & matricula=<?php echo $matricula?> & periodo=<?php echo $periodo?> ">
                    <input src="../../../Imagenes/alumnos/impresora.png" type="image"/></a>
                    </p>
                    <?php } ?>
                  </fieldset>
                  <form action="index.php" method="post">
                 <!-- <a href="? matricula=<?php echo $matricula; ?>">-->
                    <input type="hidden" name="matricula" value="<?php echo $matricula; ?>">
                    <legend class="legendform" type="submit">
                    <input type="submit" value="ADMINISTRACION DE PAGOS">
                  </legend>
                  </form>
                <!--</a>-->
                  
              </section>
            
            </section>
            
    
	</section>
</section> 
    
    


      </section>  
      
    
    </section>

  </section>



<footer id="pie_pagina">
  <footer id="pie">
      <a href="../../index.php">Inicio</a> | <a href="../../Autores/index.php">Autores</a> | <a href="">Contacto</a> </br>
      Derechos de Autor © 2012  | Centro de Apoyo a la Titulación
    </footer>
</footer>

</body>
<?php
				  }else{//fin validar q sea menor?>
				  <script type="text/javascript">
				  		alert("El importe del pago es MAYOR al adeudo");
    					document.location.href=("index.php? matricula=<?php echo $matricula; ?>");
 				 </script>
  <?php }//fin else
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../index.html");
  </script>
<?php } ?>
</html>
