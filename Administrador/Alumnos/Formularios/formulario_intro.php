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
	<title>CAT</title>
	<link href="../../../Imagenes/iconocat.ico" rel="shortcut icon" />


  <link href="../../../Estilos/estilo_global.css" rel="stylesheet" type="text/css"/>
	<link href="../../Estilos/estilo_alumno.css" rel="stylesheet" type="text/css"/>

	<script type="text/javascript">
		function clicksalir() {
			var confirma=confirm("¿Seguro que desea salir del Sistema?");

			if(confirma==true){
				document.location.href=("../../../Scripts/cerrar_sesion.php");
			}else{ 
			}

		}
	</script>


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
	session_start();

		

		if($_SESSION['estatus']==1){
			include("../../../Scripts/conexion.php");
		
?>
<body  oncontextmenu="return false">

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
			<?php include ("../../../Menus/menu_administrador.php"); ?>
				</ul>
			</nav>
		</nav>



		<section id="engloba_cuerpo">
			<section id="cuerpo">
				

<?php
include("../../scripts/conexion.php");

$matricula=$_REQUEST['matricula'];

$consulta_matricula="SELECT * FROM formulario WHERE matricula='$matricula'";
$compara_matricula=mysql_query($consulta_matricula) or die ("no se pudo");
$cons=mysql_num_rows($compara_matricula);

if($cons){
	  $consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");
$fila=mysql_fetch_array($consula_alumno);
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
      
	 print $nombre." ".$apepat." ".$apemat." ya ha sido registrada anterior mente busquel@ en LISTADO DE ESTUDIANTES  ";
	 ?>
	 <form action="../listado/index.php? mat=<?php print $matricula; ?>">
	            <input type="submit"  value="regresar" />  
			 </form> 
			  
			    <script> 
				   var id="<?php echo $matricula; ?>";
				   var no="<?php echo $nombre; ?>";
				   var pa="<?php echo $apepat; ?>";
				   var ma="<?php echo $apemat; ?>";
			        alert( no+" "+pa+" "+ma+" ya ha sido registrada anterior mente busquel@ en LISTADO DE ESTUDIANTES");
			        document.location.href=("../Listado/index.php? id=<?php echo $matricula ?>"); 
				</script>
<?php
	 
}else{
$consula_alumno=mysql_query("SELECT * FROM alumno WHERE matricula='$matricula' ");

$fila=mysql_fetch_array($consula_alumno);
$matricula=$fila['matricula'];
$matinterna=$fila['matricula_interna'];
$nombre=$fila['nombre'];
$apepat=$fila['apepat'];
$apemat=$fila['apemat'];
$carrera=$fila['carrera'];
$calle=$fila['calle'];
$colonia=$fila['colonia'];
$ciudad=$fila['ciudad'];
$tel=$fila['tel_emergencia'];
$codigo=$fila['codigo_postal'];
$cel=$fila['celular'];
$correo=$fila['correo'];


$consulta_salon=mysql_query("SELECT * FROM  salon order by no_salon");

$consulta_profesor=mysql_query("SELECT * FROM profesor order by nombre");

$consulta_sinp1=mysql_query("SELECT * FROM profesor order by nombre");

$consulta_sinp2=mysql_query("SELECT * FROM profesor order by nombre");

$consulta_sins1=mysql_query("SELECT * FROM profesor order by nombre");

$consulta_sins2=mysql_query("SELECT * FROM profesor order by nombre");

$consulta_grupo=mysql_query("SELECT * FROM grupos");

$periodo=mysql_query("SELECT * FROM periodo order by periodo");

?>

<section id="titformulintro">
  REGISTRO DE ESTUDIANTE
</section>



<section id="formulario_datos">

  <fieldset id="fieldset_datos">
    <legend class="legendform">Datos Generales</legend>
    <form id="formuldatos" name="formuldatos" method="post" action="guarda_intro.php? matricula=<?php echo $matricula ; ?>" >

          <table class="tabla_form" border="0"  >
                  <tr>
                    <td class="titform">Matricula:</td>
                    <td><?php echo $matricula ; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Matricula Interna</td>
                    <td><input type="text" class="textform" value="<?php print $matinterna ; ?>" id="matinterna" name="matinterna"/></td>
                  </tr>

                  <tr>
                    <td class="titform">Nombre(s):</td>
                    <td><?php echo $nombre ; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Apellido Paterno:</td>
                    <td><?php echo $apepat ; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Apellido Materno:</td>
                    <td><?php echo $apemat ; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Carrera:</td>
                    <td><?php echo $carrera ; ?></td>
                  </tr>

                  <tr>
                    <td class="titform">Calle:</td>
                    <td><input class="textform" name="calle" type="text" id="calle" value="<?php echo $calle ; ?>" required></td>
                  </tr>

                  <tr>
                    <td class="titform">Colonia:</td>
                    <td><input class="textform" type="text" name="colonia" value="<?php echo $colonia; ?>" id="colonia"  required></td>
                  </tr>

                  <tr>
                    <td class="titform">Codigo Postal:</td>
                    <td><input class="textform" type="text" name="codigo" onkeyUp="return ValNumero(this);" value="<?php echo $codigo; ?>" id="codigo" ></td>
                  </tr>

                  <tr>
                    <td class="titform">Ciudad</td>
                    <td><input class="textform" type="text" name="ciudad" value="<?php echo $ciudad ?>" id="ciudad" required></td>
                  </tr>

                  <tr>
                    <td class="titform">Telefono:</td>
                    <td><input class="textform" type="text" onkeyUp="return ValNumero(this);" name="tel" value="<?php echo $tel; ?>" id="tel" required></td>
                  </tr>

                  <tr>
                    <td class="titform">Celular:</td>
                    <td><input class="textform" type="text" onkeyUp="return ValNumero(this);" name="cel" id="cel" value="<?php echo $cel ?>"/></td>
                  </tr>

                  <tr>
                    <td class="titform">Correo Electrónico</td>
                    <td><input class="textform" type="text" id="correo" name="correo" value="<?php echo $correo?>" /></td>
                  </tr>

          </table>

          <section id="img_guar">
            <input src="../../../Imagenes/alumnos/guardar.png" type="image"/>
          </section>

 
        </form> 
          <section id="result"></section>
  </fieldset>
</section>

<?php  }?>



























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
}else{
	session_destroy();
?>
	<script type="text/javascript">
		document.location.href=("../index.php? var=0");
	</script>
<?php } ?>
</html>
