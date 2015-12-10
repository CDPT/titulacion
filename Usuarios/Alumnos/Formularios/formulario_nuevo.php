
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
  
  <?php $sistema="CAT"; include('../../../Includes/ruta.php'); include('../../../Includes/title.php');  ?>
  <script type="text/javascript" src="../../Scripts/FuncionesAjax.js"></script>
  <script type="text/javascript" src="../../Scripts/FuncionesjQuery.js"></script>




  <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>



<script language="javascript" src="../../../Scripts/jquery-1.7.1.min.js"></script>


<script language="javascript" type="text/javascript">
    function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
        }
        return Numer;
    }
    function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
    }
</script>





	<style type="text/css">
		#op2{
					background:#044b89;
					border-radius:0px 0px 10px 10px;
					border:3px solid #033663;
					font-weight: bold;
					box-shadow: 0 0 7px 1px #9dcaf1;
		}


	</style>


</head>

<?php	

		if($_SESSION['estatus']=='1'){
			include("../../../Scripts/conexion.php");
		
?>
<body  oncontextmenu="return false">

	<section id="global">

		<header id="baner">
      <?php include ("../../../Includes/header.php"); ?>

			        <aside id="engloba_notificacion">
			            <aside id="notificaciones">
			            <?php include ('../../../Includes/salir.php'); ?>
						</aside>
					</asid>

			</header>

		<nav id="global_menu">
			<nav id="marco_menu">
				<ul>
			<?php include ("../../../Menus/menu_usuarios.php"); ?>
				</ul>
			</nav>
		</nav>



		<section id="engloba_cuerpo">
			<section id="cuerpo">
				

<?
include("../../scripts/conexion.php");

?>

<section id="titformulintro">
  REGISTRO DE ALUMNO NUEVO

</section>



<section id="formulario_datos">

  <fieldset id="fieldset_datos">
    <legend class="legendform">Datos Generales</legend>
    <form id="formuldatos" name="formuldatos" method="post" action="guarda_nuevo.php" >
      <input type="hidden" name="tipo" value="<?php print $sistema; ?>"/>

          <table class="tabla_form" border="0"  >
                  <tr>
                    <td class="titform">Matricula:</td>
                    <td><input class="textform" maxlength="9" type="text" id="matricula" name="matricula" pattern="[S-s]{1}[0-9]{8}" title="la Matricula debetener una letra y 8 numeros" required/></td>
                  </tr>

                  <tr>
                    <td class="titform">Matricula Interna</td>
                    <td><input class="textform" type="text" maxlength="9" id="matinterna" name="matinterna"/></td>
                  </tr>

                  <tr>
                    <td class="titform">Nombre(s):</td>
                    <td><input class="textform" type="text" maxlength="40" name="nombre" name="nombre" required/></td>
                  </tr>

                  <tr>
                    <td class="titform">Apellido Paterno:</td>
                    <td><input class="textform" type="text" maxlength="30" name="apepat" name="apepat" required /></td>
                  </tr>

                  <tr>
                    <td class="titform">Apellido Materno:</td>
                    <td><input class="textform" maxlength="30" name="apemat" id="apemat"  /></td>
                  </tr>

                  <tr>
                    <td class="titform">Carrera:</td>
                    <td>
                        <select class="selectopcion" id="carrera" name="carrera" />
                        <option></option>
                            <?php
                                $consulta=mysql_query("SELECT * FROM licenciaturas WHERE estado='1'") or die("No se Pudo".mysql_error());
                                while($fila=mysql_fetch_array($consulta)) {
                                  $id=$fila['id_licenciatura'];
                                  $abreviatura=$fila['abreviatura'];
                            ?>                    
                        <option value="<?php print $abreviatura; ?>"><?php print $abreviatura; ?></option>      
                        <?php } ?>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td class="titform">Calle:</td>
                    <td><input class="textform" maxlength="80" name="calle" type="text" id="calle"  required></td>
                  </tr>

                  <tr>
                    <td class="titform">Colonia:</td>
                    <td><input class="textform" type="text" maxlength="30" name="colonia"  id="colonia"  required></td>
                  </tr>

                  <tr>
                    <td class="titform">Codigo Postal:</td>
                    <td><input class="textform" type="text" id="codigo" name="codigo"  onkeyUp="return ValNumero(this);" maxlength="5"></td>
                  </tr>

                  <tr>
                    <td class="titform">Ciudad</td>
                    <td><input class="textform" type="text" maxlength="40" name="ciudad"  id="ciudad" required></td>
                  </tr>

                  <tr>
                    <td class="titform">Telefono:</td>
                    <td><input class="textform" type="text" maxlength="15" onkeyUp="return ValNumero(this);" name="tel"  id="tel" required></td>
                  </tr>

                  <tr>
                    <td class="titform">Celular:</td>
                    <td><input class="textform" type="text" maxlength="15" onkeyUp="return ValNumero(this);" name="cel" id="cel" /></td>
                  </tr>

                  <tr>
                    <td class="titform">Correo Electrónico</td>
                    <td><input class="textformcorreo" type="email" id="correo" maxlength="40" name="correo" /></td>
                  </tr>

          </table>

          <section id="img_guar">
            <input src="../../../Imagenes/alumnos/guardar.png" type="image"/>
          </section>

 
        </form> 
          <section id="result"></section>
  </fieldset>
</section>














			</section>	
			
		
		</section>

	</section>



<footer id="pie_pagina">
<?php include ('../../../Includes/pie_pagina.php'); ?>  
</footer>

</body>
<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>
</html>
