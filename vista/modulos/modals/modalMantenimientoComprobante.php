	<!-- Modal containt-->
<div class="modal fade" id="m_modal_mantenimiento_comprobante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div id="m_modal_1_loader" class="loader"></div>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Mantenimiento de Comprobantes
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
						<div class="col-lg-12">
							<fieldset class="fieldFormHorizontal">
								<legend class="tittle-box">Comprobante</legend>
								<div class="col-lg-12">
									<div class="row form-group">
										<div class="col-lg-3">
											<label>Tipo:</label>
											<select type="text" class="form-control form-control-sm m-input" id="tipoComManCom">
												<option value="">Seleccione</option>
												<?php
													$prueba = controladorEmpresa::ctrtipoCom();
												?>
											</select>
										</div>
										<div class="col-lg-1">
											<label style="margin-top: 6px;">C.Blanco</label>
											<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
												<label>
													<input type="checkbox" id="cblanco" disabled="" name="">
													<span class="jurid"></span>
												</label>
											</span>
										</div>
										<div class="col-lg-2">
											<label>Número:</label>
											<input type="text" class="form-control form-control-sm m-input" id="serieComManCom">
										</div>
										<div class="col-lg-2">
											<label>&nbsp;</label>
											<input type="text" class="form-control form-control-sm m-input" id="numComManCom">
										</div>
										<div class="col-lg-3">
											<label>Localidad:</label>
											<input type="text" class="form-control form-control-sm m-input" id="localidadManCom">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<fieldset class="fieldFormHorizontal">
								<legend class="tittle-box">Deudor/Venta</legend>
								<div class="col-lg-12">
									<div class="row form-group">
										<div class="col-lg-4">
											<label>Razón / Nombre:</label>
											<input type="text" class="form-control form-control-sm m-input" id="dscDeudorManCom">
										</div>
										<div class="col-lg-2">
											<label>N° Doc:</label>
											<input type="text" class="form-control form-control-sm m-input" id="tipoDocManCom">
										</div>
										<div class="col-lg-2">
											<label>&nbsp;</label>
											<input type="text" class="form-control form-control-sm m-input" id="numDocManCom">
										</div>
										<div class="col-lg-2">
											<label>F. Emisión:</label>
											<input type="text" class="form-control form-control-sm m-input" name="">
										</div>
										<div class="col-lg-2">
											<label>F. Vencim.:</label>
											<input type="text" class="form-control form-control-sm m-input" name="">
										</div>
										<div class="col-lg-5">
											<label>Dirección:</label>
											<input type="text" class="form-control form-control-sm m-input" id="direccionManCom">
										</div>
										<div class="col-lg-2">
											<label>Telefono:</label>
											<input type="text" class="form-control form-control-sm m-input" id="telManCom">
										</div>
										<div class="col-lg-4">
											<label>Venta</label>
											<input type="text" class="form-control form-control-sm m-input" id="ventaManCom">
										</div>
										<div class="col-lg-1">
											<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											<button class="btn btn-sm">
												<i class="fa fa-th-large"></i>
											</button>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-9">
							<fieldset class="fieldFormHorizontal">
								<legend class="tittle-box">&nbsp;</legend>
								<div class="col-lg-12">
									<div class="row form-group">
										<div class="col-lg-1">
											<label>Glosa:</label>
										</div>
										<div class="col-lg-9">
											<textarea type="text" class="form-control form-control-sm m-input" rows="1" id="glosaManCom"></textarea>
										</div>
										<div class="col-lg-1">
											<button class="btn btn-sm">
												<i class="fa fa-comment-o "></i>
											</button>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-lg-3">
							<fieldset class="fieldFormHorizontal">
								<legend class="tittle-box">&nbsp;</legend>
								<div class="col-lg-12 div-sunat">
									<div class="row form-group">
										<div class="col-lg-8">
											<label>Enviar a SUNAT:</label>
										</div>
										<div class="col-lg-4">
											<input type="text" class="form-control form-control-sm m-input" id="sunatManCom">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<fieldset class="fieldFormHorizontal">
								<legend class="tittle-box">&nbsp;</legend>
								<div class="col-lg-12">
									<div class="row form-group">
										<div class="col-lg-9">
											<div class="row">
												<div class="col-lg-3">
													<label>Moneda:</label>
													<input type="text" class="form-control form-control-sm m-input" id="monedaManCom">
												</div>
												<div class="col-lg-3">
													<label>T.C.:</label>
													<input type="text" class="form-control form-control-sm m-input" id="tcManCom">
												</div>
												<div class="col-lg-3">
													<label>Estado:</label>
													<input type="text" class="form-control form-control-sm m-input" id="estadoManCom">
												</div>
												<div class="col-lg-1">
													<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
													<button class="btn btn-sm">
														<i class="fa fa-th-large"></i>
													</button>
												</div>
												<div class="col-lg-2"></div>
												<div class="col-lg-3">
													<label>Subtotal:</label>
													<input type="text" class="form-control form-control-sm m-input" id="subtotalManCom">
												</div>
												<div class="col-lg-3">
													<label>IGV:</label>
													<input type="text" class="form-control form-control-sm m-input" id="igvManCom">
												</div>
												<div class="col-lg-3">
													<label>Total</label>
													<input type="text" class="form-control form-control-sm m-input" id="totalManCom">
												</div>
												<div class="col-lg-3">
													<label>Saldo</label>
													<input type="text" class="form-control form-control-sm m-input" id="saldoManCom">
												</div>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="m-checkbox-list">
												<label class="m-checkbox m-checkbox--success">
													<input type="checkbox">
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comprobante Impreso
													<span></span>
												</label>
												<label class="m-checkbox m-checkbox--brand">
													<input type="checkbox">
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vinculado a N.Credito
														<span></span>
												</label>
												<label class="m-checkbox m-checkbox--primary">
													<input type="checkbox">
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vinculado a L.Cambio
													<span></span>
												</label>
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
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_3_1" role="tab">Detalle del comprobante</a>
								</li>
								<li class="nav-item m-tabs__item">
								<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_3_2" role="tab">Cuotas de la venta vinculadas al comprobante</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_3_3" role="tab">Control Comprobante</a>
								</li>
							</ul>
							<div class="col-lg-12">
								<div class="tab-content">
									<div id="m_tabs_3_1" class="tab-pane active" role="tabpanel">
										<div class="col-lg-12">
											<div class="row">
												<div class="table-responsive">
													<table class="table m-table">
														<thead>
															<th>N°</th>
															<th>Codigo</th>
															<th>Producto/Servicio</th>
															<th>Cantidad</th>
															<th>Moneda</th>
															<th>Subtotal</th>
															<th>Igv</th>
															<th>Total</th>
															<th>Saldo</th>
														</thead>
														<tbody id="tbodyDetalleComprobante" style="min-height: 50px;">
														</tbody>
														<tfoot>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td>Total</td>
																<td>--></td>
																<td id="subtotalDetCom"></td>
																<td id="igvDetCom"></td>
																<td id="totalDetCom"></td>
																<td id="saldoDetCom"></td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div id="m_tabs_3_2" class="tab-pane" role="tabpanel">
										<div class="col-lg-12">
											<div class="row">
												<div class="table-responsive">
													<table class="table m-table">
														<thead>
															<th>Cuota</th>
															<th>Tipo</th>
															<th>Estado</th>
															<th>Fch. Vencimiento</th>
															<th>Subtotal</th>
															<th>Igv</th>
															<th>Total</th>
															<th>Saldo</th>
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
														</tbody>
														<tfoot>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td>Total:</td>
																<td id="subtotalCuoVin"></td>
																<td id="igvCuoVin"></td>
																<td id="totalCuoVin"></td>
																<td id="saldoCuoVin"></td>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div id="m_tabs_3_3" class="tab-pane" role="tabpanel">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-5">
													<div class="row">
														<div class="col-lg-12">
															<fieldset class="fieldFormHorizontal">
																<legend class="tittle-box">&nbsp;</legend>
																	<table class="table myTableEventos">
																		<thead>
																			<th>N°</th>
																			<th>Fecha</th>
																			<th>Evento</th>
																		</thead>
																		<tbody class="tbodyEventos" id="tbodyEventos">
																			<tr></tr>
																		</tbody>
																	</table>
																	<div class="m-form__group row">
										<div class="col-lg-4 div-btn_evt">
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" id="botonAgregarEvt" type="button" title="" data-original-title="Nuevo Evento" onclick="habilitaFormEvt();" class="btn btnGuardarKqPst m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="la la-plus-square"></i>
													<span>&nbsp;</span>
												</span>
											</button>
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" type="button" id="botonGuardar" title="" data-original-title="Guardar cambios" onclick="" class="btn btn-success m-btn m-btn m-btn--icon" hidden="hidden">
												<span>
													<span>&nbsp;</span>
													<i class="la la-check"></i>
													<span>&nbsp;</span>
												</span>
											</button>
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" type="button" id="botonGuardarB" title="" data-original-title="Guardar beneficiario" onclick="guardaBenef();" class="btn btnGuardarKqPst m-btn m-btn m-btn--icon" hidden="hidden">
												<span>
													<span>&nbsp;</span>
													<i class="la la-check"></i>
													<span>&nbsp;</span>
												</span>
											</button>	
										</div>
										<div class="col-lg-4 div-btn_evt">
											<button data-toggle="m-tooltip" type="button" data-container="body" data-placement="top" title="" data-original-title="Editar beneficiario" id="botonEditaB" class="btn btnEditarKqPst2 m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="flaticon-edit-1"></i>
													<span>&nbsp;</span>
												</span>
											</button>	
										</div>
										<div class="col-lg-4 div-btn_evt">
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" title="" id="botonEliminarB" data-original-title="Eliminar Evento" class="btn btn-danger m-btn m-btn m-btn--icon">
												<span>
													<span>&nbsp;</span>
													<i class="la la-trash"></i>
													<span>&nbsp;</span>
												</span>
											</button>
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Descartar cambios" id="botonDescartarB" onclick="limpiaydsi();" class="btn btn-danger btn-lg m-btn m-btn m-btn--icon" hidden="hidden">
												<span>
													<span>&nbsp;</span>
													<i class="la la-remove"></i>
													<span>&nbsp;</span>
												</span>
											</button>
											<button data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Descartar cambios" id="botonCancelarEdicionB" class="btn btn-danger btn-lg m-btn m-btn m-btn--icon" hidden="hidden">
												<span>
													<span>&nbsp;</span>
													<i class="la la-remove"></i>
													<span>&nbsp;</span>
												</span>
											</button>
										</div>
									</div>
															</fieldset>
														</div>
													</div>
												</div>
												<div class="col-lg-7">
													<div class="row">
														<div class="col-lg-12">
															<fieldset class="fieldFormHorizontal">
																<legend class="tittle-box">Datos de Evento</legend>
																<div class="col-lg-12">
																	<div class="row form-group">
																		<div class="col-lg-6">
																			<label>Tipo de evento:</label>
																			<select class="form-control form-control-sm" id="tipoEventoManCom">
																				<option value="">Seleccione</option>
																			</select>
																		</div>
																		<div class="col-lg-6">
																			<label>Número de evento:</label>
																			<input type="text" class="form-control form-control-sm min-height" id="numEVentoManCom">
																		</div>
																	</div>
																</div>
															</fieldset>
														</div>
														<div class="col-lg-12">
															<fieldset class="fieldFormHorizontal">
																<legend class="tittle-box">Detalle</legend>
																<div class="col-lg-12">
																	<div class="row form-group">
																		<div class="col-lg-6">
																			<label>Fecha de Evento:</label>
																			<input type="text" class="form-control form-control-sm" id="m_datetimepicker_1" readonly="" placeholder="Selecciona fecha y hora">
																		</div>
																		<div class="col-lg-12">
																			<label>Observación:</label>
																			<textarea class="form-control form-control-sm m-input" rows="2"></textarea>
																		</div>
																	</div>
																</div>
															</fieldset>
														</div>
														<div class="col-lg-12">
															<fieldset class="fieldFormHorizontal">
																<legend class="tittle-box">Auditoría</legend>
																<div class="col-lg-12">
																	<div class="row form-group">
																		<div class="col-lg-6">
																			<label>Usuario:</label>
																			<input type="text" class="form-control form-control-sm m-input" id="usuarioManCom">
																		</div>
																		<div class="col-lg-6">
																			<label>Fecha de Registro:</label>
																			<input type="text" class="form-control form-control-sm m-input" id="fchRegManCom">
																		</div>
																	</div>
																</div>
															</fieldset>
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
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Cerrar
				</button>
				<button type="button" class="btn btn-danger" onclick="registrarcliente();">
					Guardar
				</button>
			</div>
		</div>
	</div>
</div>