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
									<input type="text" class="form-control form-control-sm m-input"  id="fchIniLisPro" name="fchIniLisPro" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
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
									<input type="text" class="form-control form-control-sm m-input"  id="fchFinLisPro" name="fchFinLisPro" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
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
								<select class="form-control form-control-sm m-select2 m-select2-general" >
									<option>
										TODOS
									</option>
									<option>
										ACTIVO
									</option>
									<option>
										CIERRE
									</option>
									<option>
										CADUCO
									</option>
									<option>
										TRUNCO
									</option>
								</select>
							</div>	
							<div class="col-lg-1">
								<label>Calificación:</label>
							</div>
							<div class="col-lg-2">
								<select class="form-control form-control-sm m-select2 m-select2-general" >
									<option>
										SIN CALIFICACIÓN
									</option>
									<option>
										A
									</option>
									<option>
										B
									</option>
									<option>
										C
									</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-1">
								<label>Doc. de Identidad</label>
							</div>
							<div class="col-lg-2">
								<select class="form-control form-control-sm m-select2 m-select2-general" id="tipoDocLisPro" name="tipoDocLisPro" onchange="DocLenghtBusq(this.value);" >
									<option value="vacio">
										Seleccione
									</option>
									<?php
										$prueba = controladorEmpresa::ctrtipoDoc();
									?>
								</select>
							</div>
							<div class="col-lg-3">
								<input type="text"  class="form-control form-control-sm m-input" name="numDocLisPro" id="numDocLisPro">
							</div>
							<div class="col-lg-1">
								<label>Supervisor:</label>
							</div>
							<div class="col-lg-2">
								<select class="form-control form-control-sm m-select2 m-select2-general" >
									<option>
										Seleccione 
									</option>
									<option>
										A
									</option>
									<option>
										B
									</option>
									<option>
										C
									</option>
								</select>
							</div>
							<div class="col-lg-1">
								<label>Consejero:</label>
							</div>
							<div class="col-lg-2">
								<select class="form-control form-control-sm m-select2 m-select2-general" >
									<option>
										Seleccione
									</option>
									<option>
										A
									</option>
									<option>
										B
									</option>
									<option>
										C
									</option>
								</select>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<br>
			<div class="row">
				<div class="table-responsive">
					<table class="table" id="tablListPros">
						<thead>
							<tr>
								<th>Fecha registro</th>
								<th>Días</th>
								<th>Código</th>
								<th>Prospecto</th>
								<th>Tipo Doc.</th>
								<th>Núm. Doc.</th>
								<th>Télefono</th>
								<th>Canal Venta</th>
								<th>Calif.</th>
								<th>Consejero</th>
								<th>Estado</th>
								<th>Ultimo contacto</th>
								<th>Observación</th>
								<th>Importe venta</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>20/10/2019</td>
								<td style="text-align: center;">33</td>
								<td>
									<div id="m_quick_sidebar-contrato_toggle" class="m-nav__item">
			                            <a href="#" class="m-nav__link m-dropdown__toggle" onclick="mostrarSidebar('.$auxNumCtt.','.$tcodServicio.');">
			                                <span class="m-nav__link-icon">PVT0028014</span>
			                            </a>
			                        </div>
                    			</td>
								<td>HUANCO, KATHERIN</td>
								<td>DNI</td>
								<td>12345678</td>
								<td>912123123</td>
								<td>TURNO CAMPO</td>
								<td style="text-align: center;">C</td>
								<td>A. CERRON</td>
								<td>TRUNCO</td>
								<td>20/10/2019</td>
								<td>LLAMAR 20/10/2019</td>
								<td style="text-align: right;">1,234.44</td>
							</tr>
							<tr>
								<td>20/10/2019</td>
								<td style="text-align: center;">33</td>
								<td>PVT0028014</td>
								<td>HUANCO, KATHERIN</td>
								<td>DNI</td>
								<td>12345678</td>
								<td>912123123</td>
								<td>TURNO CAMPO</td>
								<td style="text-align: center;">C</td>
								<td>A. CERRON</td>
								<td>TRUNCO</td>
								<td>20/10/2019</td>
								<td>LLAMAR 20/10/2019</td>
								<td style="text-align: right;">1,234.44</td>
							</tr>
							<tr>
								<td>20/10/2019</td>
								<td style="text-align: center;">33</td>
								<td>PVT0028014</td>
								<td>HUANCO, KATHERIN</td>
								<td>DNI</td>
								<td>12345678</td>
								<td>912123123</td>
								<td>TURNO CAMPO</td>
								<td style="text-align: center;">C</td>
								<td>A. CERRON</td>
								<td>TRUNCO</td>
								<td>20/10/2019</td>
								<td>LLAMAR 20/10/2019</td>
								<td style="text-align: right;">1,234.44</td>
							</tr>
							<tr>
								<td>20/10/2019</td>
								<td style="text-align: center;">33</td>
								<td>PVT0028014</td>
								<td>HUANCO, KATHERIN</td>
								<td>DNI</td>
								<td>12345678</td>
								<td>912123123</td>
								<td>TURNO CAMPO</td>
								<td style="text-align: center;">C</td>
								<td>A. CERRON</td>
								<td>TRUNCO</td>
								<td>20/10/2019</td>
								<td>LLAMAR 20/10/2019</td>
								<td style="text-align: right;">1,234.44</td>
							</tr>
							<tr>
								<td>20/10/2019</td>
								<td style="text-align: center;">33</td>
								<td>PVT0028014</td>
								<td>HUANCO, KATHERIN</td>
								<td>DNI</td>
								<td>12345678</td>
								<td>912123123</td>
								<td>TURNO CAMPO</td>
								<td style="text-align: center;">C</td>
								<td>A. CERRON</td>
								<td>TRUNCO</td>
								<td>20/10/2019</td>
								<td>LLAMAR 20/10/2019</td>
								<td style="text-align: right;">1,234.44</td>
							</tr>
						</tbody>
					</table>
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
					<h4 id="numCttSideBar" style="display: inline;">PVT0028014</h4>
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
									<td class="datosSideBar" id="fchEmiSideBar">HUANCO, KATHERINE</td>
								</tr>
								<tr>
									<td class="leftText">DNI</td>
									<td class="datosSideBar" id="fchActSideBar">12345678</td>
								</tr>
								<tr>
									<td class="leftText">Telefono</td>
									<td class="datosSideBar" id="fchResSideBar">976433032</td>
								</tr>
								<tr>
									<td class="leftText">Canal de Venta</td>
									<td class="datosSideBar" id="fchAnuSideBar">TURNO CAMPO</td>
								</tr>
								<tr>
									<td class="leftText">Calificación</td>
									<td class="datosSideBar" id="fchResSideBar">C</td>
								</tr>
								<tr>
									<td class="leftText">Consejero</td>
									<td class="datosSideBar" id="fchAnuSideBar">A. CERRON</td>
								</tr>
								<tr>
									<td class="leftText">Estado</td>
									<td class="datosSideBar" id="fchResSideBar">TRUNCO</td>
								</tr>
								<tr>
									<td class="leftText">Ultimo Contacto</td>
									<td class="datosSideBar" id="fchAnuSideBar">20/10/2019</td>
								</tr>
								<tr>
									<td class="leftText">Importe</td>
									<td class="datosSideBar" id="fchResSideBar">1,234.44</td>
								</tr>
								<tr>
									<td>
										<div class="row">
											<div class="col-lg-6" style="text-align: left;">F. Registro</div>
											<div class="col-lg-6" style="text-align: left;">20/10/2019</div>
										</div>
									</td>
									<td>
										<div class="row">
											<div class="col-lg-6" style="text-align: right;">Días</div>
											<div class="col-lg-6" style="text-align: right;">33</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-lg-12">&nbsp;</div>
					<div class="col-lg-12">
						<label>Observación</label>
						<textarea class="form-control form-control-sm m-input" rows="2" disabled>LLAMAR 20/10/2019</textarea>
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
					<div class="col-lg-12 button-box">
                            <a href="registro-prospecto" target="_blank" type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Modificar" onclick="">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button target="_blank" type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Eliminar" onclick="">
                                <i class="fa fa-trash"></i>
                            </button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>