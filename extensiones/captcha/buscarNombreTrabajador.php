<?php
require_once "../../modelo/conexion.php";
   
   $codTrabajador = $_POST['cod'];

    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT (rhuma_trabajador.dsc_apellido_paterno  + ' ' + rhuma_trabajador.dsc_apellido_materno + ', ' + rhuma_trabajador.dsc_nombres) AS dsc_trabajador FROM rhuma_trabajador WHERE rhuma_trabajador.cod_trabajador = '$codTrabajador';");

       	if ($rows = $db->row($sql)){
       		while($key = $db->recorrer($sql)){
				$dsc_trabajador = $key['dsc_trabajador'];
			} 
       	}else{
       		$dsc_trabajador = "-";
       	}
		       
		echo $dsc_trabajador;
    $db->liberar($sql);
 		$db->cerrar();  
?>