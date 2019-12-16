<div class="m-content"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Listado de Prospectos
					</h3>
				</div>
			</div>
		</div>
		<!--End: Portlet Head-->
		<div class="m-portlet__body">
			<div class="row">
				<fieldset class="fieldFormHorizontal">
					<legend class="tittle-box">Filtros</legend>
					<div class="col-lg-12">
						<div class="form-group row">
							<div class="col-lg-1">
								<label>De la fecha:</label>
							</div>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" class="form-control form-control-sm m-input"  id="fchIniLisPro" name="fchIniLisPro" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime(date('m/01/Y'))); ?>" onchange="creaTablaProspectos();"/>
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="la la-calendar-check-o"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="col-lg-1" style="text-align: center;">
								<label>a:</label>
							</div>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" class="form-control form-control-sm m-input"  id="fchFinLisPro" name="fchFinLisPro" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y',strtotime(date('m/31/Y'))); ?>" onchange="creaTablaProspectos();"/>
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="la la-calendar-check-o"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="col-lg-1">
								<label>Estado:</label>
							</div>
							<div class="col-lg-2">
								<select class="form-control form-control-sm m-select2 m-select2-general" id="estadoPct" onchange="creaTablaProspectos();">
									<option value="">
										TODOS
									</option>
									<option value="ACT">
										ACTIVO
									</option>
									<option value="VTA">
										CIERRE
									</option>
									<option value="CAD">
										CADUCO
									</option>
									<option value="TRU">
										TRUNCO
									</option>
								</select>
							</div>	
							<div class="col-lg-1">
								<label>Calificación:</label>
							</div>
							<div class="col-lg-2">
								<select class="form-control form-control-sm m-select2 m-select2-general" id="califPct" onchange="creaTablaProspectos();">
									<option value=""></option>
									<?php
										$tabla = "vtama_calificacion_prospecto";
										$item1 = "cod_calificacion";
										$item2 = "dsc_calificacion";
										$prueba = controladorEmpresa::
										ctrSelects($tabla,$item1,$item2);
									?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-1">
								<label>Doc. de Identidad</label>
							</div>
							<div class="col-lg-2">
								<select class="form-control form-control-sm m-select2 m-select2-general" id="tipoDocPct" onchange="creaTablaProspectos();">
									<option value="">
										Seleccione
									</option>
									<?php
										$prueba = controladorEmpresa::ctrtipoDoc();
									?>
								</select>
							</div>
							<div class="col-lg-3">
								<input type="text"  class="form-control form-control-sm m-input" id="numDocPct" onchange="creaTablaProspectos();">
							</div>
							<div class="col-lg-1">
								<label>Supervisor:</label>
							</div>
							<div class="col-lg-2">
								<select class="form-control form-control-sm m-select2 m-select2-general" id="supervPct" onchange="creaTablaProspectos();">
									<option value="">
										Seleccione 
									</option>
									<?php
										$prueba = controladorEmpresa::ctrTrabajador();
									?>
								</select>
							</div>
							<div class="col-lg-1">
								<label>Consejero:</label>
							</div>
							<div class="col-lg-2">
								<select class="form-control form-control-sm m-select2 m-select2-general" id="consejPct" onchange="creaTablaProspectos();">
									<option value="">
										Seleccione
									</option>
									<?php
										$prueba = controladorEmpresa::ctrTrabajador();
									?>
								</select>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<br>
			<div class="row">
				<div class="table-responsive" id="divTablaProspectos">
				</div>		
			</div>
		<!--End: Portlet Body-->
		</div>
	<!--End::Main Portlet-->
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
					<h4 id="codProspecto" style="display: inline;"></h4>
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
									<td class="leftText">Prospecto</td>
									<td class="datosSideBar" id="dscProspecto"></td>
								</tr>
								<tr>
									<td class="leftText" id="tipoDoc"></td>
									<td class="datosSideBar" id="numDoc"></td>
								</tr>
								<tr>
									<td class="leftText">Telefono</td>
									<td class="datosSideBar" id="telefono"></td>
								</tr>
								<tr>
									<td class="leftText">Canal de Venta</td>
									<td class="datosSideBar" id="canalVenta"></td>
								</tr>
								<tr>
									<td class="leftText">Calificación</td>
									<td class="datosSideBar" id="calificacion"></td>
								</tr>
								<tr>
									<td class="leftText">Consejero</td>
									<td class="datosSideBar" id="consejero"></td>
								</tr>
								<tr>
									<td class="leftText">Estado</td>
									<td class="datosSideBar" id="estado"></td>
								</tr>
								<tr>
									<td class="leftText">Ultimo Contacto</td>
									<td class="datosSideBar" id="ultimoContacto"></td>
								</tr>
								<tr>
									<td class="leftText">Importe</td>
									<td class="datosSideBar" id="importe"></td>
								</tr>
								<tr>
									<td>
										<div class="row">
											<div class="col-lg-6" style="text-align: left;">F. Registro</div>
											<div class="col-lg-6" style="text-align: left;" id="fchRegistro"></div>
										</div>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-6" style="text-align: right;">Días</div>
											<div class="col-lg-6" style="text-align: right;" id="dias"></div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>	
					<div class="col-lg-12">
						<label>Observación</label>
						<textarea class="form-control form-control-sm m-input" rows="2" disabled id="observacion"></textarea>
					</div>
					<!-- <div class="col-lg-12">
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
					</div> -->
					<div class="col-lg-12">&nbsp;</div>
					<div class="col-lg-12">&nbsp;</div>
					<div class="col-lg-12 button-box" id="buttons-box">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>