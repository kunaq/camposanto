<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title"  style="display: inline;">
					<h3 class="m-portlet__head-text" style="position: relative;padding-top: 8px;">Uso de Servicios</h3>
				</div>
				<div style="display: inline; float: right;">
					<span data-toggle="modal" data-target="#m_modal_registro_uso_servicio">
						<button class=" m-portlet__nav-link btn-danger btn m-btn m-btn--icon m-btn--icon-only btn-nuevo m-btn--pill" data-toggle="m-tooltip" data-container="body">
							<i class="fa fa-plus"></i>
						</button>
					</span>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="formFiltroContrato">
				<form class="filtroContrato">
					<div class="row">
						<div class="col-lg-4">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Fecha Servicio</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-12">
													<label>Fecha Inicio</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input" id="m_datepicker_1" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime(date('m/d/Y'))); ?>" onchange="creaTablaContrato();" />
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<label>Fecha Fin</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input" id="m_datepicker_2" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime(date('m/d/Y'))); ?>" onchange="creaTablaContrato();"/>
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
						<div class="col-lg-8">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Flitros</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<label>Tipo Autorización</label>
													<select class="form-control form-control-sm m-input" id="">
														<option>1</option>
													</select>
												</div>
												<div class="col-lg-6">
													<label>Estado</label>
													<select class="form-control form-control-sm m-input" id="">
														<option>1</option>
													</select>
												</div>
												<div class="col-lg-6">
													<label>Beneficiario</label>
													<span data-toggle="modal" data-target="#m_modal_2">
														<input type="text" class="form-control form-control-sm m-input" id="">
													</span>
												</div>
												<div class="col-lg-6">
													<label>Uso de Servicio</label>
													<input type="text" class="form-control form-control-sm m-input" id="">
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
					<div id="tablaServicios">
						<div class="table-responsive">
						    <table id="myTableServicio" class="table table-responsive-m table-bordered myTableServicio" cellpadding="0" cellspacing="0" border="0" display="block" >
							    <thead>
							    	<th>N°</th>
						            <th>Tipo Autorización</th>
							        <th>Uso Servicio</th>
						            <th>Estado</th>
							        <th>Fecha Servicio</th>
							        <th>Hora</th>
							        <th>Beneficiario</th>
							        <th>Contrato</th>
							        <th>Espacio</th>
							        <th>Nivel</th>
							        <th>Observación</th>
							    </thead>
							    <tbody>
							    </tbody>
							</table>
						</div>
					</div>
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