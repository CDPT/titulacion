<?php   session_start(); if($_SESSION['estatus']=='1'){
function Connect($host,$user,$passwd)
     {  
      if(!($link=mysql_connect($host,$user,$passwd)))
       {
        echo "Error connecting to DDBB.";
        exit();
       }
       return $link;
     }
$link=Connect('localhost','root','12345');//
if($_POST['submit'])
 { 
     $db="cat3";
    $output=shell_exec("mysqldump.exe -u root -p 12345 ".$db); // ejemplo windows
   // $output=shell_exec("/usr/bin/mysqldump -u root -p root ".$db); // ejemplo linux
    //
	//fijo el date de hoy
$date_month = date('m');
$date_year = date('Y');
$date_day = date('d');
$Date = "$date_year-$date_month-$date_day";
//Archivo
$filename = "bdcat_$Date";
    if(trim($output)==NULL)
     {
         echo "Error creando el backup de la DB: ".$db;
         exit();
     }
    header('Content-type: text/plain');
    header('Content-Disposition: attachment; filename="'.$filename.'.sql"');
    echo $output;
    exit();
 }    
$select="show databases";
$select=mysql_query($select); 

/*
//fijo el date de hoy
$date_month = date('m');
$date_year = date('Y');
$date_day = date('d');
$Date = "$date_year-$date_month-$date_day";
//Archivo
$filename = "bdcat_$Date.sql";
//Datos BD
$usuario = "root";
$passwd = "12345";
$bd = "cat2";
header("Pragma: no-cache");
header("Expires: 0");
header("Content-Transfer-Encoding: binary");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=$filename");
// Utilización del script para windows o unix. Activar las lineas depende de cada caso
//windows
$executa = "C:\xampp\bin\mysql\mysql5.1.32\bin\mysqldump.exe -u $usuario --password=$passwd --opt $bd";
system($executa, $resultado);
//para Unix
//$executa = "mysqldump -u $usuario --password=$passwd --opt $bd";
//system($executa, $resultado);
if ($resultado) { echo "<H1>Error ejecutando comando: $executa</H1>\n"; }
echo "Creado BackUp";

*/


?> 


<?php
}else{
  session_destroy();
?>
  <script type="text/javascript">
    document.location.href=("../../../index.html? var=0");
  </script>
<?php } ?>
</html>
