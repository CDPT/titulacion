<?php
include("../../../Scripts/conexion.php");
class Buscador{
    function Conectar(){
     }
	 
    function Buscar($q){		
		$b=strtoupper($q);
      $query=mysql_query
	   ("SELECT * FROM alumno
  WHERE 
  (matricula LIKE '%$q%' OR nombre LIKE  '%$q%' OR apepat LIKE '%$q%' OR apemat LIKE '%$q%' OR carrera LIKE '%$q%')
   and
   (matricula LIKE '%$q%' OR nombre LIKE '%$q%' OR apepat LIKE '%$q%' OR apemat LIKE '%$q%' OR carrera LIKE '%$q%')");
	  

       if(mysql_num_rows($query)<=0){
		   print "No se encontro ningun resultado";
	   }else{
	  print '<table width="602" border="1">
            <tr>
   <th width="98" scope="col"><div align="center"><p>MATRICULA</th>
   <th width="80" scope="col"><div align="center">NOMBRE</th>
  <th  width="104" scope="col"><div align="center">APELLIDO PATERNO</th>
  <th width="105"  scope="col"><div align="center">APELLIDO MATERNO</th>
  <th  width="82" scope="col">CARRERA<div align="center"></th>
			   
            </tr>
            ';
		   while ($row = mysql_fetch_assoc($query)){
			   print '<tr> 
		<td> <input type="text" name="matricula" size="9" value= "'.$row['matricula'].'" readonly="readonly" /></td>
		<td> <input type="text" name="nombre"  value= "'.$row['nombre'].'" readonly="readonly" /></td>
		<td> <input type="text" name="apepat" size="9" value= "'.$row['apepat'].'" readonly="readonly" /></td>
		<td> <input type="text" name="apemat" size="9"  value= "'.$row['apemat'].'" readonly="readonly" /></td>
		<td> <input type="text" name="carrera" size="6" value= "'.$row['carrera'].'" readonly="readonly" /></td>
                      <td width="71">
      
   <div id="container"> 
      <a  href="../formul.php? matricula='.$row['matricula'].' & nombre='.$row['nombre'].' & apepat='.$row['apepat'].' & apemat='.$row['apemat'].' & carrera='.$row['carrera'].'" class="ask-custom">
      <img src="registrar.png" border="0" align="absbottom" />
          </a>       
        </div>
      </td>
    </tr>';
		   }
		   print '</table>';
		}
      }
}

?>
