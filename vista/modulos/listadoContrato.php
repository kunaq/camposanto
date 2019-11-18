<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Listado de Contratos</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="formFiltroContrato">
				<form class="filtroContrato">
					<div class="row">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Fecha</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-4">
													<label>Tipo Fecha</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="tipoFecha" id="tipoFecha" onchange="creaTablaContrato();">
														<option value="GEN">Fecha de Generación</option>
														<option value="EMI">Fecha de Emisión</option>		
														<option value="ACT">Fecha de Activación</option>
													</select>
												</div>
												<div class="col-lg-4">
													<label>Desde</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input" id="m_datepicker_1" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime(date('m/01/Y'))); ?>" onchange="creaTablaContrato();" />
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<label>Hasta</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input" id="m_datepicker_2" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime(date('m/30/Y'))); ?>" onchange="creaTablaContrato();"/>
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Cliente</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Codigo</label>
													<input type="text" class="form-control form-control-sm form-control-sm m-input" name="codCliCon" id="codCliCon" disabled onchange="creaTablaContrato();">
												</div>
												<div class="col-lg-6">
													<label>Apellidos y Nombres</label>
													<input type="text" class="form-control form-control-sm form-control-sm m-input" name="nombreCliCon" id="nombreCliCon" disabled>
												</div>
												<div class="col-lg-1">
													<label>&nbsp;</label>
													<span data-toggle="modal" data-target="#m_modal_2">
														<button type="button" class="m-btn btn btn-sm btn-danger" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar cliente" onclick="creaTablaCliente('contrato');">
															<i class="la la-search"></i>
														</button>
													</span>
												</div>
												<div class="col-lg-1">
													<label>&nbsp;</label>
													<button type="button" class="m-btn btn btn-sm btn-danger" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Limpiar campos" onclick="limpiarCliente();">
															<i class="la la-trash"></i>
													</button>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="col-lg-12">&nbsp;</div>
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Filtros Varios</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Localidad</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="localidad" id="localidad" onchange="creaTablaContrato();">
														<?php
															$tabla = "vtama_localidad";
															$item1 = "cod_localidad";
															$item2 = "dsc_localidad";
															$prueba = controladorEmpresa::
															ctrSelects($tabla,$item1,$item2);
														?>
													</select>
												</div>
												<div class="col-lg-2">
													<label>N° Contrato</label>
													<input type="text" class="form-control form-control-sm m-input" name="numContrato" id="numContrato" onchange="creaTablaContrato();">
												</div>
												<div class="col-lg-1">
													<label>Tipo Nec.</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="tipoNec" id="tipoNec" onchange="creaTablaContrato();">
														<option value="">Todos</option>
														<option value="NI">NI</option>
														<option value="NF">NF</option>
													</select>
												</div>
												<div class="col-lg-3">
													<label>Tipo Servicio</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="tipoServ" id="tipoServ" onchange="creaTablaContrato();">
														<option value="">Todos</option>
														<?php
															$tabla = "vtama_tipo_servicio";
															$item1 = "cod_tipo_servicio";
															$item2 = "dsc_tipo_servicio";
															$prueba = controladorEmpresa::
															ctrSelects($tabla,$item1,$item2);
														?>
													</select>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>	
				</form>
				<br>
				<br>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div id="tablaContrato"></div>
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

<?php

include "modals/modalTablaClientes.php";
include "modals/modalEditContrato.php";
include "modals/modalResolucionContrato.php";
include "modals/modalPrintContrato.php";

 ?>