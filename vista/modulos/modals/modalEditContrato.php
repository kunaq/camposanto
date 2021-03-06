<div class="modal fade" id="m_modal_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Edición de Contrato
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
					<div class="row">
						<div class="col-lg-4">
							<div class="row">
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
									<input type="text" class="form-control form-control-sm m-input" name="codContrato" id="codContrato">
								</div>
								<div class="col-lg-6">
									<label>Tipo</label>
									<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="tipoPrograma" id="tipoPrograma">
										<option value="AAA">Seleccione</option>
									</select>
								</div>
								<div class="col-lg-3">
									<label style="margin-top: 6px;">
										Modif.&nbsp;&nbsp;
									</label>
									<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
										<label>
											<input type="checkbox" id="juridico" disabled="" name="">
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
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="row">
								<div class="col-lg-12">
									<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
										<div class="table-responsive">
											<table class="table m-table">
												<thead>
													<th>N°</th>
													<th>T. Servicio</th>
													<th>Fch. Genereación</th>
													<th>Fch. Emisión</th>
													<th>Fch. Activación</th>
													<th>Fch. Anulación</th>
													<th>Fch. Resolución</th>
													<th>Fch. Transferencia</th>
												</thead>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<br>
							<label class="tittle-box">Espacio</label>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-4">
									<label>Camposanto</label>
									<input type="text" class="form-control form-control-sm m-input" name="campoContrato" id="campoContrato" disabled>
								</div>
								<div class="col-lg-4">
									<label>Plataforma</label>
									<input type="text" class="form-control form-control-sm m-input" name="platContrato" id="platContrato" disabled>
								</div>
								<div class="col-lg-4">
									<label>Área plataforma</label>
									<input type="text" class="form-control form-control-sm m-input" name="areaContrato" id="areaContrato" disabled>
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
	  									<input type="text" class="form-control form-control-sm m-input" name="espacioContrato" id="espacionContrato" disabled>
	  									<div class="input-group-append">
	   										 <button class="btn btn-sm btn-danger btn-outline-secondary" type="button"><i class="fa fa-th-list"></i></button>
	  									</div>
									</div>
								</div>
								<div class="col-lg-2">
									<label>Nivel</label>
									<input type="text" class="form-control form-control-sm m-input" name="nivelContrato" id="nivelContrato" disabled>
								</div>
								<div class="col-lg-4">
									<label>Tipo Espacio</label>
									<input type="text" class="form-control form-control-sm m-input" name="tipoEspContrato" id="tipoEspContrato" disabled>
								</div>
							</div>
						</div>
					</div>
					<div style="min-height: 30px;"></div>
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
										<a class="dropdown-item" data-toggle="tab" href="#m_tabs_2_4">
											Segundo Titular
										</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" data-toggle="tab" href="#m_tabs_2_5">
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
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_11" role="tab">
										C. Especiales
									</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
									<div class="form-group m-form__group row">
										<div class="col-lg-12">
											<div class="row">
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
										<br>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-2">
													<br>
													<label class="tittle-box">General</label>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="row">
												<div class="col-lg-8">
													<label>Tipo de Servicio</label>
													<input type="text" class="form-control form-control-sm m-input" name="tipoServicio" id="tipoServicio" disabled>
												</div>
												<div class="col-lg-4">
													<span data-toggle="modal" data-target="#m_modal_auditoria_contrato">
														<button type="button" id="btn2Com" class="btn btn-sm btn-danger mt25">
															<i class="flaticon-plus"></i>
														</button>
													</span>
													<button type="button" id="btn2Com" class="btn btn-sm btn-danger mt25">
														<i class="flaticon-plus"></i>
													</button>
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
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-2">
													<br>
													<label class="tittle-box">Condiciones</label>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<div class="col-lg-12">
													<label>Interés</label>
													<input type="text" class="form-control form-control-sm m-input" name="interes" id="interes" disabled>
												</div>
												<div class="col-lg-12">
													<label>Saldo a Financiar</label>
													<input type="text" class="form-control form-control-sm m-input" name="saldoFinanciar" id="saldoFinanciar" disabled>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<div class="col-lg-12">
													<label>Cuota Inicial</label>
													<input type="text" class="form-control form-control-sm m-input" name="cuotaInicial" id="cuotaInicial" disabled>
												</div>
												<div class="col-lg-12">
													<label>I.G.V.</label>
													<input type="text" class="form-control form-control-sm m-input" name="igv" id="igv" disabled>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<div class="col-lg-12">
													<label>Subtotal</label>
													<input type="text" class="form-control form-control-sm m-input" name="subtotal" id="subtotal" disabled>
												</div>
												<div class="col-lg-12">
													<label>Total</label>
													<input type="text" class="form-control form-control-sm m-input" name="total" id="total" disabled>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="row">
											<ul class="nav nav-tabs  m-tabs-line m-tabs-line--warning" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_6_1" role="tab">Servicios Principales</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_2" role="tab">Descuentos</a>
												</li>
												<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_3" role="tab">Endosos</a>
												</li>
												<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_6_4" role="tab">Contratos-Transferencias</a>
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
																			<tbody>
																				<tr>
																					<td>1</td>
																					<td>DU000035</td>
																					<td>POR SERVICIO DE DERECHO DE USO</td>
																					<td>1</td>
																					<td>9.300,00</td>
																					<td>3.815,00</td>
																					<td>7.600,00</td>
																					<td>0,00</td>
																					<td>7.600,00</td>
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
																				<td>Total:</td>
																				<td>7.600,00</td>
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
																			<tbody>
																				<tr>
																					<td>TRAMOS</td>
																					<td>25/04/2019 16:53</td>
																					<td>DESCUENTO LIBRE</td>
																					<td><input type="checkbox" name=""></td>
																					<td><input type="checkbox" name=""></td>
																					<td>1.700,00</td>
																					<td>1.700,00</td>
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
																				<td>Total:</td>
																				<td>1.700,00</td>
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
																				<th>Uuario</th>
																				<th>F. Registro</th>
																				<th>Estado</th>
																				<th>F. Vencimiento</th>
																				<th>F. Cancelación</th>
																				<th>Entidad</th>
																				<th>Total</th>
																				<th>Saldo</th>
																				<th>Emitido</th>
																			</thead>
																			<tbody>
																				<tr>
																					<td>1</td>
																					<td>DU000035</td>
																					<td>POR SERVICIO DE DERECHO DE USO</td>
																					<td>1</td>
																					<td>9.300,00</td>
																					<td>3.815,00</td>
																					<td>7.600,00</td>
																					<td>0,00</td>
																					<td>7.600,00</td>
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
																				<td>Total:</td>
																				<td>0,00</td>
																				<td>0,00</td>
																				<td>0,00</td>
																			</tfoot>
																		</table>
																	</div>
															</div>
														</div>
													</div>
													<div id="m_tabs_6_4" class="tab-pane" role="tabpanel">
														<div class="col-lg-12">
															<div class="row">
																	<div class="table-responsive">
																		<table class="table m-table">
																			<thead>
																				<th>Localidad</th>
																				<th>Tipo Nec.</th>
																				<th>Tipo de Programa</th>
																				<th>Contrat</th>
																				<th>N° Servicio</th>
																				<th>Servicio</th>
																				<th>Fecha de Solicitud</th>
																				<th>Total</th>
																			</thead>
																			<tbody>
																				<tr>
																					<td></td>
																					<td></td>
																					<td></td>
																					<td></td>
																					<td></td>
																					<td></td>
																					<td></td>
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
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-2">
												<label class="tittle-box">General</label>
											</div>
											<div class="col-lg-3">
												<table style="margin-top: 5px;">
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
																		<input type="checkbox" name="" id="personaCheck" disabled>
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
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-7">
														<label>Codigo Cliente</label>
														<input type="text" class="form-control form-control-sm m-input" name="codCliTitular" id="codCliTitular" disabled>
													</div>
													<div class="col-lg-5">
														<button type="button" id="btn2Com" class="btn btn-sm btn-danger mt25">
															<i class="fa fa-user-o"></i>
														</button>
														<button type="button" id="btn2Com" class="btn btn-sm btn-danger mt25">
															<i class="fa fa-search"></i>
														</button>
														<button type="button" id="btn2Com" class="btn btn-sm btn-danger mt25">
															<i class="fa fa-exchange"></i>
														</button>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-3">
														<label>Doc. Identidad</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="docIdeTitular" id="docIdeTitular" disabled>
															<?php
															$prueba = controladorEmpresa::ctrtipoDoc();
															?>
														</select>
													</div>
													<div class="col-lg-4">
														<label>&nbsp;</label>
														<input type="text" class="form-control form-control-sm m-input" name="numDocTitular" id="numDocTitular" disabled>
													</div>
													<div class="col-lg-5">
														<label>Fch. Nacimiento</label>
														<div class="input-group date">
															<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_3" data-date-format="mm/dd/yyyy" disabled />
															<div class="input-group-append">
																<span class="input-group-text">
																	<i class="la la-calendar-check-o"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-4">
														<label>Ape. Paterno</label>
														<input type="text" class="form-control form-control-sm m-input" name="apePatTitular" id="apePatTitular" disabled>
													</div>
													<div class="col-lg-4">
														<label>Ape. Materno</label>
														<input type="text" class="form-control form-control-sm m-input" name="apeMatTitular" id="apeMatTitular" disabled>
													</div>
													<div class="col-lg-4">
														<label>Nombre</label>
														<input type="text" class="form-control form-control-sm m-input" name="nomTitular" id="nomTitular" disabled>
													</div>
													<div class="col-lg-12">
														<label>Razon Social</label>
														<input type="text" class="form-control form-control-sm m-input" name="razSocTitular" id="razSocTitular" disabled>
													</div>
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
													<div class="col-lg-12">
														<label>E-mail</label>
														<input type="text" class="form-control form-control-sm m-input" name="emailTitular" id="emailTitular" disabled>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-2">
														<br>
														<label class="tittle-box">Dirección</label>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-3">
														<label>País</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="paisTitular" name="paisTitular" disabled>
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
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="departamentoTitular" id="departamentoTitular" disabled="">
															<option value="">
																Seleccione
															</option>
														</select>
													</div>
													<div class="col-lg-3">
														<label>Provincia</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="provinciaTitular" id="provinciaTitular" disabled>
															<option value="">
																Seleccione
															</option>
														</select>
													</div>
													<div class="col-lg-3">
														<label>Distrito</label>
														<select class="form-control m-input custom-select custom-select-danger" name="distritoTitular" id="distritoTitular" disabled="">
															<option value="">
																Seleccione
															</option>
														</select>
													</div>
													<div class="col-lg-12">
														<label>Dirección</label>
														<input type="text" class="form-control form-control-sm m-input" name="direccionTitular" id="direccionTitular" disabled>
													</div>
													<div class="col-lg-12">
														<label>Referencia</label>
														<textarea class="form-control form-control-sm m-input" rows="2" name="refDirTitular" id="refDirTitular" disabled></textarea>
													</div>
													<div class="col-lg-12">
														<label>Zona</label>
														<textarea class="form-control form-control-sm m-input" rows="2" name="zonaDirTitular" id="zonaDirTitular" disabled></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_4" role="tabpanel">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-2">
												<label class="tittle-box">General</label>
											</div>
											<div class="col-lg-3">
												<table style="margin-top: 5px;">
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
																		<input type="checkbox" name="" id="personaCheck" disabled>
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
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-7">
														<label>Codigo Cliente</label>
														<input type="text" class="form-control form-control-sm m-input" name="codCliTitular2" id="codCliTitular2" disabled>
													</div>
													<div class="col-lg-5">
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
															<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_4" data-date-format="mm/dd/yyyy" disabled />
															<div class="input-group-append">
																<span class="input-group-text">
																	<i class="la la-calendar-check-o"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="row">
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
												<div class="row">
													<div class="col-lg-2">
														<br>
														<label class="tittle-box">Dirección</label>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-3">
														<label>País</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="paisTitular2" name="paisTitular2" disabled>
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
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="departamentoTitular2" id="departamentoTitular2" disabled>
															<option value="">
																Seleccione
															</option>
														</select>
													</div>
													<div class="col-lg-3">
														<label>Provincia</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="provinciaTitular2" id="provinciaTitular2" disabled>
															<option value="">
																Seleccione
															</option>
														</select>
													</div>
													<div class="col-lg-3">
														<label>Distrito</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="distritoTitular2" id="distritoTitular2" disabled>
															<option value="">
																Seleccione
															</option>
														</select>
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
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_5" role="tabpanel">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-2">
												<label class="tittle-box">General</label>
											</div>
											<div class="col-lg-3">
												<table style="margin-top: 5px;">
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
																		<input type="checkbox" name="" id="personaCheck" disabled>
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
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-7">
														<label>Codigo Cliente</label>
														<input type="text" class="form-control form-control-sm m-input" name="codAval" id="codAval" disabled>
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
															<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_5" data-date-format="mm/dd/yyyy" disabled />
															<div class="input-group-append">
																<span class="input-group-text">
																	<i class="la la-calendar-check-o"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="row">
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
												<div class="row">
													<div class="col-lg-2">
														<br>
														<label class="tittle-box">Dirección</label>
													</div>
												</div>
												<div class="row">
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
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_6" role="tabpanel">
									<div class="form-group m-form__group row">
										<div class="col-lg-6">
											<div class="m-form__group row">
												<table class="table m-table">
													<thead>
														<tr>
															<th>
																#
															</th>
															<th>
																Nombre
															</th>
															<th>
																Apellidos
															</th>
															<th>
																Username
															</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">
															1
															</th>
															<td>
															Jhon
															</td>
															<td>
															Stone
															</td>
															<td>
																@jhon
															</td>
														</tr>
														<tr>
															<th scope="row">
																2
															</th>
															<td>
																Lisa
															</td>
															<td>
																Nilson
															</td>
															<td>
																@lisa
															</td>
														</tr>
														<tr>
															<th scope="row">
																				3
															</th>
															<td>
																Larry
															</td>
															<td>
																the Bird
															</td>
															<td>
																@twitter
															</td>
														</tr>
														<tr>
															<th scope="row">
																4
															</th>
															<td>
																Larry
															</td>
															<td>
																the Bird
															</td>
															<td>
																@twitter
															</td>
														</tr>
														<tr>
															<th scope="row">
																5
															</th>
															<td>
																Larry
															</td>
															<td>
																the Bird
															</td>
															<td>
																@twitter
															</td>
														</tr>
														<tr>
															<th scope="row">
																6
															</th>
															<td>
																Larry
															</td>
															<td>
																the Bird
															</td>
															<td>
																@twitter
															</td>
														</tr>
														<tr>
															<th scope="row">
																7
															</th>
															<td>
																Larry
															</td>
															<td>
																the Bird
															</td>
															<td>
																@twitter
															</td>
														</tr>
														<tr>
															<th scope="row">
																8
															</th>
															<td>
																Larry
															</td>
															<td>
																the Bird
															</td>
															<td>
																@twitter
															</td>
														</tr>
														<tr>
															<th scope="row">
																9
															</th>
															<td>
																Larry
															</td>
															<td>
																the Bird
															</td>
															<td>
																@twitter
															</td>
														</tr>
														<tr>
															<th scope="row">
																10
															</th>
															<td>
																Larry
															</td>
															<td>
																the Bird
															</td>
															<td>
																@twitter
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="m-form__group row">
												<div class="col-lg-12" style="display: inherit;">
													<div class="input-group">
														<button type="reset" class="btn btn-success">
															Nuevo <br> beneficiario
														</button>
													</div>
													<div class="input-group">
														<button type="reset" class="btn btn-metal">
															Modificar <br> beneficiario
														</button>
													</div>
													<div class="input-group">
														<button type="reset" class="btn btn-danger">
															Eliminar <br> beneficiario
														</button>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<label class="tittle-box">
												<h6>N° Servicio:</h6>
											</label>
											<div class="row">
												<div class="col-lg-6">
													<div class="input-group">
														<label class="">
															Tipo de documento: &nbsp;
														</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger selectTipoDoc" id="tipoDocBenef" name="tipoDocBenef">
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
												<div class="col-lg-6">
													<div class="input-group">
														<label>
															N° Documento:&nbsp;
														</label>
														<input type="text" class="form-control form-control-sm m-input">
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-lg-6">
													<label class="">
														Apellido paterno:
													</label>
													<input type="text" class="form-control form-control-sm m-input" id="apePatBenef">
												</div>
												<div class="col-lg-6">
													<label>
														Apellido Materno:
													</label>
													<input type="text" class="form-control form-control-sm m-input" id="apeMatBenef">
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12">
													<label class="">
														Nombres:
													</label>
													<input type="text" class="form-control form-control-sm m-input" id="nombreBenef">
												</div>
											</div>
											<div class="row">
												<div class="col-lg-6">
													<label>
														Fecha de nacimiento:
													</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input" readonly="" placeholder="Seleccionar fecha" id="m_datepicker_4_1">
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<label>
															Fecha de deceso:
														</label>
													<div class="input-group date">
														<input type="text" class="form-control form-control-sm m-input" readonly="" placeholder="Seleccionar fecha" id="m_datepicker_4_2">
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-lg-6">
													<div class="input-group">
														<label class="">
															Religión:
														</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="religionBenef" id="religionBenef">
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
												<div class="col-lg-6">
													<div class="input-group">
														<label class="">
															Estado civil: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" id="ecivilNvoCliWiz" name="option">
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
											<br>
											<div class="row">
												<div class="col-lg-6">
													<div class="input-group">
														<label class="">
															Sexo: &nbsp;
														</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="option">
															<option value="M">
																Masculino
															</option>
															<option value="F">
																Femenino
															</option>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="input-group">
														<label class="">
															Parentescos: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="option">
															<option value="">
																Seleccione
															</option>
															<option>
																Abuelo(a)
															</option>
															<option>
																Conyugue
															</option>
															<option>
																Esposo(a)
															</option>
															<option>
																Hermano(a)
															</option>
															<option>
																Madre
															</option>
															<option>
																Padre
															</option>
															<option>
																Otros
															</option>
															<option>
																Titular
															</option>
														</select>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-lg-6">
													<div class="input-group">
														<label class="">
															Lugar deceso: &nbsp;
														</label>
														<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="option">
															<option value="">
																Seleccione
															</option>
															<option>
																1
															</option>
															<option>
																2
															</option>
															<option>
																3
															</option>
															<option>
																4
															</option>
															<option>
																5
															</option>
														</select>
													</div>
												</div>
												<div class="col-lg-6">
																	<div class="input-group">
																		<label class="">
																			Motivo deceso: &nbsp;
																		</label>
																		<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="option">
															<option value="">
																Seleccione
															</option>
															<option>
																1
															</option>
															<option>
																2
															</option>
															<option>
																3
															</option>
															<option>
																4
															</option>
															<option>
																5
															</option>
														</select>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-lg-3">
													<div class="input-group">
														<label class="">
															Peso: &nbsp;
														</label>
														<input type="text" class="form-control form-control-sm m-input" placeholder="">
													</div>
												</div>
												<div class="col-lg-3">
													<div class="input-group">
														<label class="">
															Talla: &nbsp;
														</label>
														<input type="text" class="form-control form-control-sm m-input" placeholder="">
													</div>
												</div>
												<div class="col-lg-6">
													<table>
													<tbody><tr>
														<td>
															<label class="m-checkbox">
																¿Pasó autopsia?&nbsp;&nbsp;
															</label>
														</td>
														<td>
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																<label>
																	<input type="checkbox" name="">
																	<span></span>
																</label>
															</span>
														</td>
													</tr>
												</tbody></table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_7" role="tabpanel">
									<div class="form-group m-form__group row">
										<div class="col-lg-6">
											<div class="m-input-icon m-input-icon--right">
												<div class="row">
													<div class="col-lg-6">
														<label>Saldo a financiar: </label>
														<input type="text" class="form-control form-control-sm m-input" placeholder="00.00">
													</div>
													<div class="col-lg-6">
														<label> N° de cuotas:</label>
														<input type="text" class="form-control form-control-sm m-input" placeholder="0">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-lg-6">
														<label>1er vencimiento:</label>
														<div class="input-group date">
															<input type="text" class="form-control form-control-sm m-input" readonly="" id="m_datepicker_5">
															<div class="input-group-append">
																<span class="input-group-text">
																	<i class="la la-calendar-check-o"></i>
																</span>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<label>Interes:</label>
														<input type="text" class="form-control form-control-sm m-input" placeholder="0">
													</div>
												</div>
												<br>
												<div class="row">
													<div class="col-lg-12">
														<div class="input-group">
														<button type="reset" class="btn btn-sm btn-danger">
															Generar cronograma de pagos
														</button>
													</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<table>
												<tbody><tr>
													<td>
														<label class="m-checkbox">
															Cuotas definidas&nbsp;&nbsp;
														</label>
													</td>
													<td>
														<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
															<label>
																<input type="checkbox" id="cuoDefi" onclick="" name="">
																<span></span>
															</label>
														</span>
													</td>
												</tr>
											</tbody></table>		
											<br>
											<div class="row">
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
											</div>
											<br>
											<div class="row">
													<div class="col-lg-12">
														<div class="input-group">
														<button type="reset" class="btn btn-sm btn-danger">
															Generar CUD
														</button>
													</div>
													</div>
												</div>
											<br>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<div class="col-lg-12">
											<table class="table m-table">
												<thead>
													<tr>
														<th>
															Cuota
														</th>
														<th>
															Estado
														</th>
														<th>
															F. Venicimiento
														</th>
														<th>
															Subtotal
														</th>
														<th>
															Interes
														</th>
														<th>
															I.G.V
														</th>
														<th>
															Total
														</th>
														<th>
															Saldo
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th scope="row">
															1
														</th>
														<td>
															Registrado
														</td>
														<td>
															04/11/2019
														</td>
														<td>
															1.092,32
														</td>
														<td>
															8,08
														</td>
														<td>
															0,00
														</td>
														<td>
															1.100,32
														</td>
														<td>
															1.100,32
														</td>
													</tr>
													<tr>
														<th scope="row">
															2
														</th>
														<td>
															Registrado
														</td>
														<td>
															04/11/2019
														</td>
														<td>
															1.092,32
														</td>
														<td>
															8,08
														</td>
														<td>
															0,00
														</td>
														<td>
															1.100,32
														</td>
														<td>
															1.100,32
														</td>
													</tr>
													<tr>
														<th scope="row">
															3
														</th>
														<td>
															Registrado
														</td>
														<td>
															04/11/2019
														</td>
														<td>
															1.092,32
														</td>
														<td>
															8,08
														</td>
														<td>
															0,00
														</td>
														<td>
															1.100,32
														</td>
														<td>
															1.100,32
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_8" role="tabpanel">
									<div class="row">
										<div class="col-lg-3">
											<label>Saldo</label>
											<input type="text" class="form-control form-control-sm m-input" placeholder="0.00" name="saldo" id="saldo">
										</div>
										<div class="col-lg-3">
											<label>N° Cuotas</label>
											<input type="text" class="form-control form-control-sm m-input" placeholder="0" name="nCuotas" id="nCuotas">
										</div>
										<div class="col-lg-3">
											<label>1er Vencimiento</label>
											<div class="input-group date">
												<input type="text" class="form-control form-control-sm m-input" readonly="" id="m_datepicker_6">
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-calendar-check-o"></i>
													</span>
												</div>
											</div>
										</div>
										<div class="col-lg-3">
											<br>
											<button class="btn btn-sm btn-danger">Generar Cuotas</button>
										</div>
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
														<tbody>
															<tr>
																<td>4</td>
																<td>CANCELADO</td>
																<td>03/06/2019</td>
																<td>247,50</td>
																<td>0,00</td>
															</tr>
															<tr>
																<td>5</td>
																<td>CANCELADO</td>
																<td>03/07/2019</td>
																<td>247,50</td>
																<td>0,00</td>
															</tr>
														</tbody>
														<tfoot>
															<tr>
																<td></td>
																<td></td>
																<td>Total</td>
																<td>495,00</td>
																<td>0,00</td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="row">
												<div class="col-lg-12">
													<table>
														<tbody>
															<tr>
																<td>
																	<label class="tittle-box m-checkbox">Cuotas Definidas&nbsp;</label>
																</td>
																<td>
																	<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																		<label>
																			<input type="checkbox" name="" id="cuoDefiFOMA">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="col-lg-6">
													<label>Inicial</label>
													<input type="text" class="form-control form-control-sm m-input" placeholder="0" name="inicialFOMA" id="inicialFOMA">
												</div>
												<div class="col-lg-6">
													<label>Valor</label>
													<input type="text" class="form-control form-control-sm m-input" placeholder="0" name="valorFOMA" id="valorFOMA">
												</div>
												<div class="col-lg-6">
													<label>Final</label>
													<input type="text" class="form-control form-control-sm m-input" placeholder="0" name="finalFOMA" id="finalFOMA">
												</div>
												<div class="col-lg-6">
													<br>
													<button class="btn btn-sm btn-danger"><i class="fa fa-refresh"></i></button>
												</div>
											</div>
										</div>
									</div>	
								</div>
								<div class="tab-pane" id="m_tabs_2_9" role="tabpanel">
									<div class="row">
										<div class="col-lg-9">
											<div class="row">
												<div class="col-lg-6">
													<label class="">
														Canal de Venta
													</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="sedeContrto" id="sedeContrato">
														<option>Selecciona</option>
														<?php
																// $tabla = "vtama_localidad";
																// $item1 = "cod_localidad";
																// $item2 = "dsc_localidad";
																// $prueba = controladorEmpresa::
																// ctrSelects($tabla,$item1,$item2);
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
																			<input type="checkbox" name="" id="observacionesCheck">
																			<span></span>
																		</label>
																	</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="col-lg-12">
													<br>
													<label class="tittle-box">Cobrador Asignado</label>
												</div>
												<div class="col-lg-3">
													<label>Cobrador</label>
													<input type="text" class="form-control form-control-sm m-input" name="codCobrador" id="codCobrador">
												</div>
												<div class="col-lg-1">
													<label>&nbsp;</label>
													<button class="btn btn-sm btn-danger"><i class="fa fa-search"></i></button>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreCobrador" id="nombreCobrador">
												</div>
												<div class="col-lg-12">
													<label class="">Zona</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="zona" id="zona">
														<option>Selecciona</option>
														<?php
																// $tabla = "vtama_localidad";
																// $item1 = "cod_localidad";
																// $item2 = "dsc_localidad";
																// $prueba = controladorEmpresa::
																// ctrSelects($tabla,$item1,$item2);
														?>
													</select>
												</div>
												<div class="col-lg-12">
													<br>
													<label class="tittle-box">Personal de Venta</label>
												</div>
												<div class="col-lg-3">
													<label>Vendedor</label>
													<input type="text" class="form-control form-control-sm m-input" name="codVendedor" id="codVendedor">
												</div>
												<div class="col-lg-1">
													<label>&nbsp;</label>
													<button class="btn btn-sm btn-danger"><i class="fa fa-search"></i></button>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreVendedor" id="nombreVendedor">
												</div>
												<div class="col-lg-3">
													<label>Grupo</label>
													<input type="text" class="form-control form-control-sm m-input" name="codGrupo" id="codGrupo">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreGrupo" id="nombreGrupo">
												</div>
												<div class="col-lg-3">
													<label>Tipo Comisionista</label>
													<input type="text" class="form-control form-control-sm m-input" name="codTipoComisionista" id="codTipoComisionista">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreTipoComisionista" id="nombreTipoComisionista">
												</div>
												<div class="col-lg-12">
													<br>
													<label class="tittle-box">Conformación</label>
												</div>
												<div class="col-lg-3">
													<label>Supervisor</label>
													<input type="text" class="form-control form-control-sm m-input" name="codSupervisor" id="codSupervisor">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreSupervisor" id="nombreSupervisor">
												</div>
												<div class="col-lg-3">
													<label>Jefe de Ventas</label>
													<input type="text" class="form-control form-control-sm m-input" name="codJefeVentas" id="codJefeVentas">
												</div>
												<div class="col-lg-9">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreJefeVentas" id="nombreJefeVentas">
												</div>
												<div class="col-lg-12">
													<br>
													<label class="tittle-box">Agencia Funeraria</label>
												</div>
												<div class="col-lg-3">
													<label>Descripcion</label>
													<input type="text" class="form-control form-control-sm m-input" name="codFuneraria" id="codFuneraria">
												</div>
												<div class="col-lg-1">
													<label>&nbsp;</label>
													<button class="btn btn-sm btn-danger"><i class="fa fa-search"></i></button>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="dscFuneraria" id="dscFuneraria">
												</div>
											</div>
										</div>
										<div class="col-lg-3" style="text-align: center; border: 1px solid #6161">
											<i class="fa fa-search"></i><br>
											AL SELECCIONAR AL VENDEDOR SE TOMARA LA CONFIGURACIÓN VIGENTE DEL COLABORADOR
										</div>
									</div>
								</div>
								<div class="tab-pane" id="m_tabs_2_10" role="tabpanel">
									<div class="row">
										<div class="col-lg-4">
											<label class=" ">Área</label>
											<input type="text" class="form-control form-control-sm m-input" name="area" id="area">
										</div>
										<div class="col-lg-5"></div>
										<div class="col-lg-3">
											<table>
												<tbody>
													<tr>
														<td>
															<label class="m-checkbox">Mostrar Todas&nbsp;</label>
														</td>
														<td>
															<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
																<label>
																	<input type="checkbox" name="" id="observacionesCheck">
																	<span></span>
																</label>
															</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
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
														<tbody>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
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
														</tfoot>
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
			</div>
<!-- 		<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div> -->
		</div>
	</div>
</div>
</div>


<?php 

include "modalAuditoriaContrato.php";

 ?>