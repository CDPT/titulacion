<?php

	$conexion=mysql_connect('localhost','root','');
		$basedatos=mysql_select_db("cat");
			mysql_query("SET NAMES utf8");
			
	     if(!$conexion){
	        die ("No se puede conectar la base de datos");
	     }

		 if(!$basedatos){
			die("No se pudo conectar la base de datos");
		 }

?>
