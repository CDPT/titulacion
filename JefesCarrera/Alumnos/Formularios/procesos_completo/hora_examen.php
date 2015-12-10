<?php session_start(); if($_SESSION['estatus']=='1'){ ?>
<?php include("../../../../Scripts/conexion.php"); 

$dir=$_REQUEST['dir']; 
$pro1=$_REQUEST['pro1']; 
$pro2=$_REQUEST['pro2'];
$sup1=$_REQUEST['sup1'];
$sup2=$_REQUEST['sup2'];
$fechapeticion=$_REQUEST['fecha'];

/*
$consul_dir=mysql_query("SELECT horaexam FROM formulario WHERE director='$dir' AND fechaexam='$fechapeticion'")or die(mysql_error());
	while($fildir=mysql_fetch_array($consul_dir)){
		
	 $hora_dir=$fildir['horaexam'];
	}

$consul_prop1=mysql_query("SELECT horaexam FROM formulario WHERE sinprop1='$pro1' AND fechaexam='$fechapeticion'")or die(mysql_error());
	while($filprop1=mysql_fetch_array($consul_prop1)){
		$hora_prop1=$filprop1['horaexam'];
	}

$consul_prop2=mysql_query("SELECT horaexam FROM formulario WHERE sinprop2='$pro2' AND fechaexam='$fechapeticion'")or die(mysql_error());
	while($filprop2=mysql_fetch_array($consul_prop2)){
		$hora_prop2=$filprop2['horaexam'];
		}

$consul_sup1=mysql_query("SELECT horaexam FROM formulario WHERE sinsup1='$sup1' AND fechaexam='$fechapeticion'")or die(mysql_error());
	while($filsup1=mysql_fetch_array($consul_sup1)){
		$hora_sup1=$filsup1['horaexam'];
	}

$consul_sup2=mysql_query("SELECT horaexam FROM formulario WHERE sinsup2='$sup2' AND fechaexam='$fechapeticion'")or die(mysql_error());
	while($filsup2=mysql_fetch_array($consul_sup2)){
		$hora_sup2=$filsup2['horaexam'];
	}
$consula=mysql_query("SELECT horas_exam.id,horas_exam.hora_ini
						FROM horas_exam LEFT JOIN formulario
						ON horas_exam.id = formulario.horaexam 
						WHERE  fechaexam='$fechapeticion'  ");

while ($fl=mysql_fetch_array($consula)) {
	$horas=$fl['id']." ";
	 $hora_ini=$fl['hora_ini']."<br>";
} */
?>

		<select name="horaexam" id="horaexam" class="selectopcion">
			<option></option>
			<?php
				 $se=mysql_query("SELECT * FROM horas_exam")or die(mysql_error());
				 while ($sae=mysql_fetch_array($se)) {
				 	$id_hora=$sae['id'];
				 	$hora_ini=$sae['hora_ini'];
				 	$hora_fin=$sae['hora_fin'];
				 	$hor=$hora_ini." - ".$hora_fin;
	?>
				<option value="<?php print $id_hora; ?>"><?php print $hor; ?></option>
				<?php }  ?>
		</select>








<script type="text/javascript">
	$(document).ready(function(){
		$("#horaexam").change(function(event){		

			var hora= $("#horaexam").find(':selected').val();

			$("#seccion_salon").load("valida/valida_salon.php?hora="+hora);

			$("#seccion_salon").css("display","block");
			$("#observa").css("display","none");
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