<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
<!------------------------------- botones --------------------------------->
		<div class="sidebar-wrapper stickButtons" id="container-button">
			<ul>
				<li style="list-style: none;">
					<a href="#container" class="btn btn-metal m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" style="border-top-left-radius: .25rem !important;" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Nueva busqueda" id="new-button" onclick="resetForm();">
						<i class="fa fa-search"></i>
					</a>
				</li>
				<li style="list-style: none;">
					<a href="#container" class="btn btnGuardarKqPst m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Guardar cambios" id="save-button">
						<i class="fa fa-save"></i>
					</a>
				</li>
				<li style="list-style: none;" >
					<a href="#container" class="btn btnEditarKqPst2 m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" style="border-bottom-left-radius: .25rem !important;" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Anular contrato" id="anularBoton" onclick="anularCtto(this.name);">
						<i class="fa fa-eraser"></i>
					</a>
				</li>
			</ul> 					
		</div> 
<!-- ---------------------------fin botones----------------------------- -->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Modificación de Contrato</h3>
				</div>
			</div>
		</div>
		<form id="formModifCtto">
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-lg-4">
					<fieldset class="fieldFormHorizontal">
						<legend class="tittle-box">&nbsp;</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-6">
									<label>Sede</label>
									<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="sedeContrto" id="sedeContrato">
											<?php
												$tabla = "vtama_localidad";
												$item1 = "cod_localidad";
												$item2 = "dsc_localidad";
												$prueba = controladorEmpresa::
												ctrSelects($tabla,$item1,$item2);
											?>
									</select>
								</div>
								<div class="col-lg-6">
									<label>Contrato</label>
									<div class="input-group">
										<input type="text" class="form-control form-control-sm m-input" name="codContrato" id="codContrato">
										<div class="input-group-append">
											<button class="btn btnGuardarKqPst btn-sm" type="button" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar contrato" onclick="buscaCtto();">
												<i class="la la-search"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<label>Tipo</label>
									<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="tipoPrograma" id="tipoPrograma">
										<option value="">Seleccione</option>
										<option value="TR000">CONTRATO DE SERVICIO</option>
										<option value="TR001">SERVICIO PRE-INSCRITO</option>
									</select>
								</div>
								<div class="col-lg-3">
									<label style="margin-top: 6px;">
										Modif.&nbsp;&nbsp;
									</label>
									<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
										<label>
											<input type="checkbox" id="juridico" disabled="" name="checkModif" id="checkModif">
											<span class="jurid"></span>
										</label>
									</span>
								</div>
								<div class="col-lg-3">
									<label>Mod. C:</label>
									<input type="text" class="form-control form-control-sm m-input" name="modC" id="modC" disabled>		
								</div>
								<div class="col-lg-12">
									<label>Programa</label>
									<input type="text" class="form-control form-control-sm m-input" name="progContrato" id="progContrato" disabled>
								</div>
								<div class="col-lg-12">
									<label>Cliente</label>
									<input type="text" class="form-control form-control-sm m-input" name="nomCliContrato" id="nomCliContrato" disabled>
									<input type="hidden" id="flg_activado" name="flg_activado">
									<input type="hidden" name="flg_ctt_integral" id="flg_ctt_integral">
									<input type="hidden" name="numRefinanciamiento" id="numRefinanciamiento">
									<input type="hidden" id="numServicioSeleccionado" name="numServicioSeleccionado">
									<input type="hidden" id="tipoNecCtto" name="tipoNecCtto">
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-lg-8">
					<fieldset class="fieldFormHorizontal">
						<legend class="tittle-box">&nbsp;</legend>
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="250">
										<div class="table-responsive">
											<table id="tableDetCttoModif" class="table m-table">
												<thead>
													<th>N°</th>
													<th>Tipo de Servicio</th>
													<th>Fecha Generación</th>
													<th>Fecha Emisión</th>
													<th>Fecha Activación</th>
													<th>Fecha Anulación</th>
													<th>Fecha Resolución</th>
													<th>Fecha Transferencia</th>
												</thead>
												<tbody id="bodyDetCttoModif"></tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<fieldset class="fieldFormHorizontal">
						<legend class="tittle-box">Espacio</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-4">
										<label>Camposanto</label>
										<input type="text" class="form-control form-control-sm m-input" name="campoContrato" id="campoContrato" disabled>
										<input type="hidden" id="codCampoContrato" name="codCampoContrato">
									</div>
									<div class="col-lg-4">
										<label>Plataforma</label>
										<input type="text" class="form-control form-control-sm m-input" name="platContrato" id="platContrato" disabled>
										<input type="hidden" id="codPlatContrato" name="codPlatContrato">
									</div>
									<div class="col-lg-4">
										<label>Área plataforma</label>
										<input type="text" class="form-control form-control-sm m-input" name="areaContrato" id="areaContrato" disabled>
										<input type="hidden" id="codAreaContrato" name="codAreaContrato">
									</div>
									<div class="col-lg-2">
										<label>Eje Horiz.</label>
										<input type="text" class="form-control form-control-sm m-input" name="ejeHCotrato" id="ejeHCotrato" disabled>
									</div>
									<div class="col-lg-2">
										<label>Eje Vert.</label>
										<input type="text" class="form-control form-control-sm m-input" name="ejeVContrato" id="ejeVContrato" disabled>
									</div>
									<div class="col-lg-2">
										<label>Espacio</label>
										<div class="input-group">
		  									<input type="text" class="form-control form-control-sm m-input" name="espacioContrato" id="espacioContrato" disabled>
		  									<div class="input-group-append">
		   										 <button class="btn btn-sm btnGuardarKqPst btn-outline-secondary" type="button"><i class="fa fa-th-list"></i></button>
		  									</div>
										</div>
									</div>
									<div class="col-lg-2">
										<label>Nivel</label>
										<input type="text" class="form-control form-control-sm m-input" name="nivelContrato" id="nivelContrato" disabled>
									</div>
									<div class="col-lg-4">
										<label>Tipo Espacio</label>
										<input type="text" class="form-control form-control-sm m-input" name="tipoEspModifContrato" id="tipoEspModifContrato" disabled>
										<input type="hidden" id="codTipoEspModifContrato" name="codTipoEspModifContrato">
									</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_1" role="tab">
								Detalle de servicios
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_2" role="tab">
								Servicios Incluidos
							</a>
						</li>
						<li class="nav-item dropdown m-tabs__item">
							<a class="nav-link m-tabs__link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								Titulares
							</a>
							<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
								<a class="dropdown-item" data-toggle="tab" href="#m_tabs_2_3">
									Titular
								</a>
								<a class="dropdown-item" data-toggle="tab" id="tab2doTitular" href="#m_tabs_2_4">
									Segundo Titular
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" data-toggle="tab" id="tabAval" href="#m_tabs_2_5">
									Aval
								</a>
							</div>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_6" role="tab">
								Declaración Benef.
							</a>
						</li>
						<li class="nav-item dropdown m-tabs__item">
							<a class="nav-link m-tabs__link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								Cronogramas
							</a>
							<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 48px, 0px);">
								<a class="dropdown-item" data-toggle="tab" href="#m_tabs_2_7">
									C. Inicial
								</a>
								<a class="dropdown-item" data-toggle="tab" href="#m_tabs_2_8">
									C. FOMA
								</a>
							</div>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_9" role="tab">
								Gestión
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_10" role="tab">
								Observaciones
							</a>
						</li>
						<!-- <li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_11" role="tab">
								C. Especiales
							</a>
						</li> -->
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend>&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2">
													<label>
														Propietario
													</label>
												</div>
												<div class="col-lg-3">
													<input type="text" class="form-control form-control-sm m-input" name="idPropietario" id="idPropietario" disabled>
												</div>
												<div class="col-lg-7">
													<input type="text" class="form-control form-control-sm m-input" name="dscPropietario" id="dscPropietario" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">General</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<input type="hidden" name="numServicio" id="numServicio">
													<div class="row">
														<div class="col-lg-8">
															<label>Tipo de Servicio</label>
															<input type="text" class="form-control form-control-sm m-input" name="tipoServicio" id="tipoServicio" disabled>
														</div>
														<div class="col-lg-4">
															<span data-toggle="modal" data-target="#m_modal_auditoria_contrato">
																<button type="button" id="btn2Com" class="btn btn-sm btnGuardarKqPst mt25">
																	<i class="fa fa-eye"></i>
																</button>
															</span>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-8">
															<label>Convenio</label>
															<input type="text" class="form-control form-control-sm m-input" name="convenio" id="convenio" disabled>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-8">
															<label>Forma de Cobro</label>
															<input type="text" class="form-control form-control-sm m-input" name="formaCobro" id="formaCobro" disabled>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-12">
															<label>Tipo de Necesidad</label>
															<input type="text" class="form-control form-control-sm m-input" name="tipoNecesidad" id="tipoNecesidad" disabled>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-6">
															<label>N° beneficiarios</label>
															<input type="text" class="form-control form-control-sm m-input" name="numBeneficiarios" id="numBeneficiarios" disabled>
														</div>
														<div class="col-lg-6">
															<label>Moneda</label>
															<input type="text" class="form-control form-control-sm m-input" name="moneda" id="moneda" disabled>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-6">
															<label>F. Vencimiento</label>
															<input type="text" class="form-control form-control-sm m-input" name="fechaVencimiento" id="fechaVencimiento" disabled>
														</div>
														<div class="col-lg-6">
															<label>Cuota</label>
															<input type="text" class="form-control form-control-sm m-input" name="cuota" id="cuota" disabled>
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Condiciones</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-4">
											<div class="row">
												<div class="col-lg-6">
													<label>Interés</label>
													<input type="text" class="form-control form-control-sm m-input" name="interes" id="interes" disabled>
												</div>
												<div class="col-lg-6">
													<label>Saldo a Financiar</label>
													<input type="text" class="form-control form-control-sm m-input" style="text-align: right" name="saldoFinanciar" id="saldoFinanciar" disabled>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<div class="col-lg-6">
													<label>Cuota Inicial</label>
													<input type="text" class="form-control form-control-sm m-input" style="text-align: right" name="cuotaInicial" id="cuotaInicial" disabled>
												</div>
												<div class="col-lg-6">
													<label>I.G.V.</label>
													<input type="text" class="form-control form-control-sm m-input" style="text-align: right" name="igv" id="igv" disabled>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<div class="col-lg-6">
													<label>Subtotal</label>
													<input type="text" class="form-control form-control-sm m-input" style="text-align: right" name="subtotal" id="subtotal" disabled>
												</div>
												<div class="col-lg-6">
													<label>Total</label>
													<input type="text" class="form-control form-control-sm m-input" style="text-align: right" name="total" id="total" disabled>
												</div>
											</div>
										</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="row">
									<ul class="nav nav-tabs  m-tabs-line m-tabs-line--warning" role="tablist">
										<li class="nav-item m-tabs__item">
											<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">Servicios Principales</a>
										</li>
										<li class="nav-item m-tabs__item">
											<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab" onclick="buscaDscto();">Descuentos</a>
										</li>
										<li class="nav-item m-tabs__item">
											<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_3" role="tab">Endosos</a>
										</li>
									</ul>
									<div class="col-lg-12">
										<div class="tab-content">
											<div id="m_tabs_6_1" class="tab-pane active" role="tabpanel">
												<div class="col-lg-12">
													<div class="row">
														<div class="table-responsive">
																<table class="table m-table">
																	<thead>
																		<th>N°</th>
																		<th>Codigo</th>
																		<th>Descripción</th>
																		<th>Ctd</th>
																		<th>Precio Venta</th>
																		<th>Mín. Inhuma</th>
																		<th>Subtotal</th>
																		<th>I.G.V.</th>
																		<th>Total</th>
																	</thead>
																	<tbody id="bodyServiciosPpales">
																	</tbody>
																	<tfoot>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>Total:</td>
																		<td id="totalServPpal"></td>
																	</tfoot>
																</table>
														</div>
													</div>
												</div>
											</div>
											<div id="m_tabs_6_2" class="tab-pane" role="tabpanel">
												<div class="col-lg-12">
													<div class="row">
														<div class="table-responsive">
															<table class="table m-table">
																	<thead>
																		<th>Usuario</th>
																		<th>F. Registro</th>
																		<th>Tipo de Descuento</th>
																		<th>%</th>
																		<th>Libre</th>
																		<th>Valor</th>
																		<th>Dscto.</th>
																	</thead>
																	<tbody id="bodyDsctoModif">
																	</tbody>
																	<tfoot>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>Total:</td>
																		<td id="totalDsctoModif"></td>
																	</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
											<div id="m_tabs_6_3" class="tab-pane" role="tabpanel">
												<div class="col-lg-12">
													<div class="row">
														<div class="table-responsive">
															<table class="table m-table">
																<thead>
																	<th>Usuario</th>
																	<th>F. Registro</th>
																	<th>Estado</th>
																	<th>F. Vencimiento</th>
																	<th>F. Cancelación</th>
																	<th>Entidad</th>
																	<th>Total</th>
																	<th>Saldo</th>
																	<th>Emitido</th>
																</thead>
																<tbody id="bodyEndosoModif">
																</tbody>
																<tfoot>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td>Total:</td>
																	<td id="totalValEndosoModif">0,00</td>
																	<td id="totalSaldoEndosoModif">0,00</td>
																	<td id="totalEmiEndosoModif">0,00</td>
																</tfoot>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-12">
											<div class="table-responsive">
												<table class="table m-table">
													<thead>
														<th>N°</th>
														<th>Servicio Secundario</th>
														<th>Servicio Incluido</th>
														<th>DI</th>
														<th>Ctd.</th>
														<th>Precio de Venta</th>
														<th>Precio de Lista</th>
														<th>I.G.V</th>
														<th>Total</th>
													</thead>
													<tbody>
														<tr>
															<td></td>
														</tr>
														<tr>
															<td></td>
														</tr>
													</tbody>
													<tfoot>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td>Total</td>
														<td>0,00</td>
													</tfoot>
												</table>
											</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_3" role="tabpanel">
							<div class="row">
							<div class="col-lg-7">
								<fieldset class="fieldFormHorizontal">
									<legend class="tittle-box">General (Titular)</legend>
									<div class="col-lg-12">
										<div class="row form-group">
											<div class="col-lg-4">
												<label>Codigo Cliente</label>
												<input type="text" class="form-control form-control-sm m-input" name="codCliTitular" id="codCliTitular" disabled onchange="buscaDatosTi(this.value);">
												<input type="hidden"name="codAval" id="codAval" onchange="buscaDatosAval(this.value);">
											</div>
											<div class="col-lg-2">
												<label>&nbsp;</label>
												<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="docIdeTitular" id="docIdeTitular" disabled>
													<?php
													$prueba = controladorEmpresa::ctrtipoDoc();
													?>
												</select>
											</div>
											<div class="col-lg-4">
												<label>Doc. de identidad</label>
												<input type="text" class="form-control form-control-sm m-input" name="numDocTitular" id="numDocTitular" disabled>
											</div>
											<div class="col-lg-2">
												<div class="row" style="margin-top:2rem;margin-left: -2rem; ">
													<div class="col-lg-6">
														<label>Jurídico</label>
													</div>
													<div class="col-lg-3">
														<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
															<label>
																<input type="checkbox" name="juridicoCheck" id="juridicoCheck" disabled>
																<span></span>
															</label>
														</span>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-4">
														<label>Fch. Nacimiento</label>
														<div class="input-group date">
															<input type="text" class="form-control form-control-sm m-input" name="fchNacTitular" id="fchNacTitular" data-date-format="mm/dd/yyyy" disabled />
															<div class="input-group-append">
																<span class="input-group-text">
																	<i class="la la-calendar-check-o"></i>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-4">
														<label>Ape. Paterno</label>
														<input type="text" class="form-control form-control-sm m-input" name="apePatTitular" id="apePatTitular" disabled>
													</div>
													<div class="col-lg-4">
														<label>Ape. Materno</label>
														<input type="text" class="form-control form-control-sm m-input" name="apeMatTitular" id="apeMatTitular" disabled>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-lg-6">
														<label>Nombre</label>
														<input type="text" class="form-control form-control-sm m-input" name="nomTitular" id="nomTitular" disabled>
													</div>
													<div class="col-lg-6">
														<label>Razon Social</label>
														<input type="text" class="form-control form-control-sm m-input" name="razSocTitular" id="razSocTitular" disabled>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-3">
														<label>Tel. Celular 1</label>
														<input type="text" class="form-control form-control-sm m-input" name="cel1Titular" id="cel1Titular" disabled>
													</div>
													<div class="col-lg-3">
														<label>Tel. Cel 2</label>
														<input type="text" class="form-control m-input" name="cel2Titular" id="cel2Titular" disabled>
													</div>
													<div class="col-lg-3">
														<label>Estado Civil</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="edoCivilTitular" id="edoCivilTitular" disabled>
															<option value="">
																Seleccione
															</option>
															<?php
					  										$prueba=controladorEmpresa::ctrestadocivil();
															?> 
														</select>
													</div>
													<div class="col-lg-3">
														<label>Sexo</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="sexoTitular" id="sexoTitular" disabled>
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
												</div>
												<div class="row">
													<div class="col-lg-9">
														<label>E-mail</label>
														<input type="text" class="form-control form-control-sm m-input" name="emailTitular" id="emailTitular" disabled>
													</div>
													<div class="col-lg-3" style="text-align: center;">
														<button type="button" id="btn2Com" class="btn btn-sm btnEditarKqPst2 mt25"data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Datos del cliente" onclick="">
															<i class="fa fa-user-o"></i>
														</button>
														<span data-toggle="modal" data-target="#m_modal_2">
															<button type="button" id="btn2Com" class="btn btn-sm btnGuardarKqPst mt25"data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar cliente" onclick="creaTablaCliente('titularModif');">
																<i class="fa fa-search"></i>
															</button>
														</span>
														<button type="button" id="btn2Com" class="btn btn-sm btnThird mt25" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Cambiar titular" onclick="">
															<i class="fa fa-exchange"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-5">
								<fieldset class="fieldFormHorizontal">
									<legend class="tittle-box">Dirección</legend>
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-6">
												<label>País</label>
												<input type="text" class="form-control form-control-sm m-input" name="paisTitular" id="paisTitular" disabled>
											</div>
											<div class="col-lg-6">
												<label>Departamento</label>
												<input type="text" class="form-control form-control-sm m-input" name="departamentoTitular" id="departamentoTitular" disabled>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<label>Provincia</label>
												<input type="text" class="form-control form-control-sm m-input" name="provinciaTitular" id="provinciaTitular" disabled>
											</div>
											<div class="col-lg-6">
												<label>Distrito</label>
												<input type="text" class="form-control form-control-sm m-input" name="distritoTitular" id="distritoTitular" disabled>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<label>Dirección</label>
												<input type="text" class="form-control form-control-sm m-input" name="direccionTitular" id="direccionTitular" disabled>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<label>Referencia</label>
												<textarea class="form-control form-control-sm m-input" rows="2" name="refDirTitular" id="refDirTitular" disabled></textarea>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-lg-12">
												<label>Zona</label>
												<textarea class="form-control form-control-sm m-input" rows="2" name="zonaDirTitular" id="zonaDirTitular" disabled></textarea>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_4" role="tabpanel">
							<div class="col-lg-12">
								<fieldset class="fieldFormHorizontal">
									<legend class="tittle-box">General (2do Titular)</legend>
									<div class="col-lg-12">
										<div class="row form-group">
											<div class="col-lg-9">
											</div>
											<div class="col-lg-3" style="margin-top: -18px;">
												<table style=" float: right;">
													<tbody>
														<tr>
															<td>
																<label class="m-checkbox">
																	Jurídico&nbsp;
																</label>
															</td>
															<td>
																<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																	<label>
																		<input type="checkbox" name="juridicoCheckTitular2" id="juridicoCheckTitular2" disabled>
																		<span></span>
																	</label>
																</span>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-7">
														<label>Codigo Cliente</label>
														<input type="text" class="form-control form-control-sm m-input" name="codCliTitular2" id="codCliTitular2" disabled onchange="buscaDatos2Ti(this.value);">
													</div>
													<div class="col-lg-5">
														<button type="button" id="btn2Com" class="btn btn-sm btnEditarKqPst2 mt25">
															<i class="fa fa-user-o"></i>
														</button>
														<button type="button" id="btn2Com" class="btn btn-sm btnGuardarKqPst mt25">
															<i class="fa fa-search"></i>
														</button>
														<button type="button" id="btn2Com" class="btn btn-sm btnThird mt25">
															<i class="fa fa-exchange"></i>
														</button>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-3">
														<label>Doc. Identidad</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="docIdeTitular2" id="docIdeTitular2" disabled>
															<?php
															$prueba = controladorEmpresa::ctrtipoDoc();
															?>
														</select>
													</div>
													<div class="col-lg-4">
														<label>&nbsp;</label>
														<input type="text" class="form-control form-control-sm m-input" name="numDocTitular2" id="numDocTitular2" disabled>
													</div>
													<div class="col-lg-5">
														<label>Fch. Nacimiento</label>
														<div class="input-group date">
															<input type="text" class="form-control form-control-sm m-input" name="fchNacTitular2" id="fchNacTitular2" data-date-format="mm/dd/yyyy" disabled />
															<div class="input-group-append">
																<span class="input-group-text">
																	<i class="la la-calendar-check-o"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<label>Ape. Paterno</label>
												<input type="text" class="form-control form-control-sm m-input" name="apePatTitular2" id="apePatTitular2" disabled>
											</div>
											<div class="col-lg-4">
												<label>Ape. Materno</label>
												<input type="text" class="form-control form-control-sm m-input" name="apeMatTitular2" id="apeMatTitular2" disabled>
											</div>
											<div class="col-lg-4">
												<label>Nombre</label>
												<input type="text" class="form-control form-control-sm m-input" name="nomTitular2" id="nomTitular2" disabled>
											</div>
											<div class="col-lg-12">
												<label>Razon Social</label>
												<input type="text" class="form-control form-control-sm m-input" name="razSocTitular2" id="razSocTitular2" disabled>
											</div>
											<div class="col-lg-3">
												<label>Tel. Celular 1</label>
												<input type="text" class="form-control form-control-sm m-input" name="cel1Titular2" id="cel1Titular2" disabled>
											</div>
											<div class="col-lg-3">
												<label>Tel. Cel 2</label>
												<input type="text" class="form-control form-control-sm m-input" name="cel2Titular2" id="cel2Titular2" disabled>
											</div>
											<div class="col-lg-3">
												<label>Estado Civil</label>
												<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="edoCivilTitular2" id="edoCivilTitular2" disabled>
													<option value="">
														Seleccione
													</option>
													<?php
					  								$prueba=controladorEmpresa::ctrestadocivil();
													?> 
												</select>
											</div>
											<div class="col-lg-3">
												<label>Sexo</label>
												<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="sexoTitular2" id="sexoTitular2" disabled>
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
											<div class="col-lg-12">
												<label>E-mail</label>
												<input type="text" class="form-control form-control-sm m-input" name="emailTitular2" id="emailTitular2" disabled>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<fieldset class="fieldFormHorizontal">
									<legend class="tittle-box">Dirección</legend>
									<div class="col-lg-12">
										<div class="row form-group">
											<div class="col-lg-3">
												<label>País</label>
												<input type="text" class="form-control form-control-sm m-input" name="paisTitular2" id="paisTitular2" disabled>
											</div>
											<div class="col-lg-3">
												<label>Departamento</label>
												<input type="text" class="form-control form-control-sm m-input" name="departamentoTitular2" id="departamentoTitular2" disabled>
											</div>
											<div class="col-lg-3">
												<label>Provincia</label>
												<input type="text" class="form-control form-control-sm m-input" name="provinciaTitular2" id="provinciaTitular2" disabled>
											</div>
											<div class="col-lg-3">
												<label>Distrito</label>
												<input type="text" class="form-control form-control-sm m-input" name="distritoTitular2" id="distritoTitular2" disabled>
											</div>
											<div class="col-lg-12">
												<label>Dirección</label>
												<input type="text" class="form-control form-control-sm m-input" name="direccionTitular2" id="direccionTitular2" disabled>
											</div>
											<div class="col-lg-12">
												<label>Referencia</label>
												<textarea class="form-control form-control-sm m-input" rows="2" name="refDirTitular2" id="refDirTitular2" disabled></textarea>
											</div>
											<div class="col-lg-12">
												<label>Zona</label>
												<textarea class="form-control form-control-sm m-input" rows="2" name="zonaDirTitular2" id="zonaDirTitular2" disabled></textarea>
											</div>
										</div>
									</div>
								</fieldset>
							</div>		
						</div>
						<div class="tab-pane" id="m_tabs_2_5" role="tabpanel">
							<div class="col-lg-12">
								<fieldset class="fieldFormHorizontal">
									<legend class="tittle-box">General (Aval)</legend>
									<div class="col-lg-12">
										<div class="row form-group">
											<div class="col-lg-9">
											</div>
											<div class="col-lg-3"  style="margin-top: -18px;">
												<table style="float: right;">
													<tbody>
														<tr>
															<td>
																<label class="m-checkbox">
																	Jurídico&nbsp;
																</label>
															</td>
															<td>
																<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																	<label>
																		<input type="checkbox" name="juridicoCheckAval" id="juridicoCheckAval" disabled>
																		<span></span>
																	</label>
																</span>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-7">
														<label>Codigo Cliente</label>
														<input type="text" class="form-control form-control-sm m-input" name="codAval" id="codAval" disabled onchange="buscaDatosAval(this.value);">
													</div>
													<div class="col-lg-5">
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-3">
														<label>Doc. Identidad</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="docIdeAval" id="docIdeAval" disabled>
															<?php
															$prueba = controladorEmpresa::ctrtipoDoc();
															?>
														</select>
													</div>
													<div class="col-lg-4">
														<label>&nbsp;</label>
														<input type="text" class="form-control form-control-sm m-input" name="numDocAval" id="numDocAval" disabled>
													</div>
													<div class="col-lg-5">
														<label>Fch. Nacimiento</label>
														<div class="input-group date">
															<input type="text" class="form-control form-control-sm m-input"  id="fchNacAval" data-date-format="mm/dd/yyyy" disabled />
															<div class="input-group-append">
																<span class="input-group-text">
																	<i class="la la-calendar-check-o"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<label>Ape. Paterno</label>
												<input type="text" class="form-control form-control-sm m-input" name="apePatAval" id="apePatAval" disabled>
											</div>
											<div class="col-lg-4">
												<label>Ape. Materno</label>
												<input type="text" class="form-control form-control-sm m-input" name="apeMatAval" id="apeMatAval" disabled>
											</div>
											<div class="col-lg-4">
												<label>Nombre</label>
												<input type="text" class="form-control form-control-sm m-input" name="nomAval" id="nomAval" disabled>
											</div>
											<div class="col-lg-12">
												<label>Razon Social</label>
												<input type="text" class="form-control form-control-sm m-input" name="razSocAval" id="razSocAval" disabled>
											</div>
											<div class="col-lg-3">
												<label>Tel. Celular 1</label>
												<input type="text" class="form-control form-control-sm m-input" name="cel1Aval" id="cel1Aval" disabled>
											</div>
											<div class="col-lg-3">
												<label>Tel. Cel 2</label>
												<input type="text" class="form-control form-control-sm m-input" name="cel2Aval" id="cel2Aval" disabled>
											</div>
											<div class="col-lg-3">
												<label>Estado Civil</label>
												<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="edoCivilAval" id="edoCivilAval" disabled>
													<option value="">
														Seleccione
													</option>
													<?php
													$prueba=controladorEmpresa::ctrestadocivil();
													?> 
												</select>
											</div>
											<div class="col-lg-3">
												<label>Sexo</label>
												<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="sexoAval" id="sexoAval" disabled>
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
											<div class="col-lg-12">
												<label>E-mail</label>
												<input type="text" class="form-control form-control-sm m-input" name="emailAval" id="emailAval" disabled>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<fieldset class="fieldFormHorizontal">
									<legend class="tittle-box">Dirección</legend>
									<div class="col-lg-12">
										<div class="row form-group">
											<div class="col-lg-3">
												<label>País</label>
												<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="paisAval" name="paisAval" disabled>
													<option value="0">
														Seleccione el país
													</option>
													<?php
														$prueba = controladorEmpresa::
																	ctrPais();
													?> 
												</select>
											</div>
											<div class="col-lg-3">
												<label>Departamento</label>
												<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="departamentoAval" id="departamentoAval" disabled>
													<option value="">
														Seleccione
													</option>
												</select>
											</div>
											<div class="col-lg-3">
												<label>Provincia</label>
												<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="provinciaAval" id="provinciaAval" disabled>
													<option value="">
														Seleccione
													</option>
												</select>
											</div>
											<div class="col-lg-3">
												<label>Distrito</label>
												<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="distritoAval" id="distritoAval" disabled>
													<option value="">
														Seleccione
													</option>
												</select>
											</div>
											<div class="col-lg-12">
												<label>Dirección</label>
												<input type="text" class="form-control form-control-sm m-input" name="direccionAval" id="direccionAval" disabled>
											</div>
											<div class="col-lg-12">
												<label>Referencia</label>
												<textarea class="form-control m-input" rows="2" name="refDirAval" id="refDirAval" disabled></textarea>
											</div>
											<div class="col-lg-12">
												<label>Zona</label>
												<textarea class="form-control form-control-sm m-input" rows="2" name="zonaDirAval" id="zonaDirAval" disabled></textarea>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_6" role="tabpanel">
							<div class="row">
								<div class="col-lg-6">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="260">
										<div class="table-responsive">
											<table class="table m-table">
												<thead>
													<tr>
														<th>
															Apellidos y nombres
														</th>
													</tr>
												</thead>
												<tbody id="bodyBeneficiarioM">
												</tbody>
											</table>
										</div>
									</div>
									<div class="m-form__group row">
										<div class="col-lg-2 offset-lg-2">
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" id="botonAgregarB" type="button" title="" data-original-title="Agregar beneficiario" onclick="cargaFormBenefModif();" class="btn btnGuardarKqPst btn-lg m-btn m-btn m-btn--icon">
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
										<legend class="tittle-box">N° Servicio</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<div class="">
														<div class="row">
															<div class="col-lg-4">
																<label>Tipo Doc:</label>
															</div>
															<div class="col-lg-8">
																<select class="form-control form-control-sm m-input custom-select custom-select-danger selectTipoDoc" id="tipoDocBenef" disabled name="tipoDocBenef">
																	<option value="vacio">
																		Seleccione
																	</option>
																	<?php
																		$prueba = controladorEmpresa::
																		ctrtipoDoc();
																 		?> 		
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="">
														<div class="row">
															<div class="col-lg-4">
																<label>
																	N° Doc:
																</label>
															</div>
															<div class="col-lg-8">
																<input type="text" class="form-control form-control-sm m-input" disabled id="numDocBenef" name="numDocBenef">
															</div>
														</div>	
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Apellido Paterno</label>
														</div>
														<div class="col-lg-8">
															<input type="text" class="form-control form-control-sm m-input" disabled id="apePatBenef">
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Apellido Materno</label>
														</div>
														<div class="col-lg-8">
															<input type="text" class="form-control form-control-sm m-input" disabled id="apeMatBenef">
														</div>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="row">
														<div class="col-lg-2">
															<label>Nombres:</label>
														</div>
														<div class="col-lg-10">
															<input type="text" disabled class="form-control form-control-sm m-input" id="nombreBenef" name="nombreBenef">
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Fecha Nacimiento</label>
														</div>
														<div class="col-lg-8">
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input" disabled readonly="" placeholder="Seleccionar fecha" id="fchNacBenef">
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Fecha Deceso:</label>
														</div>
														<div class="col-lg-8">
															<div class="input-group date">
																<input type="text" class="form-control form-control-sm m-input" disabled readonly="" placeholder="Seleccionar fecha" id="fchDecBenef">
																<div class="input-group-append">
																	<span class="input-group-text">
																		<i class="la la-calendar-check-o"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Religión</label>
														</div>
														<div class="col-lg-8">
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" disabled name="religionBenef" id="religionBenef">
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
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Estado Civil</label>
														</div>
														<div class="col-lg-8">
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" disabled id="edoCivilBenef" name="edoCivilBenef">
																<option value="">
																	Seleccione
																</option>
																<?php
									  							$prueba=controladorEmpresa::ctrestadocivil();
															 	?> 
															</select>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Sexo:</label>
														</div>
														<div class="col-lg-8">
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" disabled id="sexoBenef" name="sexoBenef">
																<option value="M">
																	Masculino
																</option>
																<option value="F">
																	Femenino
																</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Parentesco</label>
														</div>
														<div class="col-lg-8">
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" disabled id="parentescoBenef" name="parentescoBenef">
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
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Lugar Deceso:</label>
														</div>
														<div class="col-lg-8">
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" disabled id="lugarDecesoBenef" name="lugarDecesoBenef">
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
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-4">
															<label>Motivo Deceso</label>
														</div>
														<div class="col-lg-8">
															<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="motivoDecesoBenef" disabled name="motivoDecesoBenef">
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
													</div>
												</div>
												<div class="col-lg-3">
													<div class="row">
														<div class="col-lg-4">
															<label>Peso</label>
														</div>
														<div class="col-lg-8">
															<input type="text" class="form-control form-control-sm m-input" id="pesoBenef" name="pesoBenef" disabled placeholder="">
														</div>
													</div>
												</div>
												<div class="col-lg-3">
													<div class="row">
														<div class="col-lg-4">
															<label>Talla</label>
														</div>
														<div class="col-lg-8">
															<input type="text" class="form-control form-control-sm m-input" id="tallaBenef" name="tallaBenef" disabled placeholder="">
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<table>
														<tbody>
															<tr>
																<td>
																	<label class="m-checkbox">
																		¿Pasó autopsia?&nbsp;&nbsp;
																	</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="autopsiaBenefM" name="autopsiaBenefM">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_7" role="tabpanel">
							<div class="row form-group m-form__group">
								<div class="col-lg-4">
									<fieldset class="fieldFormHorizontal">
										<legend>&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<label>Saldo a financiar: </label>
													<input type="text" class="form-control form-control-sm m-input" placeholder="00.00" id="saldoFinCronograma" name="saldoFinCronograma">
												</div>
												<div class="col-lg-6">
													<label> N° de cuotas:</label>
													<input type="text" class="form-control form-control-sm m-input" placeholder="0" id="numCuoCronograma" name="numCuoCronograma">
												</div>
												<div class="col-lg-6">
													<label>1er vencimiento:</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input" readonly="" id="fchVenCronograma" name="fchVenCronograma">
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<label>Interes:</label>
													<input type="text" class="form-control form-control-sm m-input" placeholder="0" id="interesCronograma" name="interesCronograma">
												</div>
												<div class="col-lg-12">
													<button type="reset" class="btn btn-sm btnGuardarKqPst mt25">
														Generar cronograma de pagos
													</button>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-4">
									<fieldset class="fieldFormHorizontal">
										<legend>&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2" style="margin-top: -18px;">
													<table>
														<tbody>
															<tr>
																<td>
																	<label class="m-checkbox">
																		Cuotas Definidas
																	</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="" id="personaCheck" disabled>
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>	
												<div class="col-lg-9"></div>	
												<div class="col-lg-4">
													<label>Cuota inicial: </label>
													<input type="text" id="cuoIni" class="form-control form-control-sm m-input" disabled="" placeholder="0">
												</div>
												<div class="col-lg-4">
													<label>Cuota final: </label>
													<input type="text" id="cuoFin" class="form-control form-control-sm m-input" disabled="" placeholder="0">			
												</div>
												<div class="col-lg-4">
													<label>Valor de cuota: </label>
													<input type="text" id="valCuo" class="form-control form-control-sm m-input" disabled="" placeholder="0.00">			
												</div>
											<br>
												<div class="col-lg-12">
													<button type="reset" class="btn btn-sm btnEditarKqPst2 mt25">
														Generar CUD
													</button>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-4">
									<fieldset class="fieldFormHorizontal">
										<legend>Conformación de saldo</legend>
											<div class="col-lg-12">
												<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="160">
													<div class="table-responsive">
														<table class="table m-table" >
															<thead>
																<tr>
																	<th>Servcio</th>
																	<th>Saldo</th>
																</tr>
															</thead>
															<tbody id="bodyServicioVin"></tbody>
															<tfoot>
																<td>Total:</td>
																<td style="text-align: right;" id="totalServicioVin">0,00</td>
															</tfoot>
														</table>
													</div>
												</div>
											</div>
									</fieldset>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="350">
										<div class="table-responsive">
											<table class="table m-table" >
												<thead>
													<tr>
														<th>Cuota</th>
														<th>Estado</th>
														<th>Fecha de Venicimiento</th>
														<th>Subtotal</th>
														<th>Interes</th>
														<th>I.G.V</th>
														<th>Total</th>
														<th>Saldo</th>
													</tr>
												</thead>
												<tbody id="bodyCronogramaModif">
												</tbody>
												<tfoot>
													<tr>
														<td></td>
														<td></td>
														<td>Total:</td>
														<td style="text-align: right;" id="totalSubtotCronoModif">0,00</td>
														<td style="text-align: right;" id="totalIntCronoModif">0,00</td>
														<td style="text-align: right;" id="totalIGVCronoModif">0,00</td>
														<td style="text-align: right;" id="totalTotalCronoModif">0,00</td>
														<td style="text-align: right;" id="totalSaldoCronoModif">0,00</td>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_8" role="tabpanel">
							<div class="row">
								<div class="col-lg-10">
									<fieldset class="fieldFormHorizontal">
										<legend>&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-4">
													<label>Saldo</label>
													<input type="text" class="form-control form-control-sm m-input" placeholder="0.00" name="saldoFOMA" id="saldoFOMA">
												</div>
												<div class="col-lg-4">
													<label>N° Cuotas</label>
													<input type="text" class="form-control form-control-sm m-input" placeholder="0" name="nCuotasFOMA" id="nCuotasFOMA">
												</div>
												<div class="col-lg-4">
													<label>1er Vencimiento</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input" readonly="" id="fchVenCronoFOMA" name="fchVenCronoFOMA">
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
								<div class="col-lg-2">
									<fieldset class="fieldFormHorizontal" style="height: 100px;">
										<legend>&nbsp;</legend>
										<br>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-12" style="text-align: center;">
													<button class="btn btn-sm btn-danger">Generar Cuotas</button>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8">
									<br>
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
										<div class="table-responsive">
											<table class="table m-table">
												<thead>
													<th>Cuota</th>
													<th>Estado</th>
													<th>F. Vecimiento</th>
													<th>Total</th>
													<th>Saldo</th>
												</thead>
												<tbody id="bodyCronogramaFomaModif">
												</tbody>
												<tfoot>
													<tr>
														<td></td>
														<td></td>
														<td>Total</td>
														<td style="text-align: right;" id="totalTotalFomaModif">0,00</td>
														<td style="text-align: right;" id="totalSaldoFomaModif">0,00</td>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">
											<table>
												<tbody>
													<tr>
														<td>Cuotas Definidas</td>
														<td>
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger mt15">
																<label>
																	<input type="checkbox" name="" id="cuoDefCheck" onchange="cuoDefinidas();">
																	<span></span>
																</label>
															</span>
														</td>
													</tr>
												</tbody>
											</table>
										</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<label>Cuota Inicial</label>
													<input type="text" class="form-control form-control-sm m-input" id="cuoInicial" disabled>
												</div>
												<div class="col-lg-6">
													<label>Cuota Final</label>
													<input type="text" class="form-control form-control-sm m-input" id="cuoFinal" disabled>
												</div>
												<div class="col-lg-12">&nbsp;</div>
												<div class="col-lg-6">
													<label>Valor de Cuota</label>
													<input type="text" class="form-control form-control-sm m-input" id="valCuota" disabled>
												</div>
												<div class="col-lg-6" style="text-align: center;">
													<button class="btn btn-sm btn-danger mt25" id="btnGenCuoDef" disabled>Generar >>></button>
												</div>
											</div>
											<br>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_9" role="tabpanel">
							<div class="row">
								<div class="col-lg-9">
									<fieldset class="fieldFormHorizontal">
										<legend>&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<label class="">
														Canal de Venta
													</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="canalVentaModif" id="canalVentaModif">
														<option>Selecciona</option>
														<?php
															$tabla = "vtama_canal_venta";
															$item1 = "cod_canal_venta";
															$item2 = "dsc_canal_venta";
															$prueba = controladorEmpresa::
															ctrSelects($tabla,$item1,$item2);
														?>
													</select>
												</div>
												<div class="col-lg-3"></div>
												<div class="col-lg-3">
													<table>
														<tbody>
															<tr>
																<td>
																	<label class="">Agencia Funeraria&nbsp;</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="AgFunCheck" id="AgFunCheck" onchange="apagar();">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Cobrador Asignado</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Cobrador</label>
													<input type="text" class="form-control form-control-sm m-input" name="codCobrador" id="codCobrador" onchange="nombreTrabajador(this.value,'nombreCobrador');">
												</div>
												<div class="col-lg-1" style="margin-top: 1.7rem;">
													<label>&nbsp;</label>
													<button class="btn btn-sm btnGuardarKqPst"><i class="fa fa-search"></i></button>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreCobrador" id="nombreCobrador">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Personal de Venta</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Vendedor</label>
													<input type="text" class="form-control form-control-sm m-input" name="codVendedor" id="codVendedor" onchange="nombreTrabajador(this.value,'nombreVendedor');">
												</div>
												<div class="col-lg-1"  style="margin-top: 1.7rem;">
													<label>&nbsp;</label>
													<button class="btn btn-sm btnGuardarKqPst"><i class="fa fa-search"></i></button>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreVendedor" id="nombreVendedor">
												</div>
												<div class="col-lg-3">
													<label>Grupo</label>
													<input type="text" class="form-control form-control-sm m-input" name="codGrupo" id="codGrupo"  onchange="nombreGrupoVenta(this.value,'nombreGrupo');">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreGrupo" id="nombreGrupo">
												</div>
												<div class="col-lg-3">
													<label>Tipo Comisionista</label>
													<input type="text" class="form-control form-control-sm m-input" name="codTipoComisionista" id="codTipoComisionista" onchange="nombreComisionista(this.value,'nombreTipoComisionista');">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreTipoComisionista" id="nombreTipoComisionista">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Conformación</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Supervisor</label>
													<input type="text" class="form-control form-control-sm m-input" name="codSupervisor" id="codSupervisor" onchange="nombreTrabajador(this.value,'nombreSupervisor');">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreSupervisor" id="nombreSupervisor">
												</div>
												<div class="col-lg-3">
													<label>Jefe de Ventas</label>
													<input type="text" class="form-control form-control-sm m-input" name="codJefeVentas" id="codJefeVentas" onchange="nombreTrabajador(this.value,'nombreJefeVentas');">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreJefeVentas" id="nombreJefeVentas">
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Agencia Funeraria</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-3">
													<label>Descripcion</label>
													<input type="text" class="form-control form-control-sm m-input" name="codFuneraria" id="codFuneraria" disabled onchange="nombreFuneraria(this.value,'dscFuneraria');">
												</div>
												<div class="col-lg-1" style="margin-top: 1.7rem;">
													<label>&nbsp;</label>
													<button class="btn btn-sm btnGuardarKqPst" type="button" id="btnAgFun"><i class="fa fa-search" disabled></i></button>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="dscFuneraria" id="dscFuneraria" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-3">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-12" style="text-align: center;">
													<i class="fa fa-search"></i><br>
													AL SELECCIONAR AL VENDEDOR SE TOMARA LA CONFIGURACIÓN VIGENTE DEL COLABORADOR
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_10" role="tabpanel">
							<div class="row">
								<div class="col-lg-1" style="margin-left: 2rem;">
									<label class=" ">Área</label>
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control form-control-sm m-input" name="area" id="area">
								</div>
								<div class="col-lg-1 offset-lg-6">
									<button class="btn btnGuardarKqPst m-btn" type="button" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Añadir observación" onclick="masObsv('<?php echo $_SESSION['user']; ?>');">
									<i class="fa fa-plus"></i></button>
								</div>
							</div>
							<div class="row">			
								<div class="col-lg-12">
									<br>
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
										<div class="table-responsive">
											<table class="table m-table">
												<thead>
													<th>N°</th>
													<th>Observación</th>
													<th>Usuario</th>
													<th>F. Registro</th>
													<th>Auto</th>
												</thead>
												<tbody id="bodyObservaciones">
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_11" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
										<div class="table-responsive">
											<table class="table m-table">
												<thead>
													<th>N°</th>
													<th>Condición</th>
													<th>F. Registro</th>
													<th>F. Autorizado</th>
													<th>Usuario Reg</th>
													<th>Usuario Aut</th>
													<th>Observación</th>
													<th>A</th>
												</thead>
												<tbody>
													<tr>
														<td></td>
													</tr>
													<tr>
														<td></td>
													</tr>
												</tbody>
												<tfoot>
												<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		</form>
	</div>
</div>
</div>

<?php
include "modals/modalObservacionCliente.php";
include "modals/modalTablaDeuda.php";
include "modals/modalTablaClientes.php";
 ?>