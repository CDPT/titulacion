<?php session_start(); if($_SESSION['estatus']=='1'){ 
include("../../../../Scripts/conexion.php");

if(isset($_REQUEST['matricula'])){

$matricula=$_REQUEST['matricula'];

                $consulta78=mysql_query("SELECT * FROM pagos WHERE matricula='$matricula'") or die("No se puede ejecutar consulta");
                            !@$total==0;
                            while($fila78= mysql_fetch_array($consulta78)){
                                 $importe=$fila78['monto_pago'];
                                 $total=$total+$importe."<br>";
                                }
                                $deve=$monto-$total;
                          $avance= $total * 100 / $monto;
                       if($avance < 100 ){
                    ?>
                      <section id="result_deudor">
                        Deudor de <?php print $deve ?>
                      </section>
                <?php }else{ ?>
                       <section id="result_pagado">
                        Pagado al 100%
                      </section>
                <?php }
}

             ?>      





<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html");
  </script>
<?php } ?>