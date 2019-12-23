<?php 
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$codPro = $_POST['codPro'];

$db = new Conexion();

$sql = $db->consulta("SELECT *, DATEDIFF(DD, vtaca_prospecto_venta.fch_registro, CONVERT(DATE, GETDATE())) AS num_dias FROM vtaca_prospecto_venta WHERE cod_prospecto = '$codPro'");

while($key = $db->recorrer($sql)){
        $tipoDoc = $key['cod_tipo_documento'];
        $numDoc = $key['dsc_documento'];
        $juridico = $key['flg_juridico'];
        $apePaterno = $key['dsc_apellido_paterno'];
        $apeMaterno = $key['dsc_apellido_materno'];
        $nombre = $key['dsc_nombre'];
        $direccion = $key['dsc_direccion'];
        $pais = $key['cod_pais'];
        $departamento = $key['cod_departamento'];
        $provincia = $key['cod_provincia'];
        $distrito = $key['cod_distrito'];
        $telefono1 = $key['dsc_telefono_1'];
        $telefono2 = $key['dsc_telefono_2'];
        $codVendedor = $key['cod_consejero'];
        $codGrupo = $key['cod_grupo'];
        $codSuper = $key['cod_supervisor'];
        $codjefe = $key['cod_jefeventas'];
        $observacion = $key['dsc_observaciones'];
        $calificacion = $key['cod_calificacion'];
        $numDias = $key['num_dias'];
        $canalVenta = $key['cod_origen'];
        $estado = $key['cod_estado'];
        $localidad = $key['cod_localidad'];
        $contrato = $key['cod_contrato'];
        $servicio = $key['num_servicio'];
        $tipoCtt = $key['cod_tipo_ctt'];

        if ($key['imp_monto'] == NULL) {
            $imp_venta = "0,00";
        }else{
            $imp_venta = number_format(round($key['imp_monto'], 2),2,',','.');
        }

        if ($key['fch_registro'] == NULL) {
            $fechReg = "-";
        }else{
            // $fechReg = dateFormat($key['fch_registro']);
            $fechReg = dateFormat($key['fch_registro']);
        }

        $usuario = $key['cod_usuario'];

        $arrData = array('tipoDoc'=> $tipoDoc, 'numDoc'=> $numDoc, 'juridico'=> $juridico, 'apePaterno'=> utf8_encode($apePaterno), 'apeMaterno'=> utf8_encode($apeMaterno), 'nombre'=> utf8_encode($nombre), 'direccion'=> utf8_encode($direccion), 'pais'=> $pais, 'departamento'=> $departamento, 'provincia'=>$provincia, 'distrito'=> $distrito, 'telefono1'=> $telefono1, 'telefono2'=>$telefono2, 'fechReg'=> $fechReg, 'usuario'=> utf8_encode($usuario), 'codVendedor'=> $codVendedor, 'codGrupo'=>$codGrupo, 'codSuper'=>$codSuper, 'codjefe'=>$codjefe, 'observacion'=> utf8_encode($observacion), 'calificacion'=>$calificacion, 'numDias'=>$numDias, 'canalVenta'=>$canalVenta, 'estado'=>$estado, 'importe'=>$imp_venta, 'localidad'=>$localidad, 'contrato'=>$contrato, 'servicio'=>$servicio, 'tipoCtt'=>$tipoCtt);
    }

    echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
    $db->liberar($sql);
    $db->cerrar(); 