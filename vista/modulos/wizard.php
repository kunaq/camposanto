<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Generación de contrato 
						<?php
							//$prueba = controladorEmpresa::ctrtipoCambio();
						  ?>  
					</h3>
				</div>
			</div>
		</div>
		<!--end: Portlet Head-->
		<div class="m-portlet__body" style="padding-top: 0">
		<!--begin: Portlet Body-->	
<!--begin: Form Wizard-->
		<div class="m-wizard m-wizard--2 m-wizard--yellow" id="m_wizard">
			<!--begin: Message container -->
			<div class="m-portlet__padding-x">
				<!-- Here you can put a message or alert -->
			</div>
			<!--end: Message container -->
<!--begin: Form Wizard Head -->
			<div class="m-wizard__head m-portlet__padding-x">
				<!--begin: Form Wizard Progress -->
				<div class="m-wizard__progress">
					<div class="progress">
						<div class="progress-bar" role="progressbar"  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				<!--end: Form Wizard Progress -->  
<!--begin: Form Wizard Nav -->
				<div class="m-wizard__nav">
					<div class="m-wizard__steps">
						<div class="m-wizard__step m-wizard__step--current"  m-wizard-target="m_wizard_form_step_1">
							<a href="#"  class="m-wizard__step-number">
								<span>
									<i class="fa  flaticon-list-3"></i>
								</span>
							</a>
							<div class="m-wizard__step-info">
								<div class="m-wizard__step-title">
									1. Inf. general
								</div>
							</div>
						</div>
						<div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
							<a href="#" class="m-wizard__step-number">
								<span>
									<i class="fa  flaticon-layers"></i>
								</span>
							</a>
							<div class="m-wizard__step-info">
								<div class="m-wizard__step-title">
									2. Detalle de la venta
								</div>
							</div>
						</div>
						<div class="m-wizard__step" m-wizard-target="m_wizard_form_step_5">
							<a href="#" class="m-wizard__step-number">
								<span>
									<i class="fa  flaticon-calendar"></i>
								</span>
							</a>
							<div class="m-wizard__step-info">
								<div class="m-wizard__step-title">
									3. Cronograma
								</div>
							</div>
						</div>
						<div class="m-wizard__step" m-wizard-target="m_wizard_form_step_6">
							<a href="#" class="m-wizard__step-number">
								<span>
									<i class="fa  flaticon-user"></i>
								</span>
							</a>
							<div class="m-wizard__step-info">
								<div class="m-wizard__step-title">
									4. Beneficiario
								</div>
							</div>
						</div>
						<div class="m-wizard__step" m-wizard-target="m_wizard_form_step_7">
							<a href="#" class="m-wizard__step-number">
								<span>
									<i class="fa  flaticon-list"></i>
								</span>
							</a>
							<div class="m-wizard__step-info">
								<div class="m-wizard__step-title">
									5. Comprobante
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="m-separator m-separator--dashed m-separator--lg" style="margin: 40px 0 -10px 0;"></div>
			<div class="m-wizard__form">
				<form class="m-form m-form--label-align-left- m-form--state-" id="m_form">
					<!--begin: Form Body -->
					<div class="m-portlet__body">
						<!--begin: Form Wizard Step 1-->
						<div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<div class="row">
										<div class="col-lg-12">
											<fieldset class="fieldFormHorizontal">
												<legend class="tittle-box">Datos de Programa</legend>
												<legend class="sidecheck">
													<div class="row form-group">
														<div class="col-lg-9" style="padding-right: 0;">
															<label>Venta por regularización</label>
														</div>
														<div class="col-lg-3">
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
																<label>
																	<input type="checkbox" name="regularizacionCheck" id="regularizacionCheck">
																	<span></span>
																</label>
															</span>
														</div>
													</div>
												</legend>
												<div class="col-lg-12">
													<div class="row form-group">
														<div class="col-lg-9">
															<label>
																Tipo de programa *
															</label>
															<select class="form-control form-control-sm m-input m-select2 m-select2-general" required name="tipPro" id="tipPro" onchange="validaEspacio(this.value);">
																<option value="">
																	Seleccione el tipo de programa
																</option>
																<?php
																	$tabla = "vtama_tipo_recaudacion";
																	$item1 = "cod_tipo_recaudacion";
																	$item2 = "dsc_tipo_recaudacion";
																	$prueba = controladorEmpresa::
																	ctrSelects($tabla,$item1,$item2);
																  ?> 
															</select>
															<input type="hidden" name="flagIntegral" id="flagIntegral">
															<input type="hidden" name="flagNvoCtto" id="flagNvoCtto">
														</div>
														<div class="col-lg-3">
															<label class="">
															T.C.:
															</label>
															<div class="input-group m-input-group">
																<input type="text" class="form-control form-control-sm m-input" id="tipoCamb" name="tipoCamb" value=" <?php $prueba = controladorEmpresa::ctrtipoCambio(); ?>" placeholder="">
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Representante de ventas</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-4">
													<label class="">
													Vendedor *
													</label>
													<div class="input-group m-input-group input-group-sm">
														<select class="form-control form-control-sm m-select2 m-select2-general" id="codVendedor" name="codVendedor">
															<option>
																Código
															</option>
															<?php
																$prueba = controladorEmpresa::
																ctrcodVendedor();
															  ?>
														</select>
													</div>
												</div>
												<div class="col-lg-8">
													<label class="">
														&nbsp;
													</label>
													<br>
													<div class="input-group m-input-group">
														<input type="text" class="form-control form-control-sm m-input" name="nomVendedor" disabled id="nomVendedor" placeholder="">
														<div class="input-group-append">
															<span data-toggle="modal" data-target="#m_modal_4">
																<button type="button" class="btn btnGuardarKqPst btn-sm" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar vendedor" onclick="creaTablaVendedor();">
																	<i class="la la-search"></i>
																</button>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="form-group m-form__group row" style="padding-top: 0">
								<div class="col-lg-6">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Plan/Subtipo de servicio</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-9">
													<label>
														Tipo de Servicio *
													</label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="planSS" id="planSS" onchange="buscaSubtipo(this.value);">
														<option value="">
															Seleccione el tipo de Servicio
														</option>
														<?php
														  $tabla="vtama_tipo_servicio";
														  $item1="cod_tipo_servicio";
														  $item2="dsc_tipo_servicio";
						  									$prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
														  ?> 
													</select>
												</div>
												<div class="col-lg-3">
													<label> Tipo de Nec. *</label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="tiponec" id="tiponec">
														<option value="NF">NF</option>
														<option value="NI">NI</option>
													</select>
												</div>
												<div class="col-lg-12">
													<label>Subtipo *</label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" id="subServicio" required name="subServicio">
														<option value="">
															Seleccione el subtipo de Servicio
														</option>
													</select>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-6">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Cliente *</legend>
										<legend class="sidecheck">
											<div class="row form-group">
												<div class="col-lg-6" style="padding-right: 0;">
													<label>Juridico</label>
												</div>
												<div class="col-lg-3">
													<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
														<label>
															<input type="checkbox" name="juridico" id="juridico">
															<span></span>
														</label>
													</span>
												</div>
											</div>
										</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-4">
													<label>Tipo doc: </label>
													<select disabled class="form-control form-control-sm m-input custom-select custom-select-danger" id="TipoDcoCliente" name="TipoDcoCliente">
														<option value="">
															Seleccione
														</option>
														<?php
															$prueba = controladorEmpresa::ctrtipoDoc();
														 ?> 
													</select>
												</div>
												<div class="col-lg-4">
													<label class="">
														&nbsp;
													</label>
													<select class="form-control form-control-sm m-select2 m-select2-general" id="numDocCliente" name="numDocCliente" >
														<option>
															Número de documento *
														</option>
														<?php
															$prueba = controladorEmpresa::ctrdocCliente();
														  ?>
													</select>
												</div>
												<input type="hidden" name="cod_cliente" id="cod_cliente">
												<div class="col-lg-4">	
													<span data-toggle="modal" data-target="#m_modal_2">
													<button type="button" class="m-btn btn btnGuardarKqPst btn-sm mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar cliente" onclick="creaTablaCliente('cliente');">
														<i class="la la-search"></i>
													</button>
													</span>
													<span data-toggle="modal" data-target="#m_modal_1">
													<button type="button" class="m-btn btn btnEditarKqPst2 btn-sm mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Registrar nuevo cliente">
														<i class="la la-user-plus"></i>
													</button>
													</span>													
													<span data-toggle="modal" data-target="#m_modal_3">
													<button type="button" class="m-btn btn btn-metal btn-sm mt25" 
															data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar prospecto" onclick="creaTablaProspecto();">
														<i class="la la-users"></i>
													</button>
													</span>
												</div>
												<div class="col-lg-12">
													<label>Apellido y Nombre: * </label>
													<div class="input-group m-input-group">
														<input type="text" class="form-control form-control-sm m-input" name="nombreCliente" disabled id="nombreCliente">
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Datos de Espacio</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Camposanto *</label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="camposanto" required id="camposanto" disabled="disabled">
														<?php
														  $tabla = "vtama_camposanto";
														  $item1 = "cod_camposanto";
														  $item2 = "dsc_camposanto";
												           $prueba = controladorEmpresa::ctrCamposanto();
														  ?>
													</select>
												</div>
												<div class="col-lg-3">
													<label> Tipo plataforma:</label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="tipoPlat" disabled="disabled" id="tipoPlat" onchange="buscaPlataforma(this.value);">
														<option value="">Tipo de plataforma</option>
														<option value="TP001">NICHO</option>
														<option value="TP002">PLATAFORMA</option>
													</select>
												</div>
												<div class="col-lg-4">
													<label>Plataforma: </label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="plataforma" id="plataforma" disabled="disabled" onchange="buscaArea(this.value);">
														<option disabled value="">Plataforma</option>
													</select>
												</div>
												<div class="col-lg-2">
													<label>Área: </label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="area" id="area" disabled="disabled" onchange="buscaEjex(this.value);">
														<option value="">Área</option>
													</select>			
												</div>
												<div class="col-lg-2">
													<label>Eje Horiz:</label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="ejex" id="ejex" disabled="disabled" onchange="buscaEjey(this.value);">
														<option disabled value="">Eje Hor.</option>
													</select>
												</div>
												<div class="col-lg-2">
													<label>Eje Vert:</label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="ejey" id="ejey" disabled="disabled" onchange="buscaEspacio(this.value);">
														<option disabled value="">Eje Ver.</option>
													</select>
												</div>
												<div class="col-lg-3">
													<label>Espacio:</label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="espacio" id="espacio" disabled onchange="buscanomEspacio(this.value);">
													</select>
												</div>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<label>Tipo: </label>
														<input type="text" class="form-control form-control-sm m-input" name="tipoEspacio" id="tipoEspacio" disabled="disabled">
													</div>
												</div>
												<div class="col-lg-2">
													<br>
													<h4 id="estado" class="estado"></h4>
												</div>
												<div class="col-lg-3">
													<span id="espacioWiz"></span>
												</div>
											</div>
										</div>
									</fieldset>									
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Contrato</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>
													Localidad:
													</label>
													<select class="form-control form-control-sm m-input m-select2 m-select2-general" disabled name="localidad" id="localidad">
														<!-- <option value="">Seleccione</option> -->
														<?php
															$tabla = "vtama_localidad";
															$item1 = "cod_localidad";
															$item2 = "dsc_localidad";
															$prueba = controladorEmpresa::
															ctrSelects($tabla,$item1,$item2);
														?>
													</select>
												</div>
												<div class="col-lg-3">
													<label class="">
													Contrato:
													</label>
													<input type="text" class="form-control form-control-sm m-input"  name="ctt" id="ctt" disabled="disabled">
												</div>
												<div class="col-lg-3">
													<label class="">
														Programa:
													</label>
													<div class="input-group">
														<input type="text" class="form-control form-control-sm m-input" placeholder="Programa" disabled>
													</div>
												</div>
												<div class="col-lg-3" style="margin-top: 2rem;">
													<div class="row">
														<div class="col-lg-4">
															<label class="m-checkbox">
																Modificación
															</label>
														</div>
														<div class="col-lg-2">
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
																<label>
																	<input type="checkbox" name="modificaCtt" id="modificaCtt" onclick="modificarctt();">
																	<span></span>
																</label>
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
					</div>
						<!--end: Form Wizard Step 1-->
						<!--begin: Form Wizard Step 2-->
						<div class="m-wizard__form-step" id="m_wizard_form_step_2">
							<div class="row">
								<div class="col-sm-2 offset-sm-10 col-md-1 offset-md-11">
									<div class="row">
										<div class="col-lg-12">
											<p style="text-align: center;"><button type="button" class="btn btn-metal m-btn m-btn--icon m-btn--icon-only m-btn--pill" data-placement="top" data-toggle="m-tooltip" data-container="body" data-original-title="Para modificación se tomará como descuento lo ya pagado."><i class="fa fa-question"></i></button>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10 col-md-6">
									<label>
										<h4>Servicios principales (Planes y/o adicionales)</h4>
									</label>
								</div>
								<div class="col-sm-6 col-md-3 offset-md-2" style="align-self:start; margin-right: -0.7rem;">		
									<div class="row">
										<div class="col-lg-6">
											<label class="">
											Importe CUI:
											</label>
										</div>
										<div class="col-lg-6"> 
											<div class="input-group">
												<input type="text" class="form-control form-control-sm m-input" id="importeCUI" name="importeCUI" placeholder="0,00" onchange="cambiaCUI();" style="text-align: right;">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-1">
									<div class="row">
										<div class="col-lg-12" style="text-align: right;">
											<span data-toggle="modal" data-target="#m_modal_6">
												<button class="btn btnGuardarKqPst m-btn" type="button" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Añadir servicio" onclick="callTablaServiciosAdic();">
													<i class="fa fa-plus"></i>
												</button>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<div class="m-input-icon m-input-icon--right">
										<div class="m-section m-demo m-demo__preview">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="400">
												<div class="table-responsive">
	               		 							<table class="table" id="servAgregados">
														<thead style="text-align: center;">
															<tr>
																<th>
																	Servicio
																</th>
																<th>
																	Ctd
																</th>
																<th>
																	P. lista
																</th>
																<th>
																	P. venta
																</th>
																<th>
																	Imp. Dscto
																</th>
																<th>
																	Imp. total
																</th>
																<th>
																	FOMA
																</th>
																<th>
																	Carencia
																</th>
																<th>
																	Imp. CUI
																</th>
																<th>
																	Endoso
																</th>
																<th>
																	Saldo
																</th>
																<th>
																	Acción
																</th>
															</tr>
														</thead>
														<tbody  id="bodyServicio" style="height: 300px;">
														</tbody>
														<tfoot >
															<tr>
																<td></td>
																<td></td>
																<td class="Total">
																	<b>Totales:</b>
																</td>
																<td class="Total A">
																	0.00
																</td>
																<td class="Total B">
																	0.00
																</td>
																<td class="Total C">
																	0.00
																</td>
																<td class="Total D">
																	0.00
																</td>
																<td class="Total E">
																	0.00
																</td>
																<td class="Total F">
																	0.00
																</td>
																<td class="Total G">
																	0.00
																</td>
																<td class="Total H">
																	0.00
																</td>
																<td></td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2 offset-sm-10 col-md-1 offset-md-11">
									<p style="text-align: center;"><button type="button" class="btn btn-metal m-btn m-btn--icon m-btn--icon-only m-btn--pill" data-placement="top" data-toggle="m-tooltip" data-container="body" data-original-title="Ingrese los descuentos que van a reducir el precio total por los servicios adquiridos por el usuario."><i class="fa fa-question"></i></button>
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10 col-md-6">
									<label>
										<h4>Descuentos</h4>
									</label>
								</div>
								<div class="col-sm-6 col-md-1 offset-md-5">
									<span data-toggle="modal" >
										<button class="btn btnGuardarKqPst m-btn" type="button" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Añadir descuento" onclick="callTablaDscto();">
											<i class="fa fa-plus"></i>
										</button>
									</span>		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<div class="m-input-icon m-input-icon--right">
										<div class="m-section  m-demo m-demo__preview">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
												<div class="table-responsive">
													<table class="table">
														<thead style="text-align: center;">
															<tr>
																<th>
																	Código
																</th>
																<th>
																	Descripción del descuento
																</th>
																<th>
																	M
																</th>
																<th>
																	Valor del dscto
																</th>
																<th>
																	Dscto libre
																</th>
																<th>
																	Dscto %
																</th>
																<th>
																	Descuento final 
																</th>
																<th>
																	Acción
																</th>
															</tr>
														</thead>
														<tbody id="bodyDscto" style="height: 105px;">
														</tbody>
														<tfoot>
															<tr>
																<td>
																	&nbsp;
																</td>
																<td>
																	&nbsp;
																</td>
																<td>
																	&nbsp;
																</td>
																<td>
																	&nbsp;
																</td>
																<td>
																	<b>Total S/:</b>
																</td>
																<td>
																	&nbsp;
																</td>
																<td class="TotalD A" style="text-align: right;">
																	0,00
																</td>
															</tr>	
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-sm-10 col-md-6">
									<label>
										<h4>Coberturas (Endosos)</h4>
									</label>
								</div>
								<div class="col-sm-6 col-md-4 offset-md-1" style="align-self:start; margin-right: -0.2rem;">		
									<div class="row">
										<div class="col-md-6">
											<label class="">
											Importe total en S/.:
											</label>
										</div>
										<div class="col-md-6"> 
											<div class="input-group">
												<input type="text" disabled class="form-control form-control-sm m-input" id="endoso1" name="endoso1" placeholder="0,00" style="text-align: right;">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-1" style="text-align: center;">
									<span data-toggle="modal" >
										<button class="btn btnGuardarKqPst m-btn" type="button" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Añadir descuento" onclick="callTablaEndoso();">
											<i class="fa fa-plus"></i>
										</button>
									</span>
								</div>
							</div>
								<div class="col-lg-12">
									<div class="m-input-icon m-input-icon--right">
										<div class="m-section  m-demo m-demo__preview">
											<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="320">
												<div class="table-responsive">
												<table class="table">
													<thead style="text-align: center;">
														<tr>
															<th>
																Entidad
															</th>
															<th>
																Fecha de vencimiento
															</th>
															<th>
																M
															</th>
															<th>
																Importe
															</th>
															<th>
																Acción
															</th>
														</tr>
													</thead>
													<tbody id="bodyCobertura" style="height: 225px;">	
													</tbody>
													<tfoot>
														<tr>
															<td>
																&nbsp;
															</td>
															<td>
																<b>Total S/:</b>
															</td>
															<td>
																&nbsp;
															</td>
															<td class="totalEndoso">
																0,00
															</td>
															<td></td>
														</tr>
													</tfoot>
												</table>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
					
						<!--end: Form Wizard Step 2--> 
						<div class="m-wizard__form-step" id="m_wizard_form_step_5">
							<div class="row">
								<div class="col-lg-5">
									<fieldset class="fieldFormHorizontal">
										<legend>&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6 form-group">
													<label>Saldo a financiar</label>
													<input type="text" disabled id="saldoFinanciar" name="saldoFinanciar" style="text-align: right;" class="form-control form-control-sm m-input" placeholder="0,00">
												</div>
												<div class="col-lg-6 form-group">
													<label>N° de Cuotas</label>
													<select class="form-control form-control-sm m-select2 m-select2-general" name="numCuotas" id="numCuotas" style="width: 100%">
														<option>
															Seleccione... 
														</option>
														<?php
														  $tabla="vtama_cuota";
														  $item1="num_cuotas";
														  $item2="dsc_cuota";
						 						 			$prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
														  ?> 
													</select>
												</div>
												<div class="col-lg-6">
													<label>1er Vencimiento</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_1" data-date-format="dd/mm/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<label>Interes</label>
													<select class="form-control form-control-sm m-select2 m-select2-general" id="interes" name="interes" style="width: 100%">
														<option>
															Seleccione...
														</option>
														<?php
															 $tabla="vtama_interes";
														  $item1="num_valor";
														  $item2="dsc_interes";
						 								 $prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
														  ?>
													</select>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-4">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">
											<table>
												<tbody>
														<td>Cuotas Definidas</td>
														<td>
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
																<label class="cb">
																	<input type="checkbox" name="" id="cuoDefi" onchange="desabilitar();">
																	<span></span>
																</label>
															</span>
														</td>
												</tbody>
											</table>
										</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<label>Cuota inicial: </label>
													<input type="text" id="cuoIni" class="form-control form-control-sm m-input" disabled placeholder="0">
												</div>
												<div class="col-lg-6">
													<label>Cuota final: </label>
													<input type="text" id="cuoFin" class="form-control form-control-sm m-input" disabled placeholder="0">		
												</div>
												<div class="col-lg-6">
													<label>Valor de cuota: </label>
													<input type="text" id="valCuo" class="form-control form-control-sm m-input" disabled placeholder="0,00" style="text-align: right;">
												</div>
												<div class="col-lg-6" style="text-align: center;">
													<button type="button" onclick="CuoDefinidas();" class="btn btnGuardarKqPst m-btn m-btn m-btn--icon m-btn--pill" disabled id="btnCuoDef">
														<span>
															<span>&nbsp;</span>
															<i class="fa fa-file-text-o"></i>
															<span>&nbsp;</span>
														</span>
													</button>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-3">
									<div class="row">
										<div class="col-lg-12 form-group" style="text-align: center;">
											<button type="button" onclick="cronograma();" class="btn m-btn--pill btnGuardarKqPst" id="botonCrono">
												&nbsp;&nbsp;&nbsp;&nbsp;Generar cronograma&nbsp;&nbsp;&nbsp;&nbsp;
											</button>
										</div>
										<div class="col-lg-12 form-group" style="text-align: center;">
											<button type="button" class="btn m-btn--pill btnEditarKqPst2" id="botonCronoCui">
												Generar cronograma CUI
											</button>
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-9">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="300">
										<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>N°</th>
													<th>Tipo de cuota</th>
													<th>Estado</th>
													<th>Fecha de Venc.</th>
													<th>Subtotal</th>
													<th>Interés</th>
													<th>I.G.V.</th>
													<th>Total</th>
													<th>Saldo</th>
												</tr>
											</thead>
											<tbody id="bodyCronograma">	
											</tbody>
											<tfoot id="footCronograma">
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td class="Suma">Total</td>
													<td class="Suma A" style="text-align: right;">0,00</td>
													<td class="Suma B" style="text-align: right;">0,00</td>
													<td class="Suma C" style="text-align: right;">0,00</td>
													<td class="Suma D" style="text-align: right;">0,00</td>
													<td class="Suma E" style="text-align: right;">0,00</td>
												</tr>
											</tfoot>
										</table>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">FOMA</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-12">
													<label>Saldo de FOMA</label>
													<input type="text" id="imp_saldo_foma" name="imp_saldo_foma" class="form-control form-control-sm m-input" disabled placeholder="0,00" style="text-align: right;">
												</div>
												<div class="col-lg-12">&nbsp;</div>
												<div class="col-lg-12">
													<label>Numero de cuotas</label>
													<select class="form-control form-control-sm m-select2 m-select2-general" name="cuota_FOMA" id="cuota_FOMA" style="width: 100%">
														<option>
														Seleccione... 
														</option>
														<?php
														  $tabla="vtama_cuota";
														  $item1="num_cuotas";
														  $item2="dsc_cuota";
						 						 		$prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
														  ?> 
													</select>
												</div>
												<div class="col-lg-12">&nbsp;</div>
												<div class="col-lg-12">
													<label>Fecha 1ra Cuota</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input" id="m_datepicker_2_validate" data-date-format="dd/mm/yyyy" />
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-12" style="text-align: center;">
														<button type="button" class="btn m-btn--pill btnEditarKqPst2 mt25" id="cb_generar_foma" onclick="generaFOMA()">
															Generar cuotas de FOMA
														</button>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<!--end: Form Wizard Step 5-->

						<div class="m-wizard__form-step" id="m_wizard_form_step_6">
							<div class="row">
								<div class="col-lg-6 ">
									<label class="">
										<h5>Beneficiarios</h5>
									</label>
									<div class="m-demo m-demo__preview">
										<div class="m-form__group rowm-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="450">
											<div class="table-responsive">
											<table class="table m-table m-table--head-bg-metal table-hover" >
												<thead >
													<tr>
														<th>
															Documento
														</th>
														<th>
															Nombres
														</th>
														<th>
															Apellidos
														</th>
													</tr>
												</thead>
												<tbody id="bodyBeneficiario">
													
												</tbody>
											</table>
											</div>
										</div>
									</div>
									<div class="m-form__group row">
										<div class="col-lg-2 offset-lg-2">
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" id="botonAgregarB" type="button" title="" data-original-title="Agregar beneficiario" onclick="cargaFormBenef();" class="btn btnGuardarKqPst btn-lg m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="la la-user-plus"></i>
													<span>&nbsp;</span>
												</span>
											</button>
											<button data-toggle="m-tooltip" hidden="hidden" data-container="body" data-placement="top" type="button" id="botonModificarB" title="" data-original-title="Guardar cambios" onclick="" class="btn btn-success btn-lg m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="la la-check"></i>
													<span>&nbsp;</span>
												</span>
											</button>
											<button data-toggle="m-tooltip" hidden="hidden" data-container="body" data-placement="top" type="button" id="botonGuardarB" title="" data-original-title="Guardar beneficiario" onclick="guardaBenef();" class="btn btnGuardarKqPst btn-lg m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="la la-check"></i>
													<span>&nbsp;</span>
												</span>
											</button>	
										</div>
										<div class="col-lg-2 offset-lg-1">
											<button data-toggle="m-tooltip" type="button" data-container="body" data-placement="top" title="" data-original-title="Editar beneficiario" id="botonEditaB" class="btn btnEditarKqPst2 btn-lg m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="flaticon-edit-1"></i>
													<span>&nbsp;</span>
												</span>
											</button>	
										</div>
										<div class="col-lg-2 offset-lg-1">
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" title="" id="botonEliminarB" data-original-title="Eliminar beneficiario" class="btn btn-danger btn-lg m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="la la-user-times"></i>
													<span>&nbsp;</span>
												</span>
											</button>
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Descartar cambios" id="botonDescartarB" onclick="limpiaydsi();" hidden="hidden" class="btn btn-danger btn-lg m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="la la-remove"></i>
													<span>&nbsp;</span>
												</span>
											</button>
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Descartar cambios" id="botonCancelarEdicionB" hidden="hidden" class="btn btn-danger btn-lg m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="la la-remove"></i>
													<span>&nbsp;</span>
												</span>
											</button>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Datos del Beneficiario</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3 form-group">
													<label class="">
														Tipo de documento:
													</label>
												</div>
												<div class="col-lg-3 form-group">
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" disabled name="tipoDocBenef" id="tipoDocBenef" onchange="DocLengthBenef(this.value);">
														<option value="">
														Seleccione
														</option>
														<?php
															$prueba = controladorEmpresa::
															ctrtipoDoc();
														  ?> 		
													</select>
												</div>
												<div class="col-lg-3 form-group">
													<label class="">
														N° de documento:
													</label>
												</div>
												<div class="col-lg-3 form-group">
													<input type="text" id="numDocBenef" disabled class="form-control form-control-sm m-input" >
												</div>
												<div class="col-lg-3 form-group">
													<label class="">
														Apellido paterno:
													</label>
												</div>
												<div class="col-lg-9 form-group">
													<input type="text" disabled id="apellPaternoBenef" class="form-control form-control-sm m-input">
												</div>
												<div class="col-lg-3 form-group">
													<label class="">
														Apellido materno:
													</label>
												</div>
												<div class="col-lg-9 form-group">
													<input type="text" disabled id="apellMaternoBenef" class="form-control form-control-sm m-input">
												</div>
												<div class="col-lg-3 form-group">
													<label class="">
														Nombres:
													</label>
												</div>
												<div class="col-lg-9 form-group">
													<input type="text" disabled id="nombreBenef" class="form-control form-control-sm m-input">
												</div>
												<div class="col-lg-2 form-group">
													<label>Fecha de nacimiento:</label>
												</div>
												<div class="col-lg-4 form-group">
													<div class="input-group date">
														<input type="text" disabled class="form-control form-control-sm m-input" readonly  placeholder="Seleccionar fecha" id="m_datepicker_1_modal" data-date-format="dd/mm/yyyy"/>
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-2 form-group">
													<label>Fecha de deceso:</label>
												</div>
												<div class="col-lg-4 form-group">
													<div class="input-group date">
														<input type="text" disabled class="form-control form-control-sm m-input" readonly  placeholder="Seleccionar fecha" id="m_datepicker_2" data-date-format="dd/mm/yyyy"/>
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-2 form-group">
													<label class="">
														Religión:
													</label>
												</div>
												<div class="col-lg-4 form-group">
													<select disabled class="form-control form-control-sm m-input custom-select custom-select-danger" name="religionBenef" id="religionBenef">
														<option value="">
															Seleccione
														</option>
														<?php
														  $tabla="vtama_religion";
														  $item1="cod_religion";
														  $item2="dsc_religion";
						 						           $prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
														?> 
													</select>
												</div>
												<div class="col-lg-2 form-group">
													<label class="">
														Estado civil:
													</label>
												</div>
												<div class="col-lg-4 form-group">
													<select disabled class="form-control form-control-sm m-input custom-select custom-select-danger" name="edoCivilBenef" id="edoCivilBenef">
														<option value="">
															Seleccione
														</option>
														<?php
						  						         $prueba=controladorEmpresa::ctrestadocivil();
														?> 
													</select>
												</div>
												<div class="col-lg-2 form-group">
													<label class="">
														Sexo:
													</label>
												</div>
												<div class="col-lg-4 form-group">
													<select disabled class="form-control form-control-sm m-input custom-select custom-select-danger" name="sexoBenef" id="sexoBenef">
														<option value="">
															Seleccione
														</option>
														<option value="M">
															Masculino
														</option>
														<option value="F">
															Femenino
														</option>
													</select>
												</div>
												<div class="col-lg-2 form-group">
													<label class="">
														Parentescos:
													</label>
												</div>
												<div class="col-lg-4 form-group">
													<select disabled class="form-control form-control-sm m-input custom-select custom-select-danger" name="parentescoBenef" id="parentescoBenef">
														<option value="">
															Seleccione
														</option>
														<?php
														  $tabla="vtama_parentesco";
														  $item1="cod_parentesco";
														  $item2="dsc_parentesco";
						 									$prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
														?> 
													</select>
												</div>
												<div class="col-lg-2 form-group">
													<label class="">
														Lugar deceso:
													</label>
												</div>
												<div class="col-lg-4 form-group">
													<select disabled class="form-control form-control-sm m-input custom-select custom-select-danger" name="lugarDecesoBenef" id="lugarDecesoBenef">
														<option value="">
															Seleccione
														</option>
														<?php
														  $tabla="vtama_lugar_deceso";
														  $item1="cod_lugar_deceso";
														  $item2="dsc_lugar_deceso";
						 						          $prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
														?>
													</select>
												</div>
												<div class="col-lg-2 form-group">
													<label class="">
														Motivo deceso:
													</label>
												</div>
												<div class="col-lg-4 form-group">
													<select disabled class="form-control form-control-sm m-input custom-select custom-select-danger" name="motivoDecesoBenef" id="motivoDecesoBenef">
														<option value="">
															Seleccione
														</option>
														<?php
														  $tabla="vtama_motivo_deceso";
														  $item1="cod_motivo_deceso";
														  $item2="dsc_motivo_deceso";
						 						          $prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
														?>
													</select>
												</div>
												<div class="col-lg-2 form-group">
													<label class="">
														Peso:
													</label>
												</div>
												<div class="col-lg-2 form-group">
													<input disabled type="text" id="pesoBenef" class="form-control form-control-sm m-input" placeholder="">
												</div>
												<div class="col-lg-2 form-group">
													<label class="">
														Talla:
													</label>
												</div>
												<div class="col-lg-2 form-group">
													<input disabled type="text" id="tallaBenef" class="form-control form-control-sm m-input" placeholder="">
												</div>
												<div class="col-lg-4 form-group">
													<table>
														<tr>
															<td>
																<label class="m-checkbox">
																	¿Pasó autopsia?
																</label>
															</td>
															<td>
																<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
																	<label>
																		<input disabled type="checkbox" id="autopsiaBenef" name="autopsiaBenef">
																		<span></span>
																	</label>
																</span>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<!--end: Form Wizard Step 6-->
						<div class="m-wizard__form-step" id="m_wizard_form_step_7">
							<div class="row">
								<div class="col-lg-5">
									<table>
										<tr>
											<td>
												<label class="m-checkbox">
													<h5>Generar comprobante&nbsp;&nbsp;</h5>
												</label>
											</td>
											<td>
												<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
													<label>
														<input type="checkbox" id="genCom" onclick="apagar()"  name="">
														<span></span>
													</label>
												</span>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-1">
									<label class="">
										Tipo:
									</label>
								</div>
								<div class="col-lg-3">
									<select id="tipoCom" disabled class="form-control form-control-sm m-input custom-select custom-select-danger" name="option">
										<option value="">
														Seleccione
													</option>
													<?php
											$prueba = controladorEmpresa::ctrtipoCom();
													  ?> 
									</select>
								</div>
								<div class="col-lg-3">
									<div class="input-group">
										<label class="">
											N°: &nbsp;
										</label>
										<div class="input-group-prepend">
											<select class="form-control form-control-sm m-input" id="numCom" disabled name="option">
												<option value="">
													1
												</option>
												<option>
													2
												</option>
											</select>
										</div>
										<input type="text" class="form-control form-control-sm m-input" id="nnumCom" disabled placeholder="">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="row">
										<div class="col-lg-4">
											<label>Fecha de Emisión:</label>
										</div>
										<div class="col-lg-8">
											<div class="input-group date">
												<input type="text" class="form-control form-control-sm m-input" disabled readonly  placeholder="Seleccionar fecha" id="m_datepicker_3" data-date-format="dd/mm/yyyy"/>
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-calendar-check-o"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
							<br>
							<div class="row">
								<div class="col-lg-1">
									<label class="">
										Deudor:
									</label>
								</div>
								<div class="col-lg-2">
									<div class="input-group">
										<input type="text" disabled id="deuCom" class="form-control form-control-sm m-input" placeholder="">
										<div class="input-group-append">
											<span data-toggle="modal" data-target="#m_modal_2">
											<button type="button" disabled="" id="btn1Com" class="m-btn btn btnGuardarKqPst btn-sm" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar cliente" onclick="creaTablaCliente('comprobante');">
												<i class="la la-search"></i>
											</button>
											</span>
											<button type="button" disabled id="btn2Com" class="btn btnEditarKqPst2 btn-sm">
												<i class="flaticon-plus"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<input type="text" disabled id="nomCom" class="form-control form-control-sm m-input" placeholder="">
								</div>
								<div class="col-lg-1">
									<label class="">
										Tipo de documento:
									</label>
								</div>
								<div class="col-lg-2">
									<select class="form-control form-control-sm m-input custom-select custom-select-danger" disabled name="option" id="docCom">
										<option value="">
											Seleccione
										</option>
										<?php
											$prueba = controladorEmpresa::
											ctrtipoDoc();
										  ?> 		
									</select>
								</div>
								<div class="col-lg-1">
									<label class="">
										Número Documento
									</label>
								</div>
								<div class="col-lg-2">
									<input type="text" id="ndocCom" class="form-control form-control-sm m-input" placeholder="" disabled>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-1">
									<label class="">
										Teléfono
									</label>
								</div>
								<div class="col-lg-2">
									<input type="text" id="tlfCom" class="form-control form-control-sm m-input" placeholder="" disabled>
								</div>
								<div class="col-lg-1">
									<label class="">
										Dirección:
									</label>
								</div>
								<div class="col-lg-7">
									<input type="text" id="dirCom" class="form-control form-control-sm m-input" placeholder="" disabled>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-1">
									<label class="">
										Glosa:
									</label>
								</div>
								<div class="col-lg-10">
									<input type="text" id="gloCom" class="form-control form-control-sm m-input" placeholder="" disabled>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-1 offset-md-4">
									<label class="">
										Total: 
									</label>
								</div>
								<div class="col-lg-3">
									<div class="input-group">
										<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="option" disabled id="monCom">
											<option value="">
												S/.
											</option>
											<option>
												$
											</option>
										</select>
										<input type="text" disabled id="totCom" class="form-control form-control-sm m-input" placeholder="0.00">
									</div>
								</div>
							</div>
						</div>
						<!--end: Form Wizard Step 7-->
					</div>
					<!--end: Form Body -->
					<!--begin: Form Actions -->
					<div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-4 m--align-left">
									<a href="#" class="btn btn-metal m-btn m-btn--custom m-btn--icon" data-wizard-action="prev">
										<span>
											<i class="la la-arrow-left"></i>
											&nbsp;&nbsp;
											<span>
												Atrás
											</span>
										</span>
									</a>
								</div>
								<div class="col-lg-4 m--align-right">
									<a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon" data-wizard-action="submit" onclick="generarCtt()">
										<span>
											<i class="la la-check"></i>
											&nbsp;&nbsp;
											<span>
												Submit
											</span>
										</span>
									</a>
									<a href="#" class="btn btnGuardarKqPst m-btn m-btn--custom m-btn--icon" data-wizard-action="next">
										<span>
											<span>
												Continuar
											</span>
											&nbsp;&nbsp;
											<i class="la la-arrow-right"></i>
										</span>
									</a>
								</div>
								<div class="col-lg-2"></div>
							</div>
						</div>
					</div>
					<!--end: Form Actions -->
					<div class="modal fade" id="m_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">
										Selección de prospectos de ventas
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">
											&times;
										</span>
									</button>
								</div>
								<div class="modal-body" id="tablaProspecto" style="height: 800px;">
												
								</div>
								<div class="modal-footer">
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">
										Selección de trabajadores
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">
											&times;
										</span>
									</button>
								</div>
								<div class="modal-body" id="tablaVendedor" style="height: 1100px;">

								</div>
								<div class="modal-footer">
								</div>
							</div>
						</div>
					</div>

					<!-- ----------------Resumen------------------------ -->
					<div class="sidebar-wrapper stickResumen" id="container-button"> 
						<a href="#container" class="btn btnGuardarKqPst m-btn m-btn--icon btn-lg m-btn--icon-only toggle-collapse-resumen" onclick="toggleResumen(this)" id="toggle-button">
							<i class="flaticon-diagram"></i>
						</a>
						<ul class="m-nav-sticky side-nav" id="resumen2" style="margin-top: 30px;">
							<li class="m-nav-sticky__item nav-item">
								<div class="row">
									<div class="col-lg-4 offset-lg-4"><b>Resumen</b></div>
								</div>
							</li>
							<li class="m-nav-sticky__item nav-item">
								<div class="row">
									<div class="col-lg-4">
										<label class="res-label">
											Cobertura:
										</label>
									</div>
									<div class="col-lg-7">
										<input type="text" size="3" maxlength="3" disabled class="form-control form-control-sm m-input" id="imp_cobertura" name="imp_cobertura" placeholder="0,00" style="text-align: right;">
									</div>
								</div>
							</li>
							<li class="m-nav-sticky__item nav-item">
								<div class="row">
									<div class="col-lg-4">
										<label class="res-label">
											Dscto:
										</label>
									</div>
									<div class="col-lg-7">
										<input type="text" size="3" maxlength="3" disabled class="form-control form-control-sm m-input" id="imp_dscto" name="imp_dscto" placeholder="0,00" style="text-align: right;">
									</div>
								</div>
							</li>
							<li class="m-nav-sticky__item nav-item">
								<div class="row">
									<div class="col-lg-4">
										<label class="res-label">
											CUI total:
										</label>
									</div>
									<div class="col-lg-7">
										<input type="text" disabled class="form-control form-control-sm m-input" id="cuitotal" name="cuitotal" placeholder="0,00" style="text-align: right;">
									</div>
								</div>
							</li>
							<li class="m-nav-sticky__item nav-item">
								<div class="row">
									<div class="col-lg-4">
										<label class="res-label">
											Total:
										</label>
									</div>
									<div class="col-lg-7">
										<input type="text" size="3" maxlength="3" disabled class="form-control form-control-sm m-input" id="total1" name="total1" placeholder="0,00" style="text-align: right;">
									</div>
								</div>
							</li>
							<li class="m-nav-sticky__item nav-item" >
								<div class="row">
								<div class="col-lg-4">
									<label class="res-label">
										Saldo a pagar:
									</label>
								</div>
								<div class="col-lg-7">
									<input type="text" size="3" maxlength="3" disabled class="form-control form-control-sm m-input" id="saldopagar" name="saldopagar" placeholder="0,00" style="text-align: right;">
									<input type="hidden" id="imp_subtotal" name="imp_subtotal">
									<input type="hidden" id="imp_igv" name="imp_igv">
								</div>
							</div>
							</li>
						</ul>
					</div> 
					<!-- ----------------fin resumen---------------------- -->
					</div>	
				</form>
			</div>
			<!--end: Form Wizard Form-->
		</div>
		<!--end: Form Wizard-->
		</div>
		<!--End::Portlet Body-->
	</div> 
	<!--End::Main Portlet-->
</div>
</div>
<?php
include "modals/modalRegCliente.php";
include "modals/modalTablaClientes.php";
include "modals/modalTablaDscto.php";
include "modals/modalTablaEndosos.php";
include "modals/modalTablaservicios.php";
include "modals/modalTablaDeuda.php";
?>