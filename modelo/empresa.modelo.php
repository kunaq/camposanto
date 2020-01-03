<?php

require_once "conexion.php";

class ModeloEmpresa{

    static public function mdlMostrarEmpresa($tabla,$valor,$item){

        $db = new Conexion();

            if($item != null){                                              

                $sql = $db->consulta("SELECT * FROM $tabla WHERE $item = '$valor'");
 
                $datos = $db->recorrer($sql);
 
            }else{

                $sql = $db->consulta("SELECT * FROM $tabla");

                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                }

            }

        $db->liberar($sql);
 		$db->cerrar();

        return $datos;

    }

    static public function mdlPais(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT cod_pais , dsc_pais FROM vtama_pais ORDER BY dsc_pais");
 
                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    echo '<option value="'.$key['cod_pais'].'">'.$key['dsc_pais'].'</option>';
                }

        $db->liberar($sql);
        $db->cerrar();

        return $datos;

    }

    static public function mdlSelects($tabla,$item1,$item2){

        $db = new Conexion();

            if($item1 != null){                                              

                $sql = $db->consulta("SELECT $item1 , $item2 FROM $tabla WHERE flg_activo = 'SI' ORDER BY $item2");
 
                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    echo '<option value="'.$key[$item1].'">'.utf8_encode($key[$item2]).'</option>';
                }
 
            }else{

                echo "No se encontraron resultados para esta busqueda.";

            }

        $db->liberar($sql);
 		$db->cerrar();

        return $datos;

    }
    static public function mdlestadocivil(){

        $db = new Conexion();                                            

            $sql = $db->consulta("SELECT cod_estado_civil , dsc_estado_civil FROM vtama_estado_civil ORDER BY dsc_estado_civil");

            $datos = array();

            while($key = $db->recorrer($sql)){
                $datos[] =  $key;
                echo '<option value="'.$key['cod_estado_civil'].'">'.$key['dsc_estado_civil'].'</option>';

            }

        $db->liberar($sql);
        $db->cerrar();

        return $datos;

    }

    static public function mdltipoDoc(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT cod_tipo_documento , dsc_tipo_documento FROM vtama_tipo_documento WHERE flg_activo = 'SI'");
 
                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    echo '<option value="'.$key['cod_tipo_documento'].'">'.$key['dsc_tipo_documento'].'</option>';
                }

        $db->liberar($sql);
 		$db->cerrar();

        return $datos;

    }

    static public function mdlCamposanto(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT cod_camposanto, dsc_camposanto FROM vtama_camposanto WHERE flg_propietario = 'SI'");
 
                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    echo '<option value="'.$key['cod_camposanto'].'">'.$key['dsc_camposanto'].'</option>';
                }

        $db->liberar($sql);
        $db->cerrar();

        return $datos;

    }

    static public function mdltipoCambio(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT top(1) imp_cambio_compra FROM vtama_tipo_cambio order by fch_cambio desc");

                $datos = array();

 				while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    echo 'S/. '.$key['imp_cambio_compra'];
                }

        $db->liberar($sql);
 		$db->cerrar();

        return $datos;

    }

    static public function mdlnumCuotas(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT * FROM vtama_cuota WHERE flg_activo = 'SI");

                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    echo '<option value="'.$key['cod_cuota'].'">'.$key['dsc_cuota'].'</option>';
                }

        $db->liberar($sql);
        $db->cerrar();

        return $datos;

    }

    static public function mdlcodVendedor(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT cod_trabajador FROM rhuma_trabajador");

                $datos = array();

 				while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                   echo '<option value="'.$key['cod_trabajador'].'">'.$key['cod_trabajador'].'</option>';
                }

        $db->liberar($sql);
 		$db->cerrar();

        return $datos;

    }

    static public function mdldocCliente(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT dsc_documento FROM vtama_cliente");

                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                   echo '<option value="'.$key['dsc_documento'].'">'.$key['dsc_documento'].'</option>';
                }
                $sql1 = $db->consulta("SELECT dsc_documento FROM vtaca_prospecto_venta WHERE flg_cambio_activo = 'SI'");

                $datos = array();

                while($key = $db->recorrer($sql1)){
                    $datos[] =  $key;
                   echo '<option value="'.$key['dsc_documento'].'">'.$key['dsc_documento'].'</option>';
                }

        $db->liberar($sql);
        $db->liberar($sql1);
        $db->cerrar();

        //return $datos;

    }

    static public function mdlnomVendedor($cod){

        $db = new Conexion();                                             

            	$sql = $db->consulta("SELECT dsc_apellido_paterno, dsc_apellido_materno, dsc_nombres FROM rhuma_trabajador where cod_trabajador = '$cod'");

                $datos = array();

 				while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                   echo $key['dsc_nombres'].' '.$key['dsc_apellido_paterno'].' '.$key['dsc_apellido_materno'];    
				}           

        $db->liberar($sql);
 		$db->cerrar();

        return $datos;

    }

    static public function mdltabVendedor(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT top(15) cod_trabajador,cod_tipo_documento, dsc_nombres,dsc_apellido_paterno, dsc_apellido_materno, dsc_documento, flg_activo  FROM rhuma_trabajador");

                $datos = array();
                //$datos = '';

                while($key = $db->recorrer($sql)){
                   $datos[] =  $key;
                    if($key['cod_tipo_documento'] == 'DI001'){
                        $tipoDoc = 'DNI';
                    }
                    elseif ($key['cod_tipo_documento'] == 'DI002') {
                        $tipoDoc = 'CARNET EXTRANJERIA';
                    }
                    elseif ($key['cod_tipo_documento'] == 'DI003') {
                        $tipoDoc = 'PASAPORTE';
                    }
                    elseif ($key['cod_tipo_documento'] == 'DI004') {
                        $tipoDoc = 'RUC';
                    }
                    elseif ($key['cod_tipo_documento'] == 'DI005') {
                        $tipoDoc = 'OTROS';
                    }
                    else{
                        $tipoDoc = 'LIBERTA ELECTORAL';
                    }
                    $cod = "'".$key['cod_trabajador']."'";
                   echo 
                   '<tr>
                        <td>
                            <img class="m--img" src="vista/assets/app/media/img/users/user'.rand(1,5).'.jpg" title="">
                        </td>
                        <td>
                            '.$key['cod_trabajador'].'
                        </td>
                        <td>
                            '.$key['dsc_nombres'].' '.$key['dsc_apellido_paterno'].' '.$key['dsc_apellido_materno'].'
                        </td>
                        <td>
                            '.$tipoDoc.'
                        </td>
                        <td>
                           '.$key['dsc_documento'].'
                        </td>
                        <td>
                            '.$key['flg_activo'].'
                        </td>
                        <td>
                            <button type="button" onclick = "cambiaCodigo('.$cod.')" class="m-btn btn btn-danger" data-dismiss="modal">
                                <i class="la la-plus"></i>
                            </button>
                        </td>
                    </tr>';
                    //$datos = '<tr><td>hola</td><td>hola2</td></tr>';

                }           

        $db->liberar($sql);
        $db->cerrar();

        return $datos;

    }

    static public function mdltabCliente(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT top (250) cod_calificacion, cod_cliente, dsc_cliente, dsc_documento, dsc_telefono_1 FROM vtama_cliente");

                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    if($key['cod_calificacion'] == 'CA001'){
                        $tipoCal = 'REGULAR';
                    }
                    elseif ($key['cod_calificacion'] == 'CA002') {
                        $tipoCal = '<p style = "color:gold;"><b>VIP</b></p>';
                    }
                    else{
                        $tipoCal = '<p style = "color:red;"><b>NEGATIVO</b></p>';
                    }
                    $cod = "'".$key['dsc_documento']."'";
                   echo 
                   '<tr style="height: 60px;">
                        <td>
                            '.$key['cod_cliente'].'
                        </td>
                        <td>
                            '.$key['dsc_cliente'].'
                        </td>
                        <td style="text-align: center;">
                            '.$key['dsc_documento'].'
                        </td>
                        <td style="text-align: center;">
                            '.$key['dsc_telefono_1'].'
                        </td>
                        <td style="text-align: center;">
                            '.$tipoCal.'
                        </td>
                        <td>
                            <button type="button" onclick = "cambiaDocumento('.$cod.')" class="m-btn btn btn-danger" data-dismiss="modal">
                                <i class="la la-plus"></i>
                            </button>
                        </td>
                    </tr>';

                }           

        $db->liberar($sql);
        $db->cerrar();

        return $datos;

    }

    static public function mdltabProspecto(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT top (15) cod_prospecto, fch_registro, dsc_prospecto, dsc_documento, cod_consejero, dsc_telefono_1 FROM vtaca_prospecto_venta");

                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    $cod = "'".$key['cod_prospecto']."'";
                    $fecha = date_format($key['fch_registro'], 'Y-m-d');
                   echo 
                   '<tr style="height: 60px;">
                        <td style="text-align: center;">
                            '.$fecha.'
                        </td>
                        <td>
                            '.$key['cod_prospecto'].'
                        </td>
                        <td>
                            '.$key['dsc_prospecto'].'
                        </td>
                        <td style="text-align: center;">
                            '.$key['dsc_documento'].'
                        </td>
                        <td style="text-align: center;">
                            '.$key['cod_consejero'].'
                        </td>
                        <td>
                            '.$key['dsc_telefono_1'].'
                        </td>
                        <td>
                            <button type="button" onclick = "buscaProspecto('.$cod.')" class="m-btn btn btn-danger" data-dismiss="modal">
                                <i class="la la-plus"></i>
                            </button>
                        </td>
                    </tr>';

                }           

        $db->liberar($sql);
        $db->cerrar();

        return $datos;

    }

    static public function mdltipoCom(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT cod_tipo_comprobante , dsc_tipo_comprobante FROM vtama_tipo_comprobante WHERE flg_activo = 'SI'");
 
                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    echo '<option value="'.$key['cod_tipo_comprobante'].'">'.$key['dsc_tipo_comprobante'].'</option>';
                }

        $db->liberar($sql);
        $db->cerrar();

        return $datos;

    }

    static public function mdlAnnoPeriodo(){

        $db = new Conexion();                                             

        $sql = $db->consulta("SELECT DISTINCT TOP 10 num_anno FROM vtama_periodo ORDER BY num_anno DESC");

        $datos = array();

        while($key = $db->recorrer($sql)){
             $datos[] =  $key;
             echo '<option value="'.$key['num_anno'].'">'.$key['num_anno'].'</option>';
         }

        $db->liberar($sql);
        $db->cerrar();

        return $datos;
    }

    static public function mdlTrabajador(){

        $db = new Conexion();                                             

                $sql = $db->consulta("SELECT cod_trabajador, LEFT(rhuma_trabajador.dsc_nombres, 1) + '.  ' + rhuma_trabajador.dsc_apellido_paterno AS dsc_trabajador FROM rhuma_trabajador ORDER BY dsc_nombres ASC");
 
                $datos = array();

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    echo '<option value="'.$key['cod_trabajador'].'">'.$key['dsc_trabajador'].'</option>';
                }

        $db->liberar($sql);
        $db->cerrar();

        return $datos;

    }

}//class ModeloPaises
