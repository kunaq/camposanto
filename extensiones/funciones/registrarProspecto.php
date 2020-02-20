<?php 
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$importe = $_POST['importe'];
$tipoDoc = $_POST['tipoDoc'];
$numDoc = $_POST['numDoc'];
$juridico = $_POST['jur'];
$apePaterno = $_POST['apePaterno'];
$apeMaterno = $_POST['apeMaterno'];
$nombre = $_POST['nombre'];
$razonSocial = $_POST['razonSocial'];
$direccion = $_POST['direccion'];
$pais = $_POST['pais'];
$departamento = $_POST['departamento'];
$provincia = $_POST['provincia'];
$distrito = $_POST['distrito'];
$telefono1 = $_POST['telefono1'];
$telefono2 = $_POST['telefono2'];
$fchRegistro = $_POST['fchRegistro'];
$usuario = $_POST['usuario'];
$origen = $_POST['origen'];
$calificacion = $_POST['calificacion'];
$vendedor = $_POST['vendedor'];
$grupo = $_POST['grupo'];
$supervisor = $_POST['supervisor'];
$jefeVentas = $_POST['jefeVentas'];
$observacion = $_POST['observacion'];
$estado = $_POST['estado'];

$prospecto = $apePaterno." ".$apeMaterno.", ".$nombre;
// $localidad = $_POST['localidad'];
// $contrato = $_POST['contrato'];
// $servicio = $_POST['servicio'];
// $tipoCtt = $_POST['tipoCtt'];


$db = new Conexion();

$sql = $db->consulta("SELECT TOP 1 CONVERT(INT,SUBSTRING(
        cod_prospecto, 
        CHARINDEX('T', cod_prospecto)+1, 
        LEN(cod_prospecto)-CHARINDEX('T', cod_prospecto))) AS ultimo_registro
        FROM vtaca_prospecto_venta ORDER BY cod_prospecto DESC;");

$ultimoPros = "";

while($key = $db->recorrer($sql)){
    $ultimoPros = $key['ultimo_registro'];
}

$nuevoPros = (int)$ultimoPros + 1;

if ($nuevoPros < 10) {
    $codPro = "PVT000000".$nuevoPros."";
}elseif ($nuevoPros < 100) {
    $codPro = "PVT00000".$nuevoPros."";
}elseif ($nuevoPros < 1000) {
    $codPro = "PVT0000".$nuevoPros."";
}elseif ($nuevoPros < 10000) {
    $codPro = "PVT000".$nuevoPros."";
}elseif ($nuevoPros < 100000) {
    $codPro = "PVT00".$nuevoPros."";
}elseif ($nuevoPros < 1000000) {
    $codPro = "PVT0".$nuevoPros."";
}elseif ($nuevoPros < 10000000) {
    $codPro = "PVT".$nuevoPros."";
}


if ($juridico == "NO") {
    $sql2 = $db->consulta("INSERT INTO vtaca_prospecto_venta(cod_prospecto, dsc_apellido_paterno, dsc_apellido_materno, dsc_nombre, flg_juridico, cod_tipo_documento, dsc_documento, dsc_prospecto, cod_pais, cod_departamento, cod_provincia, cod_distrito, dsc_direccion, dsc_telefono_1, dsc_telefono_2, cod_origen, cod_calificacion, dsc_observaciones, fch_registro, cod_usuario, cod_consejero, cod_grupo, cod_supervisor, cod_jefeventas, cod_estado, flg_cambio_activo) VALUES('$codPro', '$apePaterno', '$apeMaterno', '$nombre', '$juridico', '$tipoDoc', '$numDoc', '$prospecto', '$pais', '$departamento', '$provincia', '$distrito', '$direccion', '$telefono1', '$telefono2', '$origen', '$calificacion', '$observacion', '$fchRegistro', '$usuario', '$vendedor', '$grupo', '$supervisor', '$jefeVentas', '$estado', 'NO')");

    $ra = $db->validar($sql2);

    if ($ra == 1) {

        $arrData = array('cod'=> $ra, 'codProspecto'=>$codPro);
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

    }elseif ($ra == 0) {

        $arrData = array('cod'=> $ra, 'msg'=>'Ocurrio un error al registrar el prospecto');
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

    }

    $db->liberar($sql2);

}elseif ($juridico == "SI") {
    $sql3 = $db->consulta("INSERT INTO vtaca_prospecto_venta(cod_prospecto, dsc_razon_social, flg_juridico, cod_tipo_documento, dsc_documento, dsc_prospecto, cod_pais, cod_departamento, cod_provincia, cod_distrito, dsc_direccion, dsc_telefono_1, dsc_telefono_2, cod_origen, cod_calificacion, dsc_observaciones, fch_registro, cod_usuario, cod_consejero, cod_grupo, cod_supervisor, cod_jefeventas, cod_estado, flg_cambio_activo) 
VALUES('$codPro', '$razonSocial', '$juridico', '$tipoDoc', '$numDoc', '$razonSocial', '$pais', '$departamento', '$provincia', '$distrito', '$direccion', '$telefono1', '$telefono2', '$origen', '$calificacion', '$observacion', '$fchRegistro', '$usuario', '$vendedor', '$grupo', '$supervisor', '$jefeVentas', '$estado', 'NO')");

    $rowAfe = $db->validar($sql3);

    if ($rowAfe == 1) {

        $arrData = array('cod'=> $rowAfe, 'codProspecto'=>$codPro);
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

    }elseif ($rowAfe == 0) {

        $arrData = array('cod'=> $rowAfe, 'msg'=>'Ocurrio un error al registrar el prospecto');
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        
    }

    $db->liberar($sql3);
}

    	
    	$db->liberar($sql);
		$db->cerrar();

 ?>