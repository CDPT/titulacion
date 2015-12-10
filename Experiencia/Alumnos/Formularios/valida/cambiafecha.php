<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<?php
include("../../../../Scripts/conexion.php");
		$fecha=$_REQUEST['fech'];

		print $fecha:
?>
						<table>
							<tr>
								<td></td>
								<td>Fecha</td>
								<td>
									<input type="text" class="campotext2" id="fechaconsul" name="fechaconsul">
								</td>
							</tr>
							<td></td>
							<td></td>							
						</table>

				<section id="cargafechas" name="cargafechas">
						<table class="tabla2" name="agreg_maestro2">

							<tr>
								<td>Matricula</td>
								<td>Fecha</td>
								<td>Hora</td>
								<td>Salon</td>
								<!--<td>Nombre</td>
								<td>Apellido Paterno</td>
								<td>Apellido Materno</td>-->
							</tr>
<?php
//print "esta".$fecha=$_SESSION['fecha'];
//$consul="SELECT * FROM alumno INNER JOIN formulario ON alumno.matricula=formulario.matricula WHERE formulario.matricula like '%$bus%' ";
					$con=mysql_query("SELECT * FROM formulario WHERE fechaexam='$fecha' ")or die("no se pude");
						while ($fila=mysql_fetch_array($con)) {
							$mat=$fila['matricula'];
							$fe=$fila['fechaexam'];
							$ho=$fila['horaexam'];
							$sal=$fila['salon'];
 ?>	
							<tr>
								<td><?php print $mat; ?></td>
								<td><?php print $fe; ?></td>
								<td><?php print $ho; ?></td>
								<td><?php print $sal; ?></td>
								<!--<td><?php //print $mat; ?></td>
								<td><?php //print $ho; ?></td>
								<td><?php //print $ho; ?></td>-->
							</tr>	
							<?php } ?>						


							</tr>

						</table>
						


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>