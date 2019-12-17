<?php 
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$codPro = $_POST['codPro'];

$db = new Conexion();

$sql = $db->consulta("SELECT * FROM vtaca_prospecto_venta WHERE cod_prospecto = '$codPro'");

while($key = $db->recorrer($sql)){
        $tipoDoc = $key['cod_tipo_documento'];
        echo $tipoDoc;
        $numDoc = $key['dsc_documento'];
        echo $numDoc;
        $juridico = $key['flg_juridico'];
        $apePaterno = $key['dsc_apellido_paterno'];
        echo $apePaterno;
        $apeMaterno = $key['dsc_apellido_materno'];
        echo $apeMaterno;
        $nombre = $key['dsc_nombre'];
        echo $nombre;
        $direccion = $key['dsc_direccion'];
        $pais = $key['cod_pais'];
        $departamento = $key['cod_departamento'];
        $provincia = $key['cod_provincia'];
        $distrito = $key['cod_distrito'];
        $telefono1 = $key['dsc_telefono_1'];
        $telefono2 = $key['dsc_telefono_2'];

        if ($key['fch_registro'] == NULL) {
            $fechReg = "-";
        }else{
            $fechReg = dateFormat($key['fch_registro']);
            // $fechReg = "-";
        }

        $usuario = $key['cod_usuario'];
        

        $arrData = array('tipoDoc'=> $tipoDoc, 'numDoc'=> $numDoc, 'juridico'=> $juridico, 'apePaterno'=> $apePaterno, 'apeMaterno'=> $apeMaterno, 'nombre'=> $nombre, 'direccion'=> $direccion, 'pais'=> $pais, 'departamento'=> $departamento, 'provincia'=>$provincia, 'distrito'=> $distrito, 'telefono1'=> $telefono1, 'telefono2'=>$telefono2, 'fechReg'=> $fechReg, 'usuario'=>$usuario);
    }

    echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
    $db->liberar($sql);
    $db->cerrar(); 