<?php session_start(); if($_SESSION['estatus']=='1'){ ?>

<!-- Autor: Víctor Javier Báez Morales LSCA-->
<section id="limpiar" name="limpiar">
<head>
<style type="text/css">
	#resultado_positivo{
		background:#bbfd6c;
		color: #46780a;
		padding: 0px 0px 10px 0px;
		font-size:19px;
	}
	#resultado_negativa{
		background:#de3939;
		color: #fff;
		padding: 0px 0px 10px 0px;
		font-size:19px;
	}	


</style>
</head>



<?php
include("../../../../Scripts/conexion.php");

$matricula=$_REQUEST['matricula']; 
$grupo=strtoupper($_POST['grupo']);
$estatus=strtoupper($_POST['estatus']);
$estado=strtoupper($_POST['estado']);


$edicion=mysql_query("UPDATE formulario_cat SET 
/*grupo = '$grupo',*/
estatus = '$estatus',
estado = '$estado'
WHERE matricula = '$matricula'") or die("No se Puedo Guardar, Consulte1 ".mysql_error());
	


if($grupo){
		$consula_form=mysql_query("SELECT grupo FROM formulario_cat WHERE matricula='$matricula' ");
		while ($con=mysql_fetch_array($consula_form)) {
			$gr=$con['grupo'];
		}


			if(empty($gr)){

				$edicion=mysql_query("UPDATE formulario_cat SET 
				grupo = '$grupo'
				WHERE matricula = '$matricula'") or die("No se Puedo Guardar, Consulte2 ".mysql_error());

						$consula=mysql_query("SELECT total FROM grupos_cat WHERE nombre_grupo='$grupo' ");
							while ($fila=mysql_fetch_array($consula)) {
									$total=$fila['total'];
							}
						$suma=$total+1;
						
							$edicion_grupo=mysql_query("UPDATE grupos_cat SET 
								total = '$suma' WHERE nombre_grupo = '$grupo'") or die("No se Puedo Guardar, Consulte3 ".mysql_error());
			}else{

				$cons_for=mysql_query("SELECT grupo FROM formulario_cat WHERE matricula='$matricula' ");
				while ($conu=mysql_fetch_array($cons_for)) {
					$gru=$conu['grupo'];
				}

			if($gru==$grupo){		

				//print "esta bien";

			}else{

				//Comporbamo si hay disponibilidad
				$co=mysql_query("SELECT capacidad,total FROM grupos_cat WHERE nombre_grupo='$grupo' ");
						while ($fi=mysql_fetch_array($co)) {
								$cap=$fi['capacidad'];
								$to=$fi['total'];

						}
					$res=$cap-$to;
					
					if($res <= 0 ){
						
						print '<section id="resultado_negativa">';	
						print "El Grupo esta lleno no puedes introducir nada" ;
						print '	<img src="../../../Imagenes/error.png" />
					       </section>';
					    $error=1;

					}else{

								//Disminuimos al registro anterior del formulario
								$co=mysql_query("SELECT total FROM grupos_cat WHERE nombre_grupo='$gru' ");
										while ($fi=mysql_fetch_array($co)) {
												$to=$fi['total'];
										}
									$resta=$to-1;
									
										$edicion_grupo=mysql_query("UPDATE grupos_cat SET 
											total = '$resta' WHERE nombre_grupo = '$gru'") or die("No se Puedo Guardar, Consulte3 ".mysql_error());


							//Modificamos el nuevo grupo y agregamos a la tabla de grupos

							$edicion=mysql_query("UPDATE formulario_cat SET 
							grupo = '$grupo'
							WHERE matricula = '$matricula'") or die("No se Puedo Guardar, Consulte2 ".mysql_error());

								$consula=mysql_query("SELECT total FROM grupos_cat WHERE nombre_grupo='$grupo' ");
										while ($fila=mysql_fetch_array($consula)) {
												$total=$fila['total'];
										}
									$suma=$total+1;
									
										$edicion_grupo=mysql_query("UPDATE grupos_cat SET 
											total = '$suma' WHERE nombre_grupo = '$grupo'") or die("No se Puedo Guardar, Consulte3 ".mysql_error());

							}
					}



/*

				//Disminuimos al registro anterior del formulario
				$co=mysql_query("SELECT total FROM grupos_cat WHERE nombre_grupo='$gru' ");
						while ($fi=mysql_fetch_array($co)) {
								$to=$fi['total'];
						}
					$resta=$to-1;
					
						$edicion_grupo=mysql_query("UPDATE grupos_cat SET 
							total = '$resta' WHERE nombre_grupo = '$gru'") or die("No se Puedo Guardar, Consulte3 ".mysql_error());


			//Modificamos el nuevo grupo y agregamos a la tabla de grupos

			$edicion=mysql_query("UPDATE formulario SET 
			grupo = '$grupo'
			WHERE matricula = '$matricula'") or die("No se Puedo Guardar, Consulte2 ".mysql_error());

				$consula=mysql_query("SELECT total FROM grupos_cat WHERE nombre_grupo='$grupo' ");
						while ($fila=mysql_fetch_array($consula)) {
								$total=$fila['total'];
						}
					$suma=$total+1;
					
						$edicion_grupo=mysql_query("UPDATE grupos_cat SET 
							total = '$suma' WHERE nombre_grupo = '$grupo'") or die("No se Puedo Guardar, Consulte3 ".mysql_error());

			}

*/

			}





		}else{
				//Comporbamo si hay disponibilidad
				$co=mysql_query("SELECT capacidad,total FROM grupos_cat WHERE nombre_grupo='$grupo' ");
						while ($fi=mysql_fetch_array($co)) {
								$cap=$fi['capacidad'];
								$to=$fi['total'];

						}
					$res=$cap-$to;

					if($res <= 0 ){
						
						print '<section id="resultado_negativa">';	
						print "El grupo esta lleno no puedo introducir nada" ;
						print '	<img src="../../../Imagenes/error.png" />
					       </section>';
					    $error=1;

					}else{
						//print "Bien";
					}

/*
				print '<section id="resultado_negativa">';	
				print "Se guardo correctamente";
				print '	<img src="../../../Imagenes/exito.png" />
			       </section>';*/

		}



if(isset($error)==1){
	
}else{
?>
   <section id="resultado_positivo">
	Se guardo correctamente
      <img src="../../../Imagenes/exito.png" />
       </section>
<?php  }  ?>
</section>




<script>
	function r() { 
		document.getElementById("limpiar").innerHTML=" ";
	}
		setTimeout ("r()", 2000); //Parametro de timpo.
</script>




<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>