<?php
require_once "../../modelo/conexion.php";
	$db = new Conexion();                                             

                $sql = $db->consulta("SELECT cod_prospecto, fch_registro, dsc_prospecto, dsc_documento, cod_consejero, dsc_telefono_1 FROM vtaca_prospecto_venta WHERE cod_estado = 'ACT'");

                $datos = array();

                echo'
                <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" >
                 <div class="m_datatable m-datatable m-datatable--default" style="">
                    <div class="table-responsive">
					<table class="m-datatable__table" width="100%" style="display: block; min-height: 300px; overflow-x: auto;" id="myTableProspecto">
						<thead>
							<tr>
								<th width="98">
									Fecha de registro
								</th>
								<th width="74">
									Código
								</th>
								<th width="224">
									Nombre y apellido
								</th>
								<th width="89">
									Numero de Documento
								</th>
								<th width="103">
									Vendedor
								</th>
								<th width="58">
									Teléfono
								</th>
								<th title="Field #7">
									Acción
								</th>
							</tr>
						</thead>
							<tbody>';

                while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    $cod = "'".$key['dsc_documento']."'";
                    $fecha = dateFormat($key['fch_registro']);
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
                            <button type="button" onclick = "cambiaDocumento('.$cod.')" class="m-btn btn btn-danger" data-dismiss="modal">
                                <i class="la la-plus"></i>
                            </button>
                        </td>
                    </tr>';

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