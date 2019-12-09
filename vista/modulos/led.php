<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Consulta Diaria de Servicios (LED)</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-lg-12">
					<fieldset class="fieldFormHorizontal">
						<legend>&nbsp;</legend>
						<div class="col-lg-12">
							 <div class="table-responsive">
								<table class="table table-responsive-m table-bordered" cellpadding="0" cellspacing="0" border="0">
									<thead>
										<th>Hora</th>
										<th>Tipo Autorización</th>
										<th>N° de Contrato</th>
										<th>Beneficiario (fallecido)</th>
										<th>Plataforma</th>
										<th>Código de Espacio</th>
										<th>Ejecutivo de Ventas</th>
										<th>Religión (credo)</th>
										<th>Agencia Funeraria <a href="#"><div class="btn-esquina"><i class="flaticon-arrows"></i></div></a></th>
									</thead>
								</table>
							</div>
						</div>
					</fieldset>
<?php 

// try {
	
// $soapclient = new SoapClient('http://erp.integrens.com:100/muyanew.ws_integrens_ext/cmr/ext/ws_integrens_ext.asmx?wsdl');

// $valor1 = "200";
// $valor2 = "001";
// $valor3 = "<NewDataSet> <Precio> <codpro>00600038</codpro> <codmnd>S/.</codmnd> <fecvig>2019-01-01</fecvig> <fecven>2300-12-31</fecven> <codter>*</codter> <valbas>122.0000</valbas> <estreg>AC</estreg> </Precio> </NewDataSet>";

// $parametros = array('as_param1'=>$valor1,'as_param2'=>$valor2,'as_param3'=>$valor3);

//  $rsp = $soapclient->__soapCall('ws_cmrext_externo_precios_productos_xml', array($parametros));
     
//   print_r($rsp);
// } catch (Exception $e) {
// 	echo $e;
// }

?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="m_quick_sidebar-contrato" class="m-quick-sidebar-contrato m-quick-sidebar-contrato--tabbed m-quick-sidebar-contrato--skin-light">
	<div class="m-quick-sidebar-contrato__content">
		<span id="m_quick_sidebar-contrato_close" class="m-quick-sidebar-contrato__close" onclick="hideSidebar();">
			<i class="la la-close"></i>
		</span>
		<ul id="m_quick_sidebar-contrato_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--danger" role="tablist">
			<li class="nav-item m-tabs__item">
				<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_contrato" role="tab">
					<h4 id="numCttSideBar" style="display: inline;"></h4><h4 style="display: inline;"> - </h4><h4 id="codSerSideBar" style="display: inline;"></h4>
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_contrato" role="tabpanel">
				<div class="row">
					<div class="col-lg-12">
						<table class="tableSideBar">
							<tbody>
								<tr>
									<td class="leftText">Fecha Emisión</td>
									<td class="datosSideBar" id="fchEmiSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Fecha Activación</td>
									<td class="datosSideBar" id="fchActSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Fecha Resolución</td>
									<td class="datosSideBar" id="fchResSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Fecha Anulación</td>
									<td class="datosSideBar" id="fchAnuSideBar"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-lg-12">&nbsp;</div>
					<div class="col-lg-12">&nbsp;</div>
					<div class="col-lg-12">
						<label>Detalles</label>
					</div>
					<div class="col-lg-12">
						<table class="tableSideBar">
							<tbody>
								<tr>
									<td class="leftText">Cliente</td>
									<td class="datosSideBar" id="clienteSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Tipo Necesidad</td>
									<td class="datosSideBar" id="tipoNecSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Vendedor</td>
									<td class="datosSideBar" id="vendedorSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Tipo Servicio</td>
									<td class="datosSideBar" id="tipoServSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">N° Cuotas</td>
									<td class="datosSideBar" id="numCuotasSideBar"></td>
								</tr>
								<tr>
									<td class="leftText">Total</td>
									<td class="datosSideBar" id="totalSideBar"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-lg-12">&nbsp;</div>
					<div class="col-lg-12">&nbsp;</div>
					<div class="col-lg-7 button-box" id="buttons-box">
					</div>
					<div class="col-lg-5 button-box">
                            <a href="refinanciamiento" target="_blank" type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Refinanciamiento" onclick="">
                                <i class="fa fa-balance-scale"></i>
                            </a>
                            <a href="cambioTitular" target="_blank" type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-container="body" data-placement="top" title="Resolver" data-original-title="Cambio de Titular" onclick="">
                                <i class="fa fa-users"></i>
                            </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
<?php

include "modals/modalRegistroUsoServicio.php";

 ?>