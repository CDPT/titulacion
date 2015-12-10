<?php session_start(); if($_SESSION['estatus']=='1'){ ?>

<section id="limpiar" name="limpiar">
		<style type="text/css">
			#resultado_positivo{
				background:#bbfd6c;
				color: #46780a;
				padding: 0px 0px 10px 0px;
				font-size:19px;
			}

				#mensaje_error{
					background:#eea5a9;
					color: #fd0404;
					padding: 0px 0px 10px 0px;
					font-size:19px;
				}
		</style>
		
				<?php
				include("../../../../Scripts/conexion.php");

				$matricula=$_REQUEST['matricula']; 
				$protocolo=$_POST['protocolo'];
				$calificacion=$_POST['calificacion'];

					$consulta_alumno=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula' ");
					$numregistro=mysql_num_rows($consulta_alumno);
					$consulta_alumno1=mysql_query("SELECT * FROM formulario2_er WHERE matricula='$matricula' ");
					$numregistro1=mysql_num_rows($consulta_alumno1);
					if($numregistro==0 and $numregistro==0){
						$guarda_alumno2=mysql_query("INSERT INTO formulario_er (matricula, inscripcion) VALUES ('$matricula',1)");
						$consulta_alumno=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula' ");
					}else if($numregistro==0 and $numregistro==1){
						$guarda_alumno2=mysql_query("INSERT INTO formulario_er (matricula, inscripcion) VALUES ('$matricula',2)");
						$consulta_alumno=mysql_query("SELECT * FROM formulario_er WHERE matricula='$matricula' ");
					}

						$fila=mysql_fetch_array($consulta_alumno);
						$submodalidad=$fila['submodalidad'];
						$inscripcion=$fila['inscripcion'];
						$calificacion1=$fila['calificacion'];
						$observa=$fila['observaciones'];

				if($submodalidad=="Trabajo" || $submodalidad=="") {
				$er1=$_POST['er1'];
				$er2=$_POST['er2'];
				$er2t=$_POST['er2t'];
				$er22=$_POST['er22'];
				$er22t=$_POST['er22t'];
				$er3=$_POST['er3'];
				$er3t=$_POST['er3t'];
				$er4=$_POST['er4s1'];
				$er4t=$_POST['er4s1t'];
				$er41=$_POST['er4s2'];
				$er41t=$_POST['er4s2t'];
				$er5=$_POST['er5'];
				$er5t=$_POST['er5t'];
				$er6=$_POST['er6'];
				$califer2=$_POST['califer2'];
				$califer22=$_POST['califer22'];
				}else{
				$er1="0000-00-00";
				$er2="0000-00-00";
				$er2t="0000-00-00";
				$er22="0000-00-00";
				$er22t="0000-00-00";
				$er3="0000-00-00";
				$er3t="0000-00-00";
				$er4="0000-00-00";
				$er4t="0000-00-00";
				$er41="0000-00-00";
				$er41t="0000-00-00";
				$er5="0000-00-00";
				$er5t="0000-00-00";
				$er6="0000-00-00";
				$califer2=0;
				$califer22=0;	
				}

				//$cuotas=$_POST['cuotas'];


				if($inscripcion==1 ||($inscripcion==2 && $calificacion1==0)){

				$edicion=mysql_query("UPDATE formulario_er SET 
				er1 = '$er1',
				protocolo = '$protocolo',
				er2 = '$er2',
				er2t = '$er2t',
				califer2 = '$califer2',
				er22 = '$er22',
				er22t = '$er22t',
				califer22 = '$califer22',
				er3 = '$er3',
				er3t = '$er3t',
				er4 = '$er4',
				er4t = '$er4t',
				er41 = '$er41',
				er41t = '$er41t',
				er5 = '$er5',
				er5t = '$er5t',
				er6 = '$er6',
				calificacion = '$calificacion'
				WHERE matricula = '$matricula'") or die("No se Puedo Guardar, Consulte ".mysql_error());


				if($calificacion>5){$titulado=mysql_query("UPDATE formulario SET tit=1 where matricula='$matricula'");}
				else{$titulado=mysql_query("UPDATE formulario SET tit=0 where matricula='$matricula'");}
				$edicion1=true;

			}else{$edicion1=false;}
				

				if ($calificacion<6 && $calificacion>0 && $inscripcion==1 ){
					$guarda_alumno2=mysql_query("INSERT INTO formulario2_er (matricula, submodalidad, er1, protocolo, er2, er2t, califer2, er22, er22t, califer22, er3, er3t, er4, er4t, er41, er41t, er5, er5t, er6, calificacion ) 
					VALUES ('$matricula', '$submodalidad', '$er1', '$protocolo', '$er2', '$er2t', '$califer2', '$er22', '$er22t', '$califer22', '$er3', '$er3t', '$er4', '$er4t', '$er41', '$er41t', '$er5', '$er5t', '$er6', '$calificacion')");
					$guarda_alumno2=mysql_query("DELETE FROM formulario_er WHERE matricula='$matricula'");
					$guarda_alumno2=mysql_query("INSERT INTO formulario_er (matricula, submodalidad, inscripcion,observaciones) VALUES('$matricula', '$submodalidad', 2,'$observa')");
				}


				if($edicion1==true){ ?>
							<section id="resultado_positivo">
								Se guardo correctamente
								<img src="../../../Imagenes/exito.png" />
					        </section>
				<?php }elseif ($edicion1==false) { ?>
							<section id="mensaje_error">
								Ya excedio el numero de oportunidades
								<img src="../../../Imagenes/error.png" />
					        </section>
				<?php }  ?>  

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