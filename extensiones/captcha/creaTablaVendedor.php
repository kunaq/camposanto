<?php
require_once "../../modelo/conexion.php";
    $tipobtn = $_GET['tipo'];
	$db = new Conexion(); 
	$sql = $db->consulta("SELECT cod_trabajador,cod_tipo_documento, dsc_nombres,dsc_apellido_paterno, dsc_apellido_materno, dsc_documento, flg_activo  FROM rhuma_trabajador");

    $datos = array();

	echo '<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">		
			<div class="row">
            <div class="table-responsive">
				<table id="myTableVendedor" cellpadding="0" cellspacing="0" border="0" display="block">
					<thead>
						<tr>
							<th width="98">
								&nbsp;
							</th>
							<th width="74">
								Código
							</th>
							<th width="224">
								Trabajador
							</th>
							<th width="89">
								Tipo Doc
							</th>
							<th width="103">
								Número
							</th>
							<th width="58">
								Activo
							</th>
							<th title="Field #7">
								Acción
							</th>
						</tr>
					</thead>
					<tbody>';

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
        if ($tipobtn == "vendedor") {
            $funcion = 'llamaDatosVendedor('.$cod.','."'vendedor'".')';
        }elseif ($tipobtn == "cobrador"){
           $funcion = 'llamaDatosVendedor('.$cod.','."'cobrador'".')';
        }elseif ($tipobtn == "generaComprobante"){
            $funcion = "cambiaCodigo(".$cod.");";
        }
       echo 
       '<tr>
            <td>
                <img class="m--img" src="vista/assets/app/media/img/users/user'.rand(1,5).'.jpg" title="">
            </td>
            <td>
                '.$key['cod_trabajador'].'
            </td>
            <td>
                '.utf8_encode($key['dsc_nombres']).' '.utf8_encode($key['dsc_apellido_paterno']).' '.utf8_encode($key['dsc_apellido_materno']).'
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
                <button type="button" onclick = "'.$funcion.'" class="m-btn btn btn-danger" data-dismiss="modal">
                    <i class="la la-plus"></i>
                </button>
            </td>
        </tr>';
        //$datos = '<tr><td>hola</td><td>hola2</td></tr>';

    }

    echo '
	</tbody>
	</table>
    </div>
	</div>
	</div>';

	$db->liberar($sql);
    $db->cerrar();

?>